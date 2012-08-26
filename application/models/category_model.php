
<?php


class Category_model extends CI_Model 
{
	var $cat_id = '';
    var $cat_name_th = '';
    var $cat_name_en = '';
    var $description_th = '';
    var $description_en = '';
    var $cat_parent = '';

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
		if($this->input->post('cat_parent')!="")
		{
				$data = array(
					'cat_name_th' => $this->input->post('cat_name_th'),
					'cat_name_en' => $this->input->post('cat_name_en'),
					'description_th' => $this->input->post('description_th'),
					'description_en' => $this->input->post('description_en'),
				    'cat_parent' => $this->input->post('cat_parent')
				);
		}	
		else
		{
			$data = array(
					'cat_name_th' => $this->input->post('cat_name_th'),
					'cat_name_en' => $this->input->post('cat_name_en'),
					'description_th' => $this->input->post('description_th'),
					'description_en' => $this->input->post('description_en'),
				);
		}
		
		$this->db->insert('categories', $data); 
	}
	
	function edit($cat_id)
	{
		
	    if($this->input->post('cat_parent')!="")
		{
				$data = array(
					'cat_name_th' => $this->input->post('cat_name_th'),
					'cat_name_en' => $this->input->post('cat_name_en'),
					'description_th' => $this->input->post('description_th'),
					'description_en' => $this->input->post('description_en'),
				    'cat_parent' => $this->input->post('cat_parent')
				);
		}	
		else
		{
			$data = array(
					'cat_name_th' => $this->input->post('cat_name_th'),
					'cat_name_en' => $this->input->post('cat_name_en'),
					'description_th' => $this->input->post('description_th'),
					'description_en' => $this->input->post('description_en'),
					'cat_parent' => NULL
				);
		}
		
		$this->db->update('categories',$data,array('cat_id'=>$cat_id));
		//$this->db->update('categories',$this,array('brand_name' => $this->input->post('brand_name')));
	}
	
	function delete($cat_id)
	{	
		$this->db->delete('categories',array('cat_id'=>$cat_id));
	}
	
	function get($cat_id = FALSE)
	{
	
	    if ($cat_id === FALSE) 
		{
			$query = $this->db->get_where('categories_parent');
			return $query->result();
	    }
		//$query = $this->db->query("SELECT *,c1.cat_name_en as parent_name FROM `categories` as c1 inner join `categories` as c2 on c1.cat_id = c2.cat_parent");
	    $query = $this->db->get_where('categories_parent', array('cat_id' => $cat_id));
		
	    return $query->row();
	}
	
	function get_by_name($cat_name_th = FALSE, $cat_name_en = FALSE)
	{
		if ($cat_name_th === FALSE) 
		{
			$query = $this->db->get_where('categories_parent',array('cat_name_en' => $cat_name_en));
			return $query->result();
	    }
		if ($cat_name_en === FALSE) 
		{
			$query = $this->db->get_where('categories_parent',array('cat_name_th' => $cat_name_th));
			return $query->result();
	    }
				
	    $this->db->where('cat_name_th',$cat_name_th);
		$this->db->or_where('cat_name_en',$cat_name_en); 
		$query = $this->db->get('categories_parent');
	    return $query->row();
	}
	
	function select($query)
	{
		$query = $this->db->query($query);
		return $query->result();
	
	}
	
	function search($parent, $name)
	{
		$where = "";
		if ($parent != "0" && $parent != FALSE) $where = $where . "cat_parent = " . $parent;
		if ($name != "" && $name != " " && $name != FALSE)
		{
			if ($where != "" ) $where = $where . " AND ";
			$where = $where . "(cat_name_th LIKE '%".$name."%' OR cat_name_en LIKE '%".$name."%')";
		}
		
		if ($where != "" ) $query = $this->db->get_where('categories_parent', $where);
		else $query = $this->db->get('categories_parent');
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
	
}
?>