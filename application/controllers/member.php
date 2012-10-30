<?php

class Member extends CI_Controller {
    public function index() {
       
    }
	public function registration() {
		$data['page_title'] = 'Registration';

		$data['error'] = "No";
     
		$data['page'] = 'font_product/registration';
        $this->load->view('registration_page',$data);
        //$this->load->view('registration',$data); 

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
	public function forget_password()
	{
		//echo "send email";
		$this->load->model('member_model');
		$result = $this->member_model->get($this->input->post('e_mail_send_password'));
		//if($result==null)
		{
		//	return;
		}
		$config = array();
        $config['useragent']           = "CodeIgniter";
        $config['mailpath']            = "/usr/sbin/sendmail"; // or "/usr/sbin/sendmail"
        $config['protocol']            = "smtp";
        $config['smtp_host']           = "127.0.0.1";
        $config['smtp_port']           = "80";
        $config['mailtype'] = 'html';
        $config['charset']  = 'utf-8';
        $config['newline']  = "\r\n";
        $config['wordwrap'] = TRUE;

        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->from("o_oluck@hotmail.com", "from_name");
        $this->email->to("o_oluck@hotmail.com");
        $this->email->subject('Test Send mail');
        $this->email->message("ABC");
        $this->email->send();
		echo "Mail Sent.";
		
	}
	
    
}
?>