<?php
class Ajax extends CI_Controller 
{
	public function index($brand_name,$brand_id,$product_id) 
    {
		$this->load->model('bfash_model');
		$this->load->model('product_model');
		$this->load->model('image_model');
		$this->load->model('category_model');
		$data = $this->bfash_model->init();
		echo "ss";

		$data['product_detail'] = $this->product_model->get_main_image($product_id);
		$data['sub_image'] = $this->product_model->get_sub_image($product_id);	
		$data['color_in_size'] = $this->product_model->get_color_in_size($product_id,'10');		
		$data['item_detail_size'] = $this->product_model->get_item_detail_size($product_id);
		
		$data['previous'] = array("Home");
		$data['current'] =  $brand_name;
		$data['base_url'] = base_url().'brand/'.$brand_name.'/'.$brand_id;
		
		$data['page'] = 'front_product/content_main_product_name';
		$this->load->view('main_page',$data);
    }
	public function product_ajax($product_id=FALSE)
	{
			$this->load->model('bfash_model');
			$this->load->model('product_model');
			$this->load->model('image_model');
			$this->load->model('category_model');
			$data = $this->bfash_model->init();

			
		echo $this->input->post('size');
		$data['color_in_size'] = $this->product_model->get_color_in_size($product_id,$this->input->post('size'));
		echo $data['color_in_size'];
		
			$data['page'] = 'front_product/content_main_product_name';
			$this->load->view('main_page',$data);
			
			
	}
	public function product_detail($brand_id=FALSE,$brand_name=FALSE,$product_id=FALSE) 
	{
			$this->load->model('bfash_model');
			$this->load->model('product_model');
			$this->load->model('image_model');
			$this->load->model('category_model');
			$data = $this->bfash_model->init();
			
			$data['product_detail'] = $this->product_model->get_main_image($product_id);
			$data['sub_image'] = $this->product_model->get_sub_image($product_id);
			$data['logo'] = $this->product_model->get_product_brand_image($brand_name);
			$data['item_detail_size'] = $this->product_model->get_item_detail_size($product_id);
			$data['item_detail_color'] = $this->product_model->get_item_detail_color($product_id);

			$data['color_in_size'] = $this->product_model->get_default_size($product_id);
			//echo $this->input->post('size');
			//$data['color_in_size'] = $this->product_model->get_color_in_size($product_id,$this->input->post('size'));
			//echo json_encode($data['color_in_size']);
			
			//$data['brand_list'] = $this->brand_model->get(); 
			//$data['re_name'] = str_replace('-',' ',$brand_name);
			//$data['brands'] = $this->brand_model->get_by_name($data['re_name']); 
			//$data['products'] = $this->product_model->get_product_brand_image($data['re_name']);		
			//$data['page'] = 'front_product\content_main_product_name';
			//$data['content_history'] ='common\content-history';
			$data['base_url'] = base_url().'brand/'.$brand_name.'/'.$brand_id;
			$data['previous'] = array("Home",$brand_name);
			$data['current'] = $data['product_detail']->product_name_en;
			$data['page'] = 'front_product/content_main_product_name';
			$this->load->view('main_page',$data);
			
	}
}?>