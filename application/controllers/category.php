<?php
class Category extends CI_Controller {
	public function index($brand_id) {
        $data['page_title'] = "Welcome to BfashShop.com";
		//$this->load->model('c_model');
		//$data['brand_list'] = $this->brand_model->get(); 				
		//$data['page'] = 'brand_list';
        $this->load->view('main_page',$data);
    }
	public function product($cat_gender,$cat_name=FALSE,$cat_id=FALSE,$product_id=FALSE,$item=FALSE){
		
		$this->load->model('brand_model');
		$this->load->model('category_model');
		$this->load->model('product_model');
		if($cat_gender == "women")
		{
			//set common page
			$data['page_title'] = "Welcome to BfashShop.com";
			$data['page'] = 'font_product\content_main_product_list';
			$data['previous'] = array("Home");
			if($cat_name === FALSE){
				$data['current'] = '';
			}
			$data['current'] = $cat_name;
			$data['content_history'] ='common\content-history';
			$data['brand_list'] = $this->brand_model->get();
			$data['women_categories'] = $this->category_model->get_by_gender('WOMEN');
			$data['men_categories'] = $this->category_model->get_by_gender('MEN');
			//============ END setting common page
			
			//Set product_list
			//$data['products'] = $this->product_model->get_product_cat_image($cat_id,'WOMEN');
			$this->load->view('main_page',$data);
		}
		if($cat_gender == "men")
		{
			//set common page
			$data['page_title'] = "Welcome to BfashShop.com";
			$data['page'] = 'font_product\content_main_product_list';
			$data['previous'] = array("Home");
			if($cat_name === FALSE){
				$data['current'] = '';
			}
			$data['current'] = $cat_name;
			$data['content_history'] ='common\content-history';
			$data['brand_list'] = $this->brand_model->get();
			$data['women_categories'] = $this->category_model->get_by_gender('WOMEN');
			$data['men_categories'] = $this->category_model->get_by_gender('MEN');
			//============ END setting common page
			
			//Set product_list
			//$data['products'] = $this->product_model->get_product_cat_image($cat_id,'MEN');
			$this->load->view('main_page',$data);
		}
	}
	public function product_list($cat_gender,$cat_name=FALSE,$cat_id=FALSE,$page=0,$per_page=0){
		if($cat_name === FALSE)
		{
			echo "AAA";
		}
		echo "ABC";
		
	}
}
?>