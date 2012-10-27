<?php

class Member extends CI_Controller {
    public function index() {
       
    }
	public function registration() {
         $this->load->view('font_product/content_main_registration'); 
    }
	public function add() 
	{
		echo "password>>in>>".$this->input->post('password') ;
        $this->load->model('member_model');		
		$result = $this->member_model->get($this->input->post('username'));		
		if($result!=null)
		{
			//echo $result->username;
			$data['page'] = 'font_product\content_main_registration';
			//$this->load->view('main_page',$data);
			return;
		}				
		$this->member_model->add();		
        //redirect('');
		
    }
	
    
}