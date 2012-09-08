<?php
class Product_model extends CI_Model 
{
	var $product_id = '';
	var $product_name_th ='';
	var $product_name_en = '';
	var $brand_name = '';
	var $cat_id = '';
	var $total_quantity = '';
	var $markup_price = '';
	var $markdown_price = '';
	var $description_th = '';
	var $description_en = '';
	var $how_to_wash_th = '';
	var $how_to_wash_en = '';
	var $DATE_ADD = '';
	var $isActive = '';
	
	function __construct() 
	{
        parent::__construct();
    }

	function add()
	{		
		$is_active = 0;
		if($this->input->post('isActive')==true)
		{
			$is_active = 1;
		}
		$data = array(
			'product_id' => $this->input->post('product_id'),
			'product_name_th' => $this->input->post('product_name_th'),
			'product_name_en' => $this->input->post('product_name_en'),
			'brand_name' => $this->input->post('brand_name'),
			'cat_id'  => $this->input->post('cat_id'),
			'total_quantity'  => $this->input->post('total_quantity'),
			'markup_price' => $this->input->post('markup_price'),
			'markdown_price'  => $this->input->post('markdown_price'),
			'description_th'  => $this->input->post('description_th'),
			'description_en'  => $this->input->post('description_en'),
			'how_to_wash_th'  => $this->input->post('how_to_wash_th'),
			'how_to_wash_en'  => $this->input->post('how_to_wash_en'),
			'DATE_ADD' =>   $date = date("Y-m-d H:i:s"),
			'isActive' => $is_active
		);
		$this->db->insert('products',$data);
	}
	
	function edit($product_id)
	{
		$is_active = 0;
		if($this->input->post('isActive')==true)
		{
			$is_active = 1;
		}
		
		
		$data = array(
			'product_id' => $this->input->post('product_id'),
			'product_name_th' => $this->input->post('product_name_th'),
			'product_name_en' => $this->input->post('product_name_en'),
			'brand_name' => $this->input->post('brand_name'),
			'cat_id'  => $this->input->post('cat_id'),
			'total_quantity'  => $this->input->post('total_quantity'),
			'markup_price' => $this->input->post('markup_price'),
			'markdown_price'  => $this->input->post('markdown_price'),
			'description_th'  => $this->input->post('description_th'),
			'description_en'  => $this->input->post('description_en'),
			'how_to_wash_th'  => $this->input->post('how_to_wash_th'),
			'how_to_wash_en'  => $this->input->post('how_to_wash_en'),
			'isActive'   => $is_active
		);
		$this->db->update('products',$data,array('product_id'=>$product_id));
	}
	
	function delete($product_id)
	{	
		$this->db->delete('products',array('product_id'=>$product_id));
	}
	
	function get($product_id = FALSE)
	{
	
	    if ($product_id === FALSE) 
		{
			$query = $this->db->get_where('products');
			return $query->result();
	    }
	    $query = $this->db->get_where('products', array('product_id' => $product_id));
	    return $query->row();
	}
	
	function select($query)
	{
		$query = $this->db->query($query);
		return $query->result();
	
	}
	
	function search($product_cat, $brand, $status, $name)
	{
		$where = "";
		if ($product_cat != "0" && $product_cat != FALSE) $where = $where . "cat_id = " . $product_cat;
		if ($name != "" && $name != " " && $name != FALSE)
		{
			if ($where != "" ) $where = $where . " AND ";
			$where = $where . "(product_name_th LIKE '%".$name."%' OR product_name_en LIKE '%".$name."%')";
		}
		if ($brand != "0" && $brand != FALSE)
		{
			if ($where != "" ) $where = $where . " AND ";
			$where = $where . "brand_name LIKE '%".$brand."%'";
		}
		if($status != "2")
		{
			if ($where != "" ) $where = $where . " AND ";
			$where = $where . "isActive = ".$status;
		}
		
		
		if ($where != "" ) $query = $this->db->get_where('products', $where);
		else $query = $this->db->get('products');
		return $query->result();
	}
	function update_status($product_id,$status)
	{
		$data['isActive'] = $status;
		$this->db->update('products',$data,array('product_id'=>$product_id));
		
	}

}
?>