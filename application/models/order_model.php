<?php
class Order_model extends CI_Model 
{
	function __construct() 
 	{
        parent::__construct();
    }
	function get_order($order_id = false)
	{
		if($order_id === false)
		{
			$this->db->order_by("date_add", "desc"); 
			$query = $this->db->get('members_orders');
			return $query->result();
		}
		$query = $this->db->get_where('members_orders', array('order_id' => $order_id));
		return $query->row();
		
	}
	function update_status($orders)
	{		
		$this->db->update_batch('orders',$orders,'order_id'); 		
			
	}
	function get_latest()
    {
		$this->db->order_by('order_id', 'desc');
		$this->db->limit(1);
        $query = $this->db->get('orders');	
		return $query->row();	
    }
	function up_slip($image)
	{
		$data = array(
			'order_id'   => $this->input->post('order_id'),
			'image_payment' => $image
		);
		$this->db->update('orders',$data,array('order_id'=>$this->input->post('order_id')));
	}
	function get_member_order($e_mail)
	{
		$query = $this->db->get_where('members_orders', array('e_mail' => $e_mail));
		return $query->result();
	}
	function search($key,$status)
	{
		$this->db->like('order_id', $key); 
		$this->db->or_like('first_name', $key); 
		$this->db->or_like('last_name', $key); 
		$this->db->or_like('status', $key); 
		$query = $this->db->get('members_orders');
		return $query->result();
	}
	

	
	
}
?>