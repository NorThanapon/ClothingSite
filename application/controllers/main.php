<?php

class Main extends CI_Controller {
    public function index() {
        $data['page_title'] = "Welcome to BfashShop.com";
        $this->load->view('main',$data);
    }
}