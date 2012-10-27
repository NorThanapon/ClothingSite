<?php

class Member extends CI_Controller {
    public function index() {
       
    }
	public function registration() {
		$data['page_title'] = 'Registration';
		$data['error'] = "No";
        $this->load->view('member/registration',$data); 
    }
	public function add() 
	{
		$data['form_e_mail'] = $this->input->post('e_mail');
		if( strchr($this->input->post('e_mail'),"@")=="")//incorrect e_mail
		{
			$data['page_title'] = 'Registration';
			$data['error'] = "@ email";
			$this->load->view('member/registration',$data); 
			return;
		}		
        $this->load->model('member_model');		
		$result = $this->member_model->get($this->input->post('e_mail'));
		
		if($result!=null)//e_mail fail
		{
			//echo $result->username;
			$data['page_title'] = 'Registration';
			$data['error'] = "username dup";
			$this->load->view('member/registration',$data); 
			return;
		}		
		if($this->input->post('password')!=$this->input->post('confirm_password'))//confirm_password fail
		{
			$data['page_title'] = 'Registration';
			$data['error'] = "confirm password";
			$this->load->view('member/registration',$data); 
			return;
		}
		if(strlen($this->input->post('password'))<6||strlen($this->input->post('password'))>6||$this->input->post('password')=="")//password lenght fail
		{
			$data['error'] = "lenght";
			$data['page_title'] = 'Registration';
			$this->load->view('member/registration',$data); 
			return;
		}
		if($this->_check_password($this->input->post('password'))!="")//password fail
		{
			$data['error'] = "password".$this->_check_password($this->input->post('password'));
			$data['page_title'] = 'Registration';
			$this->load->view('member/registration',$data); 
			return;
		}
		
		$this->member_model->add();		
        redirect('');
		
    }
	public function _check_password($password)
	{
		for($i=0;$i<6;$i++)
		{	
			if($password[$i]<48 && $password[$i]>122)
			{
				return$password[$i];
			}
			if($password[$i]>57 && $password[$i]<65)
			{
				return $password[$i];
			}
			if($password[$i]>90 && $password[$i]<97)
			{
				return $password[$i];
			}
		}
	}
	
    
}