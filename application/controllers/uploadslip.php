<?php
class UploadSlip extends CI_Controller {
	public function index() 
	{
		$data['page_title'] = 'Upload Slip | BfashShop';
		$data['error'] = "No";     
		$data['page'] = 'Payment/Upload-Slip';
        $this->load->view('sub_page',$data);
	}
}
?>