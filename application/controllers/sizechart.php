<?php
class Sizechart extends CI_Controller {
    public function index($brand_name,$brand_id,$product_id) 
	{
        $data['page_title'] = 'Size Chart';

		$data['error'] = "No";
     
		$this->load->model('product_model');
		$data['gender'] = $this->product_model->get_gender($product_id);
		$data['brand_name'] = $this->product_model->get_brand_name($product_id);
		
		$data['page'] = 'size_chart/content_size-chart';
	
        $this->load->view('sub_page',$data);
      
    }	
}
?>