<?php
class Category extends CI_Controller {
	public function index($brand_id) {
        $data['page_title'] = "Welcome to BfashShop.com";
		//$this->load->model('c_model');
		//$data['brand_list'] = $this->brand_model->get(); 				
		//$data['page'] = 'brand_list';
        $this->load->view('main_page',$data);
    }
	public function product($cat_gender,$cat_name=FALSE,$product_id=FALSE,$item=FALSE){
		
	}
}
?>