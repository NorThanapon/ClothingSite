<?php
class Orderhistory extends CI_Controller {
    public function index() 
	{
       $data['page_title'] = 'Oeder history';

		$data['error'] = "No";
     
		$data['page'] = 'order_history';
	
        $this->load->view('sub_page',$data);
      
    }	
}
?>