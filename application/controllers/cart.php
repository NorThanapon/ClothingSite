<?php
class Cart extends CI_Controller {
	public function index() {		
		$this->load->model('bfash_model');
		$this->load->model('product_model');
		$this->load->model('item_model');
		$this->load->model('cart_model');
		
		$this->load->library('encrypt');
		
		$data = $this->bfash_model->init();
		$data['previous'] = array("Home");
		$data['current'] =  "Shopping cart";
		$data['base_url'] = base_url().'cart';
		
		//$data['products'] = $this->product_model->get_product_brand_image($brand_id);
		//$data['cookie_name'] = $this->input->get_cookie('item_id');
		$data['items'] = FALSE;
		$data['cookie_name'] = "";
		
		$data['cookie_amount'] = $this->input->cookie('amount');
		if($this->input->cookie('cart') == TRUE){
			$value = $this->input->cookie('cart');
			$detail = explode(';',$value);
			
			$where = "";
			for($i=0; $i<count($detail); $i++){
			    //echo $detail[$i]."<br />";
				$item = explode(',',$detail[$i]);
				if($i == (count($detail)-2)){
					$where = $where." '".$item[0]."' ";
					break;
				}
				$where = $where." '".$item[0]."',";
				
			}
			//echo $where;
			$data['detail'] = $detail;
			$data['items'] = $this->cart_model->get_item_detail($where);
		}
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

		//check item quatity
		if(($item->quantity - $quantity) < 0 || $item->quantity <= 0){
			echo 'false';
			return;
		}
						
		//cookie
		//delete_cookie("cart");
		if($this->input->cookie('cart') == FALSE ){ //don't have items
			$cookie_cart = array(
				'name' =>  'cart',
				'value' =>   $item_id.','.$quantity.';',
				'expire' => '2592000'
			);
			$cookie_num = array(
				'name' => 'amount',
				'value' => 1,
				'expire' => '2592000'
			);
			$this->input->set_cookie($cookie_cart);			
			$this->input->set_cookie($cookie_num);
			echo 'true';
			return;
		}
		$cookie_value = $this->input->cookie('cart').''.$item_id.','.$quantity.';';
		$cookie_num_value = $this->input->cookie('amount')+$quantity;
		$cookie_cart = array(
			'name' =>  'cart',
			'value' =>   $cookie_value,
			'expire' => '2592000'
		);   
		$cookie_num = array(
			'name' => 'amount',
			'value' => $cookie_num_value,
			'expire' => '2592000'
		);		
		$this->input->set_cookie($cookie_cart);
		$this->input->set_cookie($cookie_num);
		echo 'true';
	}
	
	
	public function remove_item($item_id){
		$cookie_value = $this->input->cookie('cart');
		$cookie_num_value = $this->input->cookie('amount');
		
		if($cookie_num < 1){ // amount == 0
			delete_cookie("cart");
			delete_cookie("amount");
		}
		else{
			$cookie_num_value -= 1;
			$cookie_num = array(
				'name' => 'amount',
				'value' => $cookie_num_value,
				'expire' => '2592000'
			);	
			
			$detail = explode(';',$cookie_value);
			//$amount = count($detail);
			$new = "";
			for($i=0; $i<count($detail)-1; $i++){
				$new = $new.''.$detail[$i];
			}
		}
		
		
		
		
	}
	public function destroy_cookie($item_id=FALSE){
		delete_cookie("cart");
		delete_cookie("amount");
		redirect();
	}
}
?>