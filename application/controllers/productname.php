<?php

class ProductName extends CI_Controller {
    public function index() {
        $data['page_title'] = "BfashShop.com";
        $this->load->view('productname',$data);
    }
}