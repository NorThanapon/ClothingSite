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
			$query = $this->db->get('orders');
			return $query->result();
		}
		$query = $this->db->get_where('orders', array('order_id' => $order_id));
		return $query->row();
		
	}
	

	
	
}
?>