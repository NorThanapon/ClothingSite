<?php
class Order extends CI_Controller 
{
    public function index() 
    {
        if(!check_authen('staff',TRUE)) 
        {
            return;
        }
        $data['page_title'] = 'Admin: Order Management';
		$this->load->model('order_model');
		$data['orders'] = $this->order_model->get_order();
		$data['page'] = 'order/list';
        $this->load->view('main_admin_page',$data);		
       
    }
	public function update_status()
	{
		if(!check_authen('staff',TRUE)) 
		{	
			return;       
	    }
		
		$data['page_title'] = 'Admin: Order Management';
			
		$this->load->model('order_model');
		
		if($this->input->post('chb_select_product')=="") 
	    {
			$this->load->library('form_validation');
			$data['error_message'] = 'Please select orders.';
			$this->load->model('order_model');
			$data['orders'] = $this->order_model->get_order();
			$data['page'] = 'order/list';
			$this->load->view('main_admin_page',$data);
			return;			
	    }	
		
		$i=0;
		
		foreach( $this->input->post('chb_select_product') as $item)
		{
			$temp[$i]['order_id'] = $item;			
			$temp[$i]['status'] = $this->input->post('change_status');
			$i++;			
		}
			//var_dump($temp);
		
		$this->order_model->update_status($temp);		
		$data['orders'] = $this->order_model->get_order();
		redirect('admin/order');
		
	}
	public function detail($order_id = FALSE)
	{
		$data['page_title'] = 'Admin: Order Management';
		if(!check_authen('staff',TRUE)) return;  
			
		if($order_id === FALSE)
		{
			$data['orders'] = $this->order_model->get_order();
			redirect('admin/order');
			return;
		}
				
		
		$this->load->model('payment_model');
		$data['order_id'] = $order_id;
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
		$data['image_payment'] = $order->image_payment;
		$data['status'] = $order->status;
		
		$address = explode(";",$order->shipping_address);
		$data['first_name'] = $address[0];
		$data['last_name'] = $address[1];
		$data['tel'] = $address[2];
		$data['mobile'] = $address[3];
		$data['address'] = $address[4];
		$data['postcode'] = $address[5];			
		$data['products'] = $this->payment_model->get_order_detail($order_id);
				
		$data['page'] = 'order/invoice';
		$this->load->view('main_admin_page',$data);
	    
	}
	public function status()
	{
		if(!check_authen('staff',TRUE)) 
		{	
			return;       
	    }
		
		$data['page_title'] = 'Admin: Order Management';
			
		$this->load->model('order_model');
		$order_id = $this->input->post('order_id');
		$temp[0]['order_id'] = 	$order_id;	
		$temp[0]['status'] = $this->input->post('change_status');
							
		$this->order_model->update_status($temp);


		$this->load->model('payment_model');
		$data['order_id'] = $order_id;
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
		$data['image_payment'] = $order->image_payment;
		$data['status'] = $order->status;
		
		$address = explode(";",$order->shipping_address);
		$data['first_name'] = $address[0];
		$data['last_name'] = $address[1];
		$data['tel'] = $address[2];
		$data['mobile'] = $address[3];
		$data['address'] = $address[4];
		$data['postcode'] = $address[5];			
		$data['products'] = $this->payment_model->get_order_detail($order_id);
				
		$data['page'] = 'order/invoice';
		$this->load->view('main_admin_page',$data);
		
		
		
	}

}
?>