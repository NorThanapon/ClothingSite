<?php

class Main extends CI_Controller {
    public function index() {
        $data['page_title'] = "Welcome to BfashShop.com";
		$this->load->model('brand_model');
		$this->load->model('category_model');
		$data['brand_list'] = $this->brand_model->get(); 
		//$data['cat_list_women'] = $this->category_model->get_category_by_gender('WOMEN','en');
		$num = 0;
		$data['women_categories'] = $this->category_model->get_by_gender('WOMEN');
		$data['men_categories'] = $this->category_model->get_by_gender('WOMEN');
        $this->load->view('index',$data);
    }
}