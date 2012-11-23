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
		if($this->input->post('color') == FALSE){
			$data = array(
			'item_id' => $this->input->post('item_id'),
		    'product_id' => $this->input->post('product_id'),
			'size' => $this->input->post('size'),
		    'quantity' => $this->input->post('quantity')
			);	
			$this->db->insert('items', $data); 	
			return;
		}
		$data = array(
			'item_id' => $this->input->post('item_id'),
		    'product_id' => $this->input->post('product_id'),
			'size' => $this->input->post('size'),
			'color_id' => $this->input->post('color'),
		    'quantity' => $this->input->post('quantity')
		);	
		$this->db->insert('items', $data); 	
	}
	
	function add_total_quantity()
	{
	
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
		$this->db->delete('items', array('item_id' => $item_id)); 
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
	
	function get_by_product_id($product_id = FALSE)
	{
		if ($product_id === FALSE) 
		{			
			$query = $this->db->get('items');	
			return $query->result();
	    }
		
		$query = $this->db->get_where('items', array('product_id' => $product_id));
		return $query->result();
	}
	
	function save_main_image($item_id,$image_id){
		$data = array(
			'main_image' => $image_id
		);	
		$this->db->update('items', $data, array('item_id' => $item_id)); 
		return;
	}
	
	
	function update_total_quantity($product_id,$quantity)
	{
		$data = array(
			'total_quantity' => $quantity
		);
		$this->db->update('products', $data, array('product_id' => $product_id)); 
	}
	
	function search($product_name=FALSE, $item_amount_low=FALSE, $item_amount_high=FALSE)
	{
		$where = "";
		if ($product_name != "" && $product_name != " " && $product_name != FALSE &&  $product_name != "-")
		{
			if ($where != "" ) $where = $where . " AND ";
			$where = $where . "( product_name_en  LIKE '%".$product_name."%' OR product_name_th LIKE '%".$product_name."%' )";
		}
		if($item_amount_low == '-' && $item_amount_high > 0)
		{
			$item_amount_low = 0;
		}
		if($item_amount_low > 0 && $item_amount_high == '-')
		{
			$item_amount_high = 9999;
			
		}		
		if($item_amount_low != '-' || $item_amount_high != '-' )
		{
			if ($where != "" ) $where = $where . " AND ";
			$where = $where . "( quantity >= ".$item_amount_low." AND quantity <= ".$item_amount_high.")";
		}
	
		if ($where != "" ) $query = $this->db->get_where('products_items', $where);
		else $query = $this->db->get('items');
		return $query->result();
	}
}