<?php
class Cart extends CI_Controller {
	public function index() {		
		$this->load->model('bfash_model');
		$this->load->model('product_model');
		$this->load->model('item_model');
		$this->load->model('cart_model');
		
		$this->load->library('encrypt');
		
		$data = $this->bfash_model->init();
		$this->lang->load('content-history', $this->language_model->get());
		
		//breadcrumbs
		$data['breadcrumbs'] = array($this->lang->line('Home'), $this->lang->line('Shopping Cart'));
		$data['link'] = array(site_url(), site_url().'cart');
			
		$data['items'] = FALSE;
		$data['cookie_name'] = "";
		
		$value = $this->encrypt->decode($this->input->cookie('cart'));
		$detail = explode('&',$value);
			
		$where = "";
		$amount = 0;
			
		for($i=0; $i<count($detail)-1; $i++){
			$item = explode(',',$detail[$i]);
			if($i == count($detail)-2){
				$where = $where." '".$item[0]."' ";
				$amount += $item[1];
			}
			else{
				$where = $where." '".$item[0]."', ";
				$amount += $item[1];
			}
		}
		$data['cookie_amount'] = $amount;
		$data['detail'] = $detail;
		if($where != "")
			$data['items'] = $this->cart_model->get_item_detail($where);
		$data['page'] = "front_product/content_main_shopping_cart";
        $this->load->view('main_page',$data);
    }
	public function add_to_cart(){
		$this->load->model('cart_model');
		$this->load->library('encrypt');
		//check item in DB
		if($this->cart_model->validate_add_cart_item() == FALSE){  
			echo 'false';
			return;
		}
			
		$item_id = $this->input->post('item_id');
		$quantity = $this->input->post('quantity');
		$item = $this->cart_model->validate_add_cart_item();

		if($quantity == 0){
			echo 'false';
			return;
		}
		
		//check item quatity
		if(($item->quantity - $quantity) < 0 || $item->quantity <= 0){
			echo 'false';
			return;
		}
						
		//cookie
		//delete_cookie("cart");
		$item_detail = $item_id.','.$quantity.'&';
		if($this->input->cookie('cart') == FALSE ){ //don't have items
			$cookie_cart = array(
				'name' =>  'cart',
				'value' =>   $this->encrypt->encode($item_detail),
				'expire' => '2592000'
			);
			$this->input->set_cookie($cookie_cart);			
			echo 'true';
			return;
		}
		
		$cookie_value =  $this->encrypt->decode($this->input->cookie('cart'));  
		$detail = explode('&',$cookie_value);
		
		//echo count($detail);
		if(strstr($cookie_value,$item_id) == TRUE){
			$temp = strstr($cookie_value,$item_id);
			$tmp = strpos($temp, '&');
			$str = substr($temp,0,$tmp);
			
			$num = substr($temp, strpos($temp, ',')+1, -1)+$quantity;
			$new = $item_id.','.$num;
			$cookie_value = str_replace( $str, $new , $cookie_value);
		}
		else
		{
			$cookie_value = $cookie_value.''.$item_id.','.$quantity.'&';
		}
		
		$cookie_cart = array(
			'name' =>  'cart',
			'value' =>   $this->encrypt->encode($cookie_value),
			'expire' => '2592000'
		);  

		$this->input->set_cookie($cookie_cart);

		echo 'true';		
	}
	
	public function load_value(){
		$this->load->model('product_model');
		$this->load->model('item_model');
			
		$item_id = $this->input->post('item_id');
		$data['item'] = $this->item_model->get($item_id);
		
		$data['color_in_size'] = $this->product_model->get_color_in_size($data['item']->product_id,$data['item']->size);
		$data['item_detail_size'] = $this->product_model->get_item_detail_size($data['item']->product_id);
		echo json_encode($data);
		
	}
	
	public function get_item_id($size,$color_id){
		$this->load->model('cart_model');
		
		$where = "size = '".$size."' AND color_id = '".$color_id."'";
		$data['item'] = $this->cart_model->get_item($where);
		echo json_encode($data);
	}
	public function get_color($item_id,$size){
		$this->load->model('product_model');
		$this->load->model('item_model');
		$data['item'] = $this->item_model->get($item_id);
		$data['colors'] = $this->product_model->get_color_in_size($data['item']->product_id,$size);
		echo json_encode($data);
	}
	
	public function update_cookie(){
		$id = $this->input->post('item_id');
		$size = $this->input->post('item_size');
		$color = $this->input->post('item_color_id');
		$qty = $this->input->post('item_qty');
		$cookie_value = $this->encrypt->decode($this->input->cookie('cart'));
		
		$this->load->model('cart_model');
		$result = $this->cart_model->get_item_id($size,$color);
		
		//set new value to cookie
		$temp = strstr($cookie_value,$id);
		$tmp = strpos($temp, '&');
		$str = substr($temp,0,$tmp+1); //GET string of item
		$str_pos = strpos($temp,$str);
			
		if(strpos($cookie_value,$result->item_id)>0){
			$temp = strstr($cookie_value,$result->item_id);
			$tmp = strpos($temp, '&');
			$str = substr($temp,0,$tmp+1); //GET string of item
			$str_pos = strpos($temp,$str);
			
			$obj = explode(',',$str);
			$val = substr($obj[1],0,strlen($obj[1])-1);
			if($val == $qty){
				echo 'This item is currently in cart!';
				return;
			}
			$val = $result->item_id.','.$qty.'&';
			$new =  str_replace($str, $val ,$cookie_value); 
			$cookie_cart = array(
				'name' =>  'cart',
				'value' =>   $this->encrypt->encode($new),
				'expire' => '2592000'
			);
			
			$this->input->set_cookie($cookie_cart);
			echo 'true';
			return;
		}	
		
		// set new value
		$val = $result->item_id.','.$qty.'&';
		$new =  str_replace($str, $val ,$cookie_value); //substr($str,$str_pos,strlen($str));
		if(strpos($new, '&')==0){
			$new = substr($new,1);
		}

		$cookie_cart = array(
			'name' =>  'cart',
			'value' =>   $this->encrypt->encode($new),
			'expire' => '2592000'
		);
		
		$this->input->set_cookie($cookie_cart);
		
		echo 'true';
	}
	public function remove_item($item_id){
		$this->load->model('cart_model');
		$cookie_value = $this->encrypt->decode($this->input->cookie('cart'));
		echo $cookie_value."<br />";
			
		//set new value to cookie
		$temp = strstr($cookie_value,$item_id);
		$tmp = strpos($temp, '&');
		$str = substr($temp,0,$tmp+1); //GET string of item
		$str_pos = strpos($temp,$str);
			
		// set new value
		$new =  str_replace($str,"",$cookie_value); //substr($str,$str_pos,strlen($str));
		if(strpos($new, '&')==0){
			$new = substr($new,1);
		}

		$cookie_cart = array(
			'name' =>  'cart',
			'value' =>   $this->encrypt->encode($new),
			'expire' => '2592000'
		);
		
		$this->input->set_cookie($cookie_cart);
		redirect(site_url().'cart');
	}
	public function destroy_cookie($item_id=FALSE){
		delete_cookie("cart");
		delete_cookie("redirect");
		redirect();
	}
	
	public function check_path(){
		if($this->input->post('continue')){
			//echo $this->session->flashdata('redirect_url');
			redirect( $this->session->userdata('redirect'));
		}
		if($this->input->post('pay')){
		
			redirect('payment');
		}
	
	}
}
?>