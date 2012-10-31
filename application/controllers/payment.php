<?php
class Payment extends CI_Controller {
	public function index() 
	{
       $data['page_title'] = 'Registration';

		$data['error'] = "No";
     
		$data['page'] = 'Payment/payment';
        $this->load->view('sub_page',$data);
    }

}
?>