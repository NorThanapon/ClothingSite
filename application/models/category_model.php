<?php


class Category_model extends CI_Model 
{
	var $cat_id = '';
    var $cat_name_th = '';
    var $cat_name_en = '';
    var $description_th = '';
    var $description_en = '';
    var $cat_gender = '';
	var $is_active = '';

    function __construct() 
	{
        parent::__construct();
    }
	
	function add()
	{	
		$is_act = 1;
		if($this->input->post('is_active')==FALSE)
		{
			$is_act = 0;
		}	
		$data = array(
			'cat_name_th' => $this->input->post('cat_name_th'),
			'cat_name_en' => $this->input->post('cat_name_en'),
			'description_th' => $this->input->post('description_th'),
			'description_en' => $this->input->post('description_en'),
			'cat_gender' => $this->input->post('cat_gender'),
			'is_active' => $is_act
		);

		$this->db->insert('categories', $data); 
	}
	
	function edit($cat_id)
	{
		$is_act = 1;
		if($this->input->post('is_active')==FALSE)
		{
			$is_act=0;
		}
	   
		$data = array(
			'cat_name_th' => $this->input->post('cat_name_th'),
			'cat_name_en' => $this->input->post('cat_name_en'),
			'description_th' => $this->input->post('description_th'),
			'description_en' => $this->input->post('description_en'),
			'cat_gender' => $this->input->post('cat_gender'),
			'is_active' => $is_act
		);
		
		$this->db->update('categories',$data,array('cat_id'=>$cat_id));
	}
	
	function delete($cat_id)
	{	
		$this->db->delete('categories',array('cat_id'=>$cat_id));
	}
	
	function get($cat_id = FALSE)
	{
	
	    if ($cat_id === FALSE) 
		{
			$query = $this->db->get_where('categories');
			return $query->result();
	    }
		//$query = $this->db->query("SELECT *,c1.cat_name_en as parent_name FROM `categories` as c1 inner join `categories` as c2 on c1.cat_id = c2.cat_parent");
	    $query = $this->db->get_where('categories', array('cat_id' => $cat_id));
		
	    return $query->row();
	}
	
	function get_by_gender($cat_gender)
	{
		$this->db->order_by('cat_name_en','asc');
	    $query = $this->db->get_where('categories', array('cat_gender' => $cat_gender , 'is_active' => '1'));
		
	    return $query->result();
	}
	
	function get_by_name($cat_name_th = FALSE, $cat_name_en = FALSE)
	{
		if ($cat_name_th === FALSE) 
		{
			$query = $this->db->get_where('categories',array('cat_name_en' => $cat_name_en));
			return $query->result();
	    }
		if ($cat_name_en === FALSE) 
		{
			$query = $this->db->get_where('categories',array('cat_name_th' => $cat_name_th));
			return $query->result();
	    }
				
	    $this->db->where('cat_name_th',$cat_name_th);
		$this->db->or_where('cat_name_en',$cat_name_en); 
		$query = $this->db->get('categories');
	    return $query->row();
	}
	
	function search($gender, $name)
	{
		$where = "";
		if ($gender != "0" && $gender != FALSE) $where = $where . "cat_gender = '" . $gender."'";
		if ($name != "" && $name != " " && $name != FALSE)
		{
			if ($where != "" ) $where = $where . " AND ";
			$where = $where . "(cat_name_th LIKE '%".$name."%' OR cat_name_en LIKE '%".$name."%')";
		}		
		if ($where != "" ) $query = $this->db->get_where('categories', $where);
		else $query = $this->db->get('categories');
		//echo $where;
		return $query->result();
	}
	
	function has_products_under_category($cat_id=false)
	{
		if($cat_id !=false)
		{
			$query = $this->db->get_where('products',array('cat_id' => $cat_id));
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
	/*
	function has_categories_under_category($cat_id=false)
	{
		if($cat_id !=false)
		{
			$query = $this->db->get_where('categories_parent',array('cat_parent' => $cat_id));
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
	*/
}
?>