<?php

class ProductList extends CI_Controller {
    public function index() {
        $data['page_title'] = "BfashShop.com";
		$data['page'] = 'content-main-productlist';
        $this->load->view('main_page',$data);
    }
}