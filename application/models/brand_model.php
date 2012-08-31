
<?php


class Brand_model extends CI_Model 
{
    var $brand_name = '';
    var $description = '';
    var $logo = '';
    var $size_chart = '';
	var $isActive = '';


    function __construct() 
	{
        parent::__construct();
    }
	
	function add($logo_name)
	{
		$this->brand_name = $this->input->post('brand_name');
		$this->description = $this->input->post('description');
		$this->logo = $logo_name;
		$isAct = 1;
		if($this->input->post('isActive') == FALSE)
		{
			$isAct = 0;
		}
		$this->isActive = $isAct;
		$this->db->insert('brands',$this);
	}
	
	function edit($brand_name,$logo_name=FALSE)
	{	
		$isAct = 1;
		if($this->input->post('isActive')==FALSE)
		{
			$isAct=0;
		}
	    $data = array(						
		    'brand_name' => $this->input->post('brand_name'),
		    'description' => $this->input->post('description'),
			'isActive' => $isAct
		);
		if($logo_name !== FALSE)
		{
			$data['logo'] = $logo_name;
		}
		$this->db->update('brands', $data, array('brand_name' => $brand_name)); 	
	}
	
	function delete($brand_name,$logo_name)
	{
		unlink($logo_name);
		$this->db->delete('brands',array('brand_name' => $brand_name));	
		
	}
	
	function get($brand_name = FALSE)
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
	
	function brand_has_product($brand_name)
	{
		$query = $this->db->get_where('products', array('brand_name' => $brand_name));
		if($query->num_rows()>0)
		{
			return TRUE;
		}
		return FALSE;
	}
}
?>