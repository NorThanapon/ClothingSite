<?php
class Category extends CI_Controller {
	public function index($brand_id) {		
		//$this->load->model('c_model');
		//$data['brand_list'] = $this->brand_model->get(); 				
		//$data['page'] = 'brand_list';
        $this->load->view('main_page',$data);
    }
	public function product($cat_gender,$cat_name=FALSE,$cat_id=FALSE,$product_id=FALSE,$item=FALSE){
		
		$this->load->model('bfash_model');
		$this->load->model('product_model');
		$this->load->model('image_model');
		$this->load->model('category_model');
		
		$data = $this->bfash_model->init();
		if($product_id != FALSE)
		{	
			$data['page']="";
			$data['previous'] = array("Home");
			if($cat_name === FALSE){
				$data['current'] = '';
			}
			$data['current'] = $cat_name;
			$data['base_url'] = base_url().'category/'.$cat_gender.'/'.$cat_name.'/'.$cat_id.'/'.$product_id;
			$data['page'] = 'front_product\content_main_product_name';
			
			//
			$data['product_detail'] = $this->product_model->get_main_image($product_id);
			$data['sub_image'] = $this->product_model->get_sub_image($product_id);
			$data['logo'] = $this->product_model->get_product_brand_image($data['product_detail']->brand_name);
			$data['item_detail_size'] = $this->product_model->get_item_detail_size($product_id);
			$data['item_detail_color'] = $this->product_model->get_item_detail_color($product_id);
			$this->load->view('main_page',$data);
			return ;
		}
		
		if($cat_gender == "women")
		{
			//set common page
			$data['previous'] = array("Home");
			if($cat_name === FALSE){
				$data['current'] = '';
			}
			$data['current'] = $cat_name;
			$data['base_url'] = base_url().'category/'.$cat_gender.'/'.$cat_name.'/'.$cat_id;
			$data['page'] = 'front_product\content_main_product_list';
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
			$data['previous'] = array("Home");
			if($cat_name === FALSE){
				$data['current'] = '';
			}
			$data['current'] = $cat_name;
			$data['base_url'] = base_url().'category/'.$cat_gender.'/'.$cat_name.'/'.$cat_id;
			$data['page'] = 'front_product\content_main_product_list';
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
		$this->load->model('bfash_model');
		$this->load->model('product_model');
		$this->load->model('image_model');
		$this->load->model('category_model');
		
		$data = $this->bfash_model->init();
		$data['page'] = 'front_product\content_main_product_list';
		
		if($cat_gender == "women")
		{
			//set common page
			$data['previous'] = array("Home");
			if($cat_name === FALSE){
				$data['current'] = '';
			}
			$data['current'] = $cat_name;
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
			$data['previous'] = array("Home");
			if($cat_name === FALSE){
				$data['current'] = '';
			}
			$data['current'] = $cat_name;
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
	
	public function change_language() {
		if (!$this->input->post('lang'))
		{		
			product($cat_gender,$cat_name=FALSE,$cat_id=FALSE,$product_id=FALSE,$item=FALSE);			
			//redirect(current_url());
		}
		else
		{
			$this->load->model('language_model');
			$this->language_model->add($this->input->post('lang'));
			product($cat_gender,$cat_name=FALSE,$cat_id=FALSE,$product_id=FALSE,$item=FALSE);
			
			
			//redirect(current_url());
		}
	}
}
?>