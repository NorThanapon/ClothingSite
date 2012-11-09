<?php
class Payment_model extends CI_Model 
{
	function __construct() 
 	{
        parent::__construct();
    }
	function add($member_id,$order_data)
	{
		
		$data = array(
			'order_id' => $this->input->post('order_id'),
			'member_id' => $member_id,
			'date_add' => $order_data['date_add'],
			'date_expire' => $order_data['date_expire'],
			'status' => 'New',
			'shipping_address' => $this->input->post('address'),
			'vat' => $this->input->post('vat'),
			'shipping_cost' => $this->input->post('shipping_cost'),
			'total_price' => $this->input->post('total')	
		);
		
		
		$this->db->insert('orders',$data);
		
	}
	function add_order_detail($order_id,$item_id,$quantity,$unit_price)
	{
		$data = array(
			'order_id' => $order_id,
			'item_id' => $item_id,
			'quantity' => $quantity,			
			'unit_price' => $unit_price
		);	
		
		$this->db->insert('orders_detail',$data);
		
	}
	function get_order_number()
	{
		$query = $this->db->get('orders');
		return $query->num_rows();
	}

	
	
}
?>