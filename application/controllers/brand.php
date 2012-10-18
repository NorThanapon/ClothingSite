<?php
class Brand extends CI_Controller {
    public function index($brand_id) {
        $data['page_title'] = "Welcome to BfashShop.com";
		$this->load->model('brand_model');
		$data['brand_list'] = $this->brand_model->get(); 				
		$data['page'] = 'brand_list';
        $this->load->view('main_page',$data);
    }
	public function product($brand_name,$product_id=FALSE,$item=0) {
        $data['page_title'] = "Welcome to BfashShop.com";
		$this->load->model('brand_model');
		$this->load->model('product_model');
		$this->load->model('image_model');
		$data['brand_list'] = $this->brand_model->get(); 
		$data['re_name'] = str_replace('-',' ',$brand_name);
		$data['brands'] = $this->brand_model->get_by_name($data['re_name']); 
		$data['products'] = $this->product_model->get_product_brand_image($data['re_name']);		
		$data['page'] = 'font_product\content_main_product_list';
		$data['content_history'] ='common\content-history';
		$data['previous'] = array("Home","brand");
		$data['current'] = 'brand/'.$brand_name;
		$this->load->view('main_page',$data);
		
    }

	public function product_list( $brand, $page=0, $per_page=0 ) {
		
		$data['page_title'] = "Welcome to BfashShop.com";
		$this->load->model('brand_model');
		$this->load->model('product_model');
		$data['brand_list'] = $this->brand_model->get();
		$data['re_name'] = str_replace('_',' ',$brand);
		$data['brands'] = $this->brand_model->get_by_name($data['$re_name']); 
		$data['products'] = $this->product_model->get_by_brand_id($data['brands']->brand_id);
		$data['amount_product'] = $per_page;
		
		$data['page'] = 'font_product\content_main_product_list';
		$data['content_history'] ='common\content-history';
		$data['previous'] = array("Home","brand");
		$data['current'] = 'brand/'.$brand;
		
		$this->load->view('main_page',$data);
	}
}
?>
