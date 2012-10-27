<?php

class Main extends CI_Controller {
    public function index() {
		
		if(check_authen('member',TRUE)) 
        {
			$data['sign_in_link']="authen/logout";
			$data['sign_in']="sign out";
        }
		else
		{
			$data['sign_in_link']="authen/login";
			$data['sign_in']="sign in";
		}		
        $data['page_title'] = "Welcome to BfashShop.com";
		$this->load->model('brand_model');
		$this->load->model('category_model');
		$data['brand_list'] = $this->brand_model->get(); 
		//$data['cat_list_women'] = $this->category_model->get_category_by_gender('WOMEN','en');
		$data['women_categories'] = $this->category_model->get_by_gender('WOMEN');
		$data['men_categories'] = $this->category_model->get_by_gender('MEN');
        $this->load->view('index',$data);
    }
}