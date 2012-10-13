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
		$data['brand_list'] = $this->brand_model->get(); 
		$re_name = str_replace('_',' ',$brand_name);
		$data['brands'] = $this->brand_model->get_by_name($re_name); 
		$data['products'] = $this->product_model->get_by_brand_id($data['brands']->brand_id);
		//$data['images'] = $this->images->
		$data['page'] = 'font_product\content_main_product_list';	
        $this->load->view('main_page',$data);
    }

}
?>
