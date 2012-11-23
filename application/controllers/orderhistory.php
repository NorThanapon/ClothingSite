<?php
class Orderhistory extends CI_Controller {
    public function index() 
	{
		$data['page_title'] = 'Oeder history | BfashShop';
		$data['error'] = "No";
		$this->load->model('order_model');
		$e_mail = $this->input->post('e_mail');
		
		$data["orders"] = $this->order_model-> get_member_order($e_mail);
		//member profile
		$this->load->model('member_model');
		$mamber = $this->member_model->get($e_mail);
		
		$data["first_name"] = $mamber->first_name;
		$data["last_name"] = $mamber->last_name;
		$data["telephone"]= $mamber->telephone;
		$data["mobile"]= $mamber->mobile;
		$data["address"]= $mamber->address;
		$data["postcode"]= $mamber->postcode;
		
		$data['page'] = 'order_history';
        $this->load->view('sub_page',$data);
		
      
    }	
	public function detail()
	{		
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