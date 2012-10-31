<?php
class Brand extends CI_Controller {
    public function index($brand_id) {
        $data['page_title'] = "Welcome to BfashShop.com";
		$this->load->model('brand_model');
		$data['brand_list'] = $this->brand_model->get(); 				
		$data['page'] = 'brand_list';
        $this->load->view('main_page',$data);
    }
	public function product($brand_name=FALSE,$brand_id=FALSE) 
	{
		
		$this->load->model('bfash_model');
		$this->load->model('product_model');
		$this->load->model('image_model');
		$this->load->model('category_model');
		
		$data = $this->bfash_model->init();
		
		
		//if($product_id===FALSE)
		//{
			$data['re_name'] = str_replace('-',' ',$brand_name);
			$data['brands'] = $this->brand_model->get_by_name($brand_id); 
			$data['previous'] = array("Home");
			$data['current'] =  $brand_name;
			$data['base_url'] = base_url().'brand/'.$brand_name.'/'.$brand_id;
			$data['products'] = $this->product_model->get_product_brand_image($brand_id);	
			$data['page'] = 'front_product/content_main_product_list';
			
			//set product
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
		//}
		
    }

	

	public function product_list( $brand_name,$brand_id, $page=0, $per_page=0 ) {
		$this->load->model('bfash_model');
		$this->load->model('product_model');
		$this->load->model('image_model');
		$this->load->model('category_model');
		
		$data = $this->bfash_model->init();
		
		
		$data['re_name'] = str_replace('-',' ',$brand_name);
		$data['brands'] = $this->brand_model->get_by_name($brand_id); 
		$data['previous'] = array("Home");
		$data['current'] =  $brand_name;
		$data['base_url'] = base_url().'brand/'.$brand_name.'/'.$brand_id;
		$data['products'] = $this->product_model->get_product_brand_image($brand_id);	
		
		
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
?>
