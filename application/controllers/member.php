<?php
class Member extends CI_Controller {
    public function index() {
       
    }
	public function registration() {
		$data['page_title'] = 'Registration';

		$data['error'] = "No";
     
		$data['page'] = 'member/registration';
		$data['show_message_password'] = 'Please enter password,<br /> 6 numbers or longer with at least 1 number';
        $this->load->view('sub_page',$data);
        //$this->load->view('registration',$data); 
		

    }
	public function add() 
	{
		$data['page_title'] = "Registration | BfashShop.com";
		$data['form_e_mail'] = $this->input->post('e_mail');
		// check email
		if (!$this->input->post('e_mail')) 
		{ //no authen
			$data['show_message_e_mail'] = 'Please enter Email address';//
			$data['page'] = 'member/registration';
			$this->load->view('sub_page',$data);
            return;
        }
		if ($this->input->post('e_mail')!=$this->input->post('confirm_e_mail')) //confirm email fail
		{ //no authen
			$data['show_message_e_mail'] = 'Your E-mail and confirmed E-mail do not match';//
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
		$data['form_confirm_e_mail'] = $this->input->post('confirm_e_mail');
		//check password
		
		if (!$this->input->post('password')) 
		{ //no authen
			$data['show_message_password'] = 'Please enter password,<br />6 numbers or longer with at least 1 number';
			$data['page'] = 'member/registration';
			$this->load->view('sub_page',$data);
            return;
        }		
		if($this->input->post('password')!=$this->input->post('confirm_password'))//confirm_password fail
		{
			$data['page_title'] = 'Registration';
			$data['show_message_password'] = 'Your password and confirmed password do not match';
			$data['page'] = 'member/registration';			
			$this->load->view('sub_page',$data);
			return;
		}
		
		if(strlen($this->input->post('password'))<6||$this->input->post('password')=="")//password lenght fail
		{
			$data['show_message_password'] = 'Please enter password,<br />6 numbers or longer with at least 1 number1';
			$data['page'] = 'member/registration';
			$this->load->view('sub_page',$data);
			return;
		}
		if($this->_check_password($this->input->post('password'))!="")//password fail
		{
			$data['show_message_password'] = 'Please enter password,<br />6 numbers or longer with at least 1 number2';
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
		for($i=0;$i<strlen($password);$i++)
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
		$data['page_title'] = "Sign in | BfashShop.com";		
		$to = $this->input->post("e_mail_send_password");
		$data['form_e_mail_send_password']=$this->input->post("e_mail_send_password");
		
		if($to=="")
		{
			//$data['show_message'] = 'Please fill your Email for send new password';
			echo 'Please fill your Email for send new password';
			
			//return;
		}
		$this->load->model('member_model');
		$result = $this->member_model->get($to);
		if($result==null)
		{
			//$data['show_message'] = 'Please fill your Email for send new password, no in database';
			//$data['page'] = 'member/login';
			//$this->load->view('sub_page',$data);
			echo 'Please fill your Email for send new password';
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
		$from = "";
		$from_name = "";
		$password = $this->_generate_password($this->input->post("e_mail_send_password"));
		$subject = "Password Reminder";
		$message = "Dear Customer,You have requested that we email your password to ".$to."
					<br /><br />
					Your password is:".$password."
					<br /><br />
					Click here to return to BfashShop.com
					<br /><br />
				    BfashShop Customer Care";
		
        $this->email->from($from, $from_name);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
       // $this->email->send();
		//$data['show_message']="Thank You. Your password has been sent to the email address specified.";
		echo 'Thank You. Your password has been sent to the email address specified.';
		//echo "Mail Sent.";
		//
		//
		
	}
	public function _generate_password($e_mail)
	{
		do
		{
			$password = random_string('alnum', 6);
		}while($this->_check_password($password)!="");		
		$this->load->model('member_model');
		$this->member_model->change_password($e_mail,$password);
		//echo "new password".$password;
	}
	
    
}
?>