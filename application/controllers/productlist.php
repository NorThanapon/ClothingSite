<?php

class ProductList extends CI_Controller {
    public function index() {
        $data['page_title'] = "BfashShop.com";
        $this->load->view('productlist',$data);
    }
}