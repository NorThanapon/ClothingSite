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
		$data['order_id'] = $this->payment_model->get_order_number()+1;
		$this->load->helper('date');
		$dateString = date('d/M/Y', strtotime('now'));
		//$dateString = "%d/%m/%Y H:i:s";

		$data['order_date'] =   mdate($dateString, "");		

		//$data['order_date'] =   mdate($dateString, "");
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
		
		//echo 'true';
		
		
	}
	public function step_2_get_items()
	{
		
		$this->load->library('encrypt');		
		$this->load->model('cart_model');
		// get cart
		if($this->input->cookie('cart') == TRUE){
			$value = $this->encrypt->decode($this->input->cookie('cart'));
			$detail = explode('&',$value);
			$where = "";
			$amount = 0;
				
			for($i=0; $i<count($detail)-1; $i++){
				$item = explode(',',$detail[$i]);
				if($i == count($detail)-2){
					$where = $where." '".$item[0]."' ";
					$amount += $item[1];
				}
				else{
					$where = $where." '".$item[0]."', ";
					$amount += $item[1];
				}
			}
			if($where=="")
			{
				echo json_encode('where'+$where);				
				return;
			}
			
			
		
			$data['cookie_cart'] = $detail;
			$data['items_order'] = $this->cart_model->get_item_detail($where);
			
			
			$data2[][]="";
			$price = 0.0;
			for($i=0;$i<count($data['items_order']);$i++)
			{
				$data2[$i]['item_id'] = $data['items_order'][$i]->item_id;
				$data2[$i]['product_name'] = $data['items_order'][$i]->product_name_en;
				for($j=0;$j<count($data['cookie_cart']);$j++)
				{
					$temp = explode(',',$data['cookie_cart'][$j]);
					if($temp[0] == $data2[$i]['item_id'])
					{
						$data2[$i]['quantity'] = $temp[1];
						$price = $temp[1];
						break;
					}
				}
				if($data['items_order'][$i]->on_sale == 0 )
				{
				
					$data2[$i]['unit_price'] = $data['items_order'][$i]->markup_price;
					
				}
				else
				{
					$data2[$i]['unit_price'] = $data['items_order'][$i]->markdown_price;
				}
				$data2[$i]['price'] = $price*$data2[$i]['unit_price'] ;
				
				
			}
			
			
			 
		}
		
		
		echo json_encode($data2);
		return;
		
		
	}
	public function step_4()
	{
		$this->load->library('encrypt');		
		$this->load->model('cart_model');
		// get cart
		if($this->input->cookie('cart') != TRUE)
		{
			
			return;
		}
		$value = $this->encrypt->decode($this->input->cookie('cart'));
		$detail = explode('&',$value);
		$where = "";
		$amount = 0;
			
		for($i=0; $i<count($detail)-1; $i++){
			$item = explode(',',$detail[$i]);
			if($i == count($detail)-2){
				$where = $where." '".$item[0]."' ";
				$amount += $item[1];
			}
			else{
				$where = $where." '".$item[0]."', ";
				$amount += $item[1];
			}
		}
		if($where=="")
		{
			//echo json_encode('where'+$where);				
			return;
		}
		
		$data['cookie_cart'] = $detail;
		$data['items_order'] = $this->cart_model->get_item_detail($where);
		
		//save to database
		$this->load->model('payment_model');
		$this->load->model('member_model');
		$member_id = $this->member_model->get($this->input->post('e_mail'))->member_id;			
		$this->load->helper('date');		
		$time = time();		
		$order_data['date_add'] = $time;//timestamp
		
		//if( !ini_get('date.timezone') )
		//{
		date_default_timezone_set('Asia/Bangkok');
		//}
		//echo "ini_get('date.timezone')".ini_get('date.timezone');
		//$time_exp = $time+(86400*2);
		$order_data['date_expire'] = mktime(0,0,0,date("m"),date("d")+3,date("y")) ;
		$this->payment_model->add($member_id,$order_data);	
		$data2[][]="";
		$price = 0.0;
		$order_id = $this->input->post('order_id');
		for($i=0;$i<count($data['items_order']);$i++)
		{
			$data2[$i]['item_id'] = $data['items_order'][$i]->item_id;
			$data2[$i]['product_name'] = $data['items_order'][$i]->product_name_en;
			for($j=0;$j<count($data['cookie_cart']);$j++)
			{
				$temp = explode(',',$data['cookie_cart'][$j]);
				if($temp[0] == $data2[$i]['item_id'])
				{
					$data2[$i]['quantity'] = $temp[1];
					$price = $temp[1];
					break;
				}
			}
			if($data['items_order'][$i]->on_sale== 0 )
			{
			
				$data2[$i]['unit_price'] = $data['items_order'][$i]->markup_price;
				
			}
			else
			{
				$data2[$i]['unit_price'] = $data['items_order'][$i]->markdown_price;
			}
			$data2[$i]['price'] = $price*$data2[$i]['unit_price'] ;
			$this->payment_model->add_order_detail($order_id,$data2[$i]['item_id'],$data2[$i]['quantity'],$data2[$i]['unit_price']);
		}
		//$datestring = "d/M/Y  h:%i %a";
		$expire_date = date('d F Y',mktime(0,0,0,date("m"),date("d")+2,date("y")));//mdate($datestring, $time_exp);
		
		$data['order_id'] = $order_id;
		$data['page_title'] = 'Payment | BfashShop';
		$data['error'] = "No";  
		$data['date_expire'] = $expire_date;
		$data['page'] = 'Payment/thank_you';
		$this->load->view('sub_page',$data);		
	}
	public function invoice()
	{	if($this->input->post('btn_go_to_homepage'))
		{
			redirect('');
			return;
		}
		$data['page_title'] = 'Invoice | BfashShop';
		$data['date_expire_full_month_name']="";
		//$data['products']="";
		$data['first_name'] = "";
		$data['last_name'] = "";
		$data['tel'] = "";
		$data['mobile'] = "";
		$data['address'] = "";
		$data['postcode'] = "";	
		$data['order_date'] = "";
		$data['order_expire'] = "";
		$data['date_expire_full_month_name'] = "";
		$data['shipping'] = "";
		$data['vat'] = "";
		$data['total'] = "";
		$data['subtotal'] = "";
		$data['order_id'] ="";
		
		if($this->input->post('order_id')==null)
		{
			$data['page'] = 'Payment/invoice';
			$this->load->view('sub_page',$data);
			return;
		}
		$order_id = $this->input->post('order_id');		
		$this->load->model('payment_model');
		$data['order_id'] = $this->input->post('order_id');
		$order = $this->payment_model->get_order($order_id);
		date_default_timezone_set('Asia/Bangkok');
		$this->load->helper('date');
		$datestring = "%d/%M/%Y";
		$datestring_full_month_name = "%d %F %Y";
		$data['order_date'] = mdate($datestring, $order->date_add);
		$date_exp = strtotime("-1 days",$order->date_expire);
		$data['order_expire'] = mdate($datestring, $date_exp);		
		$data['date_expire_full_month_name'] = mdate($datestring_full_month_name,$date_exp );
		$data['shipping'] = number_format( $order->shipping_cost , 2, '.', ',');
		$data['vat'] = number_format( $order->vat , 2, '.', ',');
		$data['total'] = number_format( $order->total_price , 2, '.', ',');
		$data['subtotal'] = number_format($order->total_price-$order->vat- $order->shipping_cost, 2, '.', ',');
		$address = explode(";",$order->shipping_address);
		$data['first_name'] = $address[0];
		$data['last_name'] = $address[1];
		$data['tel'] = $address[2];
		$data['mobile'] = $address[3];
		$data['address'] = $address[4];
		$data['postcode'] = $address[5];			
		$data['products'] = $this->payment_model->get_order_detail($order_id);
		$data['error'] = "No";  		
		$data['page'] = 'Payment/invoice';
		$this->load->view('sub_page',$data);
	}
	
	
	

}
?>