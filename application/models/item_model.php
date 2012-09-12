<?php


class Item_model extends CI_Model 
{
	var $item_id = '';
    var $product_id = '';
    var $size = '';
    var $color = '';
	var $quantity = '';

    function __construct() 
	{
        parent::__construct();
    }
	
	function add()
	{
		$data = array(
			'item_id' => $this->input->post('item_id'),
		    'product_id' => $this->input->post('product_id'),
			'size' => $this->input->post('size'),
			'color_id' => $this->input->post('color_id'),
		    'quantity' => $this->input->post('quantity')
		);	
		$this->db->insert('items', $data); 
	}
	
	function edit($item_id)
	{
		$data = array(
			'item_id' => $this->input->post('item_id'),
		    'product_id' => $this->input->post('product_id'),
			'size' => $this->input->post('size'),
			'color_id' => $this->input->post('color'),
		    'quantity' => $this->input->post('quantity')
		);	
		$this->db->update('items', $data, array('item_id' => $item_id)); 
	}
	
	function delete($item_id)
	{
		$this->db->delete('items', $data, array('item_id' => $item_id)); 
	}
	
	function get($item_id = FALSE)
	{
	    if ($item_id === FALSE) 
		{
			$query = $this->db->get('items');	
			return $query->result();
	    }
	    $query = $this->db->get_where('items', array('item_id' => $item_id));
		return $query->row();
	}
}