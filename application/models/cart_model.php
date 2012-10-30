<?php
class Cart_model extends CI_Model 
{
	function __construct() 
 	{
        parent::__construct();
    }
	
	function validate_add_cart_item(){
		//$size = $this->input->post('ddl-size');
		//$color_id = $this->input->post('txt-color-image');
		
		$item_id = $this->input->post('item_id');
		$quantity = $this->input->post('quantity');
		
		$query = $this->db->get_where('items',array('item_id'=>$item_id));
		if($query->num_rows > 0){
			return $query->row();
		}
		else{
			return false;
		}
	
	}
}