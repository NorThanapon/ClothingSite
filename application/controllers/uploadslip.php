<?php
class UploadSlip extends CI_Controller {
	public function index() 
	{
		$data['page_title'] = 'Upload Slip | BfashShop';
		$data['error'] = "No";     
		$data['page'] = 'Payment/upload-slip';
        $this->load->view('sub_page',$data);
	}
}
?>