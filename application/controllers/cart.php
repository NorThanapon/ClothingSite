<?php
class Cart extends CI_Controller {
	public function index() {		
		$this->load->model('bfash_model');
		$this->load->model('product_model');
		$this->load->model('item_model');
		$this->load->model('cart_model');
		$data = $this->bfash_model->init();
		$data['previous'] = array("Home");
		$data['current'] =  "Shopping cart";
		$data['base_url'] = base_url().'cart';
		
		//$data['products'] = $this->product_model->get_product_brand_image($brand_id);
		//$data['cookie_name'] = $this->input->get_cookie('item_id');
		
		$data['cookie_name'] = "";
		if($this->input->cookie('cart') == TRUE){
			$value = $this->input->cookie('cart');
			$element = explode(';',$value);
			
			$where = "item_id = ";
			
			for($i=0; $i<count($element); $i++){
				$item = explode(',',$element[$i]);
				if($i == (count($element)-2)){
					$where = $where." '".$item[0]."' ";
					break;
				}
				$where = $where." '".$item[0]."' OR item_id = ";
			}
			//echo $where;
			$data['items'] = $this->cart_model->get_where($where);
		}
		
		$data['page'] = "front_product/content_main_shopping_cart";
        $this->load->view('main_page',$data);
    }
	public function add_to_cart(){
		$this->load->model('cart_model');
		//$this->load->library('encrypt');
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
		//TODO: encrypt
		//delete_cookie("cart");
		if($this->input->cookie('cart') == FALSE){
			$cookie_cart = array(
				'name' =>  'cart',
				'value' =>  $item_id.','.$quantity.';',
				'expire' => time()+3600*24*30
			);
			$this->input->set_cookie($cookie_cart);
			echo 'true';
			return;
		}
		$cookie_value = $this->input->cookie('cart').''.$item_id.','.$quantity.';';
		$cookie_cart = array(
			'name' =>  'cart',
			'value' =>  $cookie_value,
			'expire' => time()+3600*24*30
		);
		$this->input->set_cookie($cookie_cart);
		echo 'true';
	}
	
	public function destroy_cookie($item_id=FALSE){
		if($item_id === FALSE){
			//TODO: delete by id
		}
		delete_cookie("cart");
		redirect();
	}
}
?>