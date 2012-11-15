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
		$this->lang->load('content-history', $this->language_model->get());
		//$this->lang->load('content_main_product_name', $this->language_model->get());
		$data['re_name'] = str_replace('-',' ',$brand_name);
		$data['product_detail'] = $this->product_model->get_main_image($product_id);
		$data['sub_image'] = $this->product_model->get_sub_image($product_id);	
		
		$default_size = $this->product_model->get_default_size($product_id);	
		
		$data['color_in_size'] = $this->product_model->get_color_in_size($product_id,$default_size->size);
		
		$data['item_detail_size'] = $this->product_model->get_item_detail_size($product_id);

		$data['base_url'] = base_url().'brand/'.$brand_name.'/'.$brand_id.'/'.$product_id;
		
		//breadcrumbs
		$data['breadcrumbs'] = array($this->lang->line('Home'), $data['re_name'], $data['product_detail']->product_name_en);
		$data['link'] = array(site_url(), site_url().'brand/'.$brand_name.'/'.$brand_id, $data['base_url']);
		
		//set page history
		$this->session->set_userdata('redirect',current_url());
		
		$data['page'] = 'front_product/content_main_product_name';
		$this->load->view('main_page',$data);
		
    }
	public function color_ajax($product_id,$size)
	{
		$this->load->model('product_model');
		$data['color_in_size'] = $this->product_model->get_color_in_size($product_id,$size);
		echo json_encode($data['color_in_size']);
	}
	public function item_ajax($product_id, $size, $color_id)
	{
		$this->load->model('product_model');
		$data['item'] = $this->product_model->get_item($product_id, $size, $color_id);
		echo json_encode($data['item']);
	}
	public function quantity_ajax($product_id, $size, $color_id)
	{
		$this->load->model('product_model');
		$data['quantity'] = $this->product_model->get_quantity($product_id, $size, $color_id);
		echo json_encode($data['quantity']);
	}
	public function sub_image_ajax($product_id, $color_id)
	{
		$this->load->model('product_model');
		$data['sub_image'] = $this->product_model->get_sub_image($product_id,$color_id);
		echo json_encode($data['sub_image']);
	}
	
}?>