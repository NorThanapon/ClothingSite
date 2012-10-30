<?php

class Member extends CI_Controller {
    public function index() {
       
    }
	public function registration() {
		$data['page_title'] = 'Registration';

		$data['error'] = "No";
     
		$data['page'] = 'member/registration';
        $this->load->view('sub_page',$data);
        //$this->load->view('registration',$data); 

    }
	public function add() 
	{
		$data['form_e_mail'] = $this->input->post('e_mail');
		if( strchr($this->input->post('e_mail'),"@")=="")//incorrect e_mail
		{
			$data['page_title'] = 'Registration';
			$data['error'] = "@ email";
			$data['page'] = 'member/registration';
			$this->load->view('sub_page',$data);
			return;
		}		
        $this->load->model('member_model');		
		$result = $this->member_model->get($this->input->post('e_mail'));
		
		if($result!=null)//e_mail fail
		{
			//echo $result->username;
			$data['page_title'] = 'Registration';
			$data['error'] = "username dup";
			$data['page'] = 'member/registration';
			$this->load->view('registration_page',$data);
			return;
		}		
		if($this->input->post('password')!=$this->input->post('confirm_password'))//confirm_password fail
		{
			$data['page_title'] = 'Registration';
			$data['error'] = "confirm password";
			$data['page'] = 'member/registration';
			$this->load->view('registration_page',$data);
			return;
		}
		if(strlen($this->input->post('password'))<6||strlen($this->input->post('password'))>6||$this->input->post('password')=="")//password lenght fail
		{
			$data['error'] = "lenght";
			$data['page'] = 'member/registration';
			$this->load->view('registration_page',$data);
			return;
		}
		if($this->_check_password($this->input->post('password'))!="")//password fail
		{
			$data['error'] = "password".$this->_check_password($this->input->post('password'));
			$data['page'] = 'member/registration';
			$this->load->view('registration_page',$data);
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
		
		$from ="";
		$from_name="";
		$to = $this->input->post("e_mail_send_password");
		$data['form_e_mail_send_password']=$this->input->post("e_mail_send_password");
		if($to=="")
		{
			$data['show_message'] = 'Please fill your Email for send new password';
			$data['page'] = 'member/login';
			$this->load->view('registration_page',$data);
			return;
		}
		$this->load->model('member_model');
		$result = $this->member_model->get($to);
		if($result==null)
		{
			$data['show_message'] = 'Please fill your Email for send new password';
			$data['page'] = 'member/login';
			$this->load->view('registration_page',$data);
			return;
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
        
        $this->email->from($from, $from_name);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
		$data['show_message']="Thank You. Your password has been sent to the email address specified.";
		//echo "Mail Sent.";
		//
		//
		
	}
	
    
}
?>