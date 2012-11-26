<?php
class Sizechart extends CI_Controller {
    public function index($brand_name,$brand_id,$product_id) 
	{
		$this->load->helper('file');
	
        $data['page_title'] = 'Size Chart';

		$data['error'] = "No";
     
		$this->load->model('product_model');
		$data['gender'] = $this->product_model->get_gender($product_id);
		$data['brand_name'] = $this->product_model->get_brand_name($product_id);
		
		$validbrandname = str_replace(' ','_',$data['brand_name']->brand_name);
		$file = './assets/size_chart/'.$validbrandname."_".strtoupper($data['gender']->cat_gender).".txt";
		$data['text'] = read_file($file);
		
		$data['page'] = 'size_chart/content_size-chart';
		$this->load->view('sub_page',$data);    
    }	
}
?>