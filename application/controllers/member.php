<?php

class Member extends CI_Controller {
    public function index() {
       
    }
	public function registration() {
		$data['page_title'] = 'Registration';
        $this->load->view('member/registration',$data); 
    }
	public function add() 
	{
		$data['form_e_mail'] = $this->input->post('e_mail');		
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