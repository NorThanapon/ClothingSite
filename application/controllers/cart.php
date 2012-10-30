<?php
class Cart extends CI_Controller {
	public function index() {		
		$this->load->model('bfash_model');
		$this->load->model('product_model');
		$data = $this->bfash_model->init();
		$data['previous'] = array("Home");
		$data['current'] =  "Shopping cart";
		$data['base_url'] = base_url().'cart';
		//$data['products'] = $this->product_model->get_product_brand_image($brand_id);
		//$data['cookie_name'] = $this->input->get_cookie('item_id');
		
		$data['cookie_name'] = $this->input->cookie('item_id',TRUE);
		/*$data['cookie_quantity'] = $this->input->cookie('quantity',TRUE);
		*/
		
		$data['page'] = "front_product/content_main_shopping_cart";
        $this->load->view('main_page',$data);
    }
	public function add_to_cart(){
		$this->load->model('cart_model');
		
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
		$cookie_cart = array(
			'name' =>  'cart',
			'item_id' =>  $item_id,
			'quantity' => $quantity,
			'expire' => time()+3600*24*30
		);
		$this->input->set_cookie($cookie_cart);
		$data1 = $this->input->cookie($item_id);
		echo $data1;
		
	}

	
}
?>