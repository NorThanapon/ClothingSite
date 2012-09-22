<?php

class Main extends CI_Controller {
    public function index() {
        $data['page_title'] = "Welcome to BfashShop.com";
		$this->load->model('brand_model');
		$data['brand_list'] = $this->brand_model->get(); 
        $this->load->view('main',$data);
    }
}