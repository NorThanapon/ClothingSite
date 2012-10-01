
<?php


class Brand_model extends CI_Model 
{
	var $brand_id = '';
    var $brand_name = '';
    var $description = '';
    var $logo = '';
    var $size_chart = '';
	var $is_active = '';


    function __construct() 
	{
        parent::__construct();
    }
	
	function add($logo_name)
	{
		$this->brand_id = $this->input->post('brand_id');
		$this->brand_name = $this->input->post('brand_name');
		$this->description = $this->input->post('description');
		$this->logo = $logo_name;
		$isAct = 1;
		if($this->input->post('is_active') == FALSE)
		{
			$isAct = 0;
		}
		$this->is_active = $isAct;
		$this->db->insert('brands',$this);
	}
	
	function edit($brand_id,$logo_name=FALSE)
	{	
		$isAct = 1;
		if($this->input->post('is_active')==FALSE)
		{
			$isAct=0;
		}
	    $data = array(						
		    'brand_name' => $this->input->post('brand_name'),
		    'description' => $this->input->post('description'),
			'is_active' => $isAct
		);
		if($logo_name !== FALSE)
		{
			$data['logo'] = $logo_name;
		}
		$this->db->update('brands', $data, array('brand_id' => $brand_id)); 	
	}
	
	function delete($brand_id,$logo_name)
	{
		unlink($logo_name);
		$this->db->delete('brands',array('brand_id' => $brand_id));	
		
	}
	
	function get($brand_id = FALSE)
	{
	    if ($brand_id === FALSE) 
		{
			$query = $this->db->get('brands');	
			return $query->result();
	    }
	    $query = $this->db->get_where('brands', array('brand_id' => $brand_id));
	    if ($query->num_rows() > 0)
		return $query->row();
	    return FALSE;
	}
	
	function get_by_name($brand_name = FALSE)
	{
	
	    if ($brand_name === FALSE) 
		{
			$query = $this->db->get('brands');	
			return $query->result();
	    }
	    $query = $this->db->get_where('brands', array('brand_name' => $brand_name));
	    if ($query->num_rows() > 0)
		return $query->row();
	    return FALSE;
	}
	
	function search($keyword)
	{		
		$where = "";
		if ($keyword != "" && $keyword != " " && $keyword != FALSE)
		{
			 $where = $where."(brand_name LIKE '%".$keyword."%' OR description LIKE '%".$keyword."%')";
			 $query = $this->db->get_where('brands',$where);
			 return $query->result();	
		}
		$query = $this->db->get('brands');
		return $query->result();
	}
	
	function brand_has_product($brand_id)
	{
		$query = $this->db->get_where('products', array('brand_id' => $brand_id));
		if($query->num_rows()>0)
		{
			return TRUE;
		}
		return FALSE;
	}
}
?>