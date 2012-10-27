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
			$data['base_url'] = base_url().'category/'.$cat_gender.'/'.$cat_name.'/'.$cat_id;
			//============ END setting common page
			
			//Set product_list
			$data['products'] = $this->product_model->get_product_cat_image($cat_id);
			$data['num_item'] = count($data['products']);
			$data['show_start'] = 1;
			$data['show_end'] = 20;
			if($data['show_end']>$data['num_item'])
			{
				$data['show_end'] = $data['num_item'];
			}
			$data['per_page'] = 20;
			if($data['show_end']==0)
			{
				$data['show_end'] = 1;
			}
			$data['num_page'] = ceil($data['num_item']/$data['show_end']); // CHANGE to 20
			$data['current_page'] = 1;
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
			$data['base_url'] = base_url().'category/'.$cat_gender.'/'.$cat_name.'/'.$cat_id;
			//============ END setting common page
			
			//Set product_list
			$data['products'] = $this->product_model->get_product_cat_image($cat_id);
			$data['num_item'] = count($data['products']);
			$data['show_start'] = 1;
			$data['show_end'] = 20;
			if($data['show_end']>$data['num_item'])
			{
				$data['show_end'] = $data['num_item'];
			}
			$data['per_page'] = 20;
			if($data['show_end']==0)
			{
				$data['show_end'] = 1;
			}
			$data['num_page'] = ceil($data['num_item']/$data['show_end']); // CHANGE to 20
			$data['current_page'] = 1;
			$this->load->view('main_page',$data);
		}
	}
	public function product_list($cat_gender,$cat_name=FALSE,$cat_id=FALSE,$page=0,$per_page=0){
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
			$data['base_url'] = base_url().'category/'.$cat_gender.'/'.$cat_name.'/'.$cat_id;
			//============ END setting common page
		
			//Set product_list
			$data['products'] = $this->product_model->get_product_cat_image($cat_id);
			$data['num_item'] = count($data['products']);
			if($per_page == 0)
			{
				$data['show_end'] = $data['num_item'];
				$data['show_start'] = 1;
				$data['per_page'] = $data['num_item'];
				$data['num_page'] = 1; 
				$data['current_page'] = $page;
				$this->load->view('main_page',$data);
				return ;
			}
			
			$data['show_end'] = $per_page*$page;
			$data['show_start'] = ($per_page*($page-1)+1);
			if($data['show_start']>$data['num_item'])
			{
				$data['show_start'] = $data['show_start']-($data['show_start']-$data['num_item']);
			}
			if($page == 1)
			{
				$data['show_start'] = 1;
			}
			if($data['show_end']>$data['num_item']){
				$data['show_end'] = $data['show_end']-($data['show_end']-$data['num_item']);
			}
			$data['per_page'] = $per_page;
			$data['num_page'] = ceil($data['num_item']/$per_page); // CHANGE to 20
			$data['current_page'] = $page;
			$this->load->view('main_page',$data);
		}
		else if($cat_gender == "men")
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
			$data['base_url'] = base_url().'category/'.$cat_gender.'/'.$cat_name.'/'.$cat_id;
			//END 
			
			//Set product_list
			$data['products'] = $this->product_model->get_product_cat_image($cat_id);
			$data['num_item'] = count($data['products']);
			if($per_page == 0)
			{
				$data['show_end'] = $data['num_item'];
				$data['show_start'] = 1;
				$data['per_page'] = $data['num_item'];
				$data['num_page'] = 1; 
				$data['current_page'] = $page;
				$this->load->view('main_page',$data);
				return ;
			}
			
			$data['show_end'] = $per_page*$page;
			$data['show_start'] = ($per_page*($page-1)+1);
			if($data['show_start']>$data['num_item'])
			{
				$data['show_start'] = $data['show_start']-($data['show_start']-$data['num_item']);
			}
			if($page == 1)
			{
				$data['show_start'] = 1;
			}
			if($data['show_end']>$data['num_item']){
				$data['show_end'] = $data['show_end']-($data['show_end']-$data['num_item']);
			}
			$data['per_page'] = $per_page;
			$data['num_page'] = ceil($data['num_item']/$per_page); // CHANGE to 20
			$data['current_page'] = $page;
			$this->load->view('main_page',$data);
			
		}
	}
}
?>