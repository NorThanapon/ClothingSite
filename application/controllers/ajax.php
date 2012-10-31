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
		//echo "ss";

		$data['product_detail'] = $this->product_model->get_main_image($product_id);
		$data['sub_image'] = $this->product_model->get_sub_image($product_id);	
		
		$default_size = $this->product_model->get_default_size($product_id);	
		
		//$action = $this->input->post('action');
		//if($action!="change")
		//{
			//echo "not change";
			$data['color_in_size'] = $this->product_model->get_color_in_size($product_id,$default_size->size);
		//}
		$data['item_detail_size'] = $this->product_model->get_item_detail_size($product_id);

		$data['previous'] = array("Home");
		$data['current'] =  $brand_name;
		$data['base_url'] = base_url().'brand/'.$brand_name.'/'.$brand_id;
		
		$data['page'] = 'front_product/content_main_product_name';
		$this->load->view('main_page',$data);
		
    }
	public function color_ajax($product_id,$size)
	{
		$this->load->model('product_model');
		$data['color_in_size'] = $this->product_model->get_color_in_size($product_id,$size);
		echo json_encode($data['color_in_size']);
	}
	public function item_ajax()
	{
		$product_id = $this->input->post('product_id');
		$size = $this->input->post('size');
		$color_id = $this->input->post('color_id');
		
		$this->load->model('product_model');
		$data['item'] = $this->product_model->get_item($product_id, $size, $color_id);

		echo json_encode($data['item']);
		//echo implode(":", $data['item']);
	}
}?>