<?php

class Tag_model extends CI_Model 
{
	var $tag_id = '';
    var $tag_name_th = '';
    var $tag_name_en = '';
    var $description_en = '';
	var $total_quality='';
	var $is_active = '';

    function __construct() 
	{
        parent::__construct();
    }
	
	function add()
	{
		/*$this->cat_name_th = $this->input->post('cat_name_th');
		$this->cat_name_en = $this->input->post('cat_name_en');
		$this->description_th = $this->input->post('description_th');
		$this->description_en = $this->input->post('description_en');
		$this->cat_parent = $this->input->post('cat_parent');*/		
		$isAct = 1;
		if($this->input->post('is_active')==FALSE)
		{
			$isAct = 0;
		}		
		$data = array(
			'tag_name_th' => $this->input->post('tag_name_th'),
			'tag_name_en' => $this->input->post('tag_name_en'),
			'description_th' => $this->input->post('description_th'),
			'description_en' => $this->input->post('description_en'),
			'is_active' => $isAct,
			'total_quantity'  => $this->input->post('total_quantity')
			);
		$this->db->insert('tags', $data); 
	}
	
	function edit($tag_id)
	{
		$isAct = 1;
		if($this->input->post('is_active')==FALSE)
		{
			$isAct=0;
		}
		
		$data = array(
			'tag_name_th' => $this->input->post('tag_name_th'),
			'tag_name_en' => $this->input->post('tag_name_en'),
			'description_th' => $this->input->post('description_th'),
			'description_en' => $this->input->post('description_en'),
			'is_active' => $isAct,
			'total_quantity'  => $this->input->post('total_quantity')
			);

		$this->db->update('tags',$data,array('tag_id'=>$tag_id));
	}
	
	function delete($tag_id)
	{	
		$this->db->delete('tags',array('tag_id'=>$tag_id));
	}

	function delete_product($tag_id,$product_id)
	{
		$this->db->delete('products_tags',array('tag_id'=>$tag_id,'product_id'=>$product_id));	
	}
	
	function get($tag_id = FALSE)
	{
	    if($tag_id === FALSE)
		{
			$query = $this->db->get_where('tags');
			return $query->result();
		}

		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('products_tags', 'products.product_id = products_tags.product_id');
		$this->db->where('tag_id',$tag_id);
		$query = $this->db->get();
		$total_quantity = $query->num_rows(); 
		$data = array(
               'total_quantity' => $total_quantity
            );
		$this->db->where('tag_id', $tag_id);
		$this->db->update('tags', $data); 
			
		$query = $this->db->get_where('tags',array('tag_id' => $tag_id));
		return $query->row();
	}

	function get_product_in_tag($tag_id=FALSE)
	{
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('products_tags', 'products.product_id = products_tags.product_id');
		$this->db->where('tag_id',$tag_id);
		$query = $this->db->get();
		
	    return $query->result();
	}
	
	function get_product_name($product_id=FALSE)
	{
		$query = $this->db->get_where('products',array('product_id'=>$product_id));
	    return $query->row();
	}
	
	function get_by_name($tag_name_th = FALSE, $tag_name_en = FALSE)
	{
		if ($tag_name_th === FALSE) 
		{
			$query = $this->db->get_where('tags',array('tag_name_en' => $tag_name_en));
			return $query->result();
		}
		if ($tag_name_en === FALSE) 
		{
			$query = $this->db->get_where('tags',array('tag_name_th' => $tag_name_th));
			return $query->result();
		}

		$this->db->where('tag_name_th',$tag_name_th);
		$this->db->or_where('tag_name_en',$tag_name_en); 
		$query = $this->db->get('tags');
		return $query->row();
	}
	
	function search($name)
	{
		$where = "";
		if ($name != "" && $name != " " && $name != FALSE)
		{
			if ($where != "" ) $where = $where . " AND ";
			$where = $where . "(tag_name_th LIKE '%".$name."%' OR tag_name_en LIKE '%".$name."%')";
		}
		
		if ($where != "" ) $query = $this->db->get_where('tags', $where);
		else $query = $this->db->get('tags');
		return $query->result();
	}

	function has_products_under_tag($tag_id=false)
	{
		if($tag_id !=false)
		{
			$query = $this->db->get_where('products_tags',array('tag_id' => $tag_id));
		}
		if($query->num_rows()>0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	
	}
	
	function product_exist($tag_id=FALSE,$product_id=FALSE)
	{
		$this->db->select('*');
		$this->db->from('products_tags');
		$this->db->where('tag_id',$tag_id);
		$this->db->where('product_id',$product_id); 
		$query = $this->db->get();
		
		if($query->num_rows()>0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
/*
	function add_product_in_tag($tag_id,$product_name_en=false)
	{
		$isAct = 1;
		if($this->input->post('is_active')==FALSE)
		{
			$isAct = 0;
		}
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('products_tags', 'products.product_id = products_tags.product_id');
		$this->db->where('product_name_en',$product_name_en);
		$query = $this->db->get('product_id');
		$data = array(
			'tag_id' => $this->input->post('tag_id'),
			'product_id' => $this->input->post('product_id')
			);
		$this->db->insert('products_tags', $data); 
	}*/
	function add_product_in_tag($tag_id,$product_id)
	{
		$isAct = 1;
		if($this->input->post('is_active')==FALSE)
		{
			$isAct = 0;
		}		
		$data = array(
			'tag_id' => $tag_id,
			'product_id' => $product_id
			);
		$this->db->insert('products_tags', $data); 
	}
}
?>