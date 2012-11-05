<?php
class Payment extends CI_Controller {
	public function index() 
	{
		$data['page_title'] = 'Payment | BfashShop';
		$data['error'] = "No";     
		$data['page'] = 'Payment/payment';
		$this->load->model('member_model');
		$member = $this->member_model->get($this->input->post('e_mail'));
		$data['first_name'] = $member->first_name;
		$data['last_name'] = $member->first_name;
		$data['telephone'] = $member->telephone;
		$data['mobile'] = $member->mobile;
		$data['address'] = $member->address;
		$data['postcode'] = $member->postcode;
		$this->load->model('payment_model');
		$data['order_number'] = $this->payment_model->get_order_number()+1;
		$this->load->helper('date');
		$dateString = "%d/%m/%Y";

		$data['order_date'] =   mdate($dateString, "");		

		$data['order_date'] =   mdate($dateString, "");
		$data['cookie_cart'] = "";
		$data['items_order'] = FALSE;

		
        $this->load->view('sub_page',$data);
			
    }
	public function register() 
	{		
		if (!$this->input->post('e_mail')) 
		{ //no authen
			echo 'Please enter Email address';//
            return;
        }
		if (!$this->input->post('password')) 
		{ //no authen
			echo 'Please enter password,
			6 characters or longer with at least 1 number';
            return;
        }
		if( strchr($this->input->post('e_mail'),"@")=="")//incorrect e_mail
		{
			echo "Email address is either in an invalid format or contains invalid characters";
			return;
		}		
        $this->load->model('member_model');		
		$result = $this->member_model->get($this->input->post('e_mail'));
		
		if($result!=null)//e_mail fail
		{
			echo "A customer account with this email address already exists,
				 please use a different email address";
			return;
		}		
		if($this->input->post('password')!=$this->input->post('confirm_password'))//confirm_password fail
		{
			echo "Please enter password,
			6 characters or longer with at least 1 number";
			return;
		}		
		if(strlen($this->input->post('password'))<6||strlen($this->input->post('password'))>6||$this->input->post('password')=="")//password lenght fail
		{
			echo "Please enter password,
			6 characters or longer with at least 1 number";
			return;
		}
		if($this->_check_password($this->input->post('password'))!="")//password fail
		{
			echo "Please enter password,
			6 characters or longer with at least 1 number";		
			return;
		}
		echo "true";
		$this->member_model->add();    
		
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
	public function login_member_check_error()
	{						
		if (!$this->input->post('e_mail')) 
		{ //no authen	
			echo 'Please enter Email address';
            return;
        }
		if (!$this->input->post('password')) 
		{ //no authen
			echo 'Please enter password';
            return;
        }
		$this->load->library('encrypt');
		$this->load->model('member_model');			
		$member = $this->member_model->get($this->input->post('e_mail'));		
		if($member==null)// incorrect username
		{
			echo 'The following errors have occurred:
			Please check your email address and password are correct and submit your details again.';
           
			return;
		}	
		$password = $member->password;			
		// check password			
		if($this->encrypt->decode($member->password)!=$this->input->post('password'))//password incorrect
		{

			echo 'The following errors have occurred:
			Please check your email address and password are correct and submit your details again.';
				
            return;
		}
		echo 'true';
		//$data['member_profile'] = $this->member_model->get($this->input->post('e_mail'));
		//echo json_encode($data['member_profile']);
			
    }
	public function get_member_profile()
	{						
		$this->load->model('member_model');
		$data['member_profile'] = $this->member_model->get($this->input->post('e_mail'));
		echo json_encode($data['member_profile']);
			
    }
	
	public function step_2()
	{
		$this->load->model('member_model');
		$this->member_model->update_member_profile();		
		$member = $this->member_model->get($this->input->post('e_mail'));		
		
		$data['first_name'] = $member->first_name;
		$data['last_name'] = $member->first_name;
		$data['telephone'] = $member->telephone;
		$data['mobile'] = $member->mobile;
		$data['address'] = $member->address;
		$data['postcode'] = $member->postcode;
		$this->load->model('cart_model');
		// get cart
		if($this->input->cookie('cart') == TRUE){
			$value = $this->input->cookie('cart');
			$detail = explode(';',$value);
			
			$where = "";
			for($i=0; $i<count($detail); $i++){
			    //echo $detail[$i]."<br />";
				$item = explode(',',$detail[$i]);
				if($i == (count($detail)-2)){
					$where = $where." '".$item[0]."' ";
					break;
				}
				$where = $where." '".$item[0]."',";
				
			}
			//echo $where;
			$data['cookie_cart'] = $detail;
			$data['items_order'] = $this->cart_model->get_item_detail($where);
			
			 //print_r($data['items_order'] );
		}
		
		echo json_encode($data['cookie_cart']);
		
		
		//echo json_encode($data['items_order']);
		//echo "true";
	}
	public function step_2_get_items()
	{
		$this->load->model('member_model');	
		$member = $this->member_model->get($this->input->post('e_mail'));
		$this->load->model('cart_model');
		// get cart
		if($this->input->cookie('cart') == TRUE){
			$value = $this->input->cookie('cart');
			$detail = explode(';',$value);
			
			$where = "";
			for($i=0; $i<count($detail); $i++){
			    //echo $detail[$i]."<br />";
				$item = explode(',',$detail[$i]);
				if($i == (count($detail)-2)){
					$where = $where." '".$item[0]."' ";
					break;
				}
				$where = $where." '".$item[0]."',";
				
			}
			//echo $where;
			$data['cookie_cart'] = $detail;
			$data['items_order'] = $this->cart_model->get_item_detail($where);
			
			 //print_r($data['items_order'] );
		}
		
		echo json_encode($data['items_order']);
		
		
		//echo json_encode($data['items_order']);
		//echo "true";
	}
	public function step_3()
	{
		
		
		echo "true";
	}
	


}
?>