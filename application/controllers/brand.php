<?php
class Brand extends CI_Controller {
    public function index($brand_id) {
        $data['page_title'] = "Welcome to BfashShop.com";
		$this->load->model('brand_model');
		$data['brand_list'] = $this->brand_model->get(); 				
		$data['page'] = 'brand_list';
        $this->load->view('main_page',$data);
    }
	public function catalog($brand_id) {
        $data['page_title'] = "Welcome to BfashShop.com";
		$this->load->model('brand_model');
		$this->load->model('product_model');
		$data['brand_list'] = $this->brand_model->get(); 
		$data['brands'] = $this->brand_model->get($brand_id); 
		$data['products'] = $this->product_model->get_by_brand_id($brand_id);
		$data['page'] = 'brand_list';	
		//$data['page'] = 'brand_list';
        $this->load->view('main_page',$data);
    }

}
?>
