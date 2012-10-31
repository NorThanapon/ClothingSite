<?php
class Member extends CI_Controller {
    public function index() {
       
    }
	public function registration() {
		$data['page_title'] = 'Registration';

		$data['error'] = "No";
     
		$data['page'] = 'member/registration';
		$data['show_message_password'] = 'Please enter password,<br /> 6 characters or longer with at least 1 number';
        $this->load->view('sub_page',$data);
        //$this->load->view('registration',$data); 

    }
	public function add() 
	{
		$data['page_title'] = "Registration | BfashShop.com";
		$data['form_e_mail'] = $this->input->post('e_mail');
		if (!$this->input->post('e_mail')) 
		{ //no authen
			$data['show_message_e_mail'] = 'Please enter Email address';//
			$data['page'] = 'member/registration';
			$this->load->view('sub_page',$data);
            return;
        }
		if (!$this->input->post('password')) 
		{ //no authen
			$data['show_message_password'] = 'Please enter password,<br />6 characters or longer with at least 1 number';
			$data['page'] = 'member/registration';
			$this->load->view('sub_page',$data);
            return;
        }
		if( strchr($this->input->post('e_mail'),"@")=="")//incorrect e_mail
		{
			$data['page_title'] = 'Registration';
			$data['show_message_e_mail']="Email address is either in an invalid format or contains invalid characters";
			$data['page'] = 'member/registration';
			$this->load->view('sub_page',$data);
			return;
		}		
        $this->load->model('member_model');		
		$result = $this->member_model->get($this->input->post('e_mail'));
		
		if($result!=null)//e_mail fail
		{
			$data['page_title'] = 'Registration';
			$data['page'] = 'member/registration';
			$data['show_message_e_mail'] = 'A customer account with this email address already exists,<br /> please use a different email address';
			$this->load->view('sub_page',$data);
			return;
		}		
		if($this->input->post('password')!=$this->input->post('confirm_password'))//confirm_password fail
		{
			$data['page_title'] = 'Registration';
			$data['show_message_password'] = 'Please enter password,<br />6 characters or longer with at least 1 number';
			$data['page'] = 'member/registration';			
			$this->load->view('sub_page',$data);
			return;
		}
		echo "password".$this->input->post('password');
		if(strlen($this->input->post('password'))<6||strlen($this->input->post('password'))>6||$this->input->post('password')=="")//password lenght fail
		{
			$data['show_message_password'] = 'Please enter password,<br />6 characters or longer with at least 1 number';
			$data['page'] = 'member/registration';
			$this->load->view('sub_page',$data);
			return;
		}
		if($this->_check_password($this->input->post('password'))!="")//password fail
		{
			$data['show_message_password'] = 'Please enter password,<br />6 characters or longer with at least 1 number';
			$data['page'] = 'member/registration';
			$this->load->view('sub_page',$data);
			return;
		}
		
		$this->member_model->add();		
        redirect('');
		
    }
	public function _check_password($password)
	{
		$count_cha=0;
		$count_int=0;
		for($i=0;$i<6;$i++)
		{				
			if(ord($password[$i])>=48 && ord($password[$i])<=57)
			{
				$count_int++;
			}
			else if(ord($password[$i])>=65 && ord($password[$i])<=90)
			{
				$count_cha++;
			}
			else if(ord($password[$i])>=90 && ord($password[$i])<=122)
			{
				$count_cha++;
			}
			else
			{
				return $password[$i];
			}
		}		
		if($count_int<=0)return "false";
		if($count_cha<=0)return "false";
		
	}
	public function forget_password()
	{
		//echo "send email";
		$data['page_title'] = "Sign in | BfashShop.com";
		$from ="";
		$from_name="";
		$to = $this->input->post("e_mail_send_password");
		$data['form_e_mail_send_password']=$this->input->post("e_mail_send_password");
		if($to=="")
		{
			$data['show_message'] = 'Please fill your Email for send new password';
			$data['page'] = 'member/login';
			$this->load->view('sub_page',$data);
			return;
		}
		$this->load->model('member_model');
		$result = $this->member_model->get($to);
		if($result==null)
		{
			$data['show_message'] = 'Please fill your Email for send new password';
			$data['page'] = 'member/login';
			$this->load->view('sub_page',$data);
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