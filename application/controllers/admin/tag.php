<?php 

class Tag extends CI_Controller 
{
    public function index() 
    {
		if(!check_authen('staff',TRUE)) 
		{
			return;
		}
		//$this->load->model('tag_model');
		$data['page_title'] = 'Admin: Tag Management';		
		$this->load->view('tag/list',$data);
    }
}
?>
	