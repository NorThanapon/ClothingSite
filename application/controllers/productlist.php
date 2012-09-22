<?php

class ProductList extends CI_Controller {
    public function index() {
        $data['page_title'] = "BfashShop.com";
		$this->load->model('brand_model');
		$data['brand_list'] = $this->brand_model->get(); 
		$data['page'] = 'content-main-productlist';
        $this->load->view('main_page',$data);
    }
}