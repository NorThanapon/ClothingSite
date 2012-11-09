<?php
class Sizechart extends CI_Controller {
    public function index() 
	{
       $data['page_title'] = 'Size Chart';

		$data['error'] = "No";
     
		$data['page'] = 'size_chart/content_size-chart';
	
        $this->load->view('sub_page',$data);
      
    }	
}
?>