<?php
class Payment_model extends CI_Model 
{
	function __construct() 
 	{
        parent::__construct();
    }
	function add()
	{
		
		// $data = array(
			
		// );
		// $this->db->insert('orders',$data);
	}
	function get_order_number()
	{
		$query = $this->db->get('orders');
		return $query->num_rows();
	}

	
	
}
?>