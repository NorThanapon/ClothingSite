<?php
class ShoppingCart extends CI_Controller {
    public function index() {
        $data['page_title'] = "BfashShop.com";
		$this->load->model('brand_model');
		$data['brand_list'] = $this->brand_model->get(); 
		
		$data['page'] = 'font_product/content_main_shoppingcart';
        $this->load->view('main_page',$data);
    }
	//public function 
}
?>