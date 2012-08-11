
<?php

class Brand_model extends CI_Model 
{

    var $brand_name = '';
    var $description = '';
    var $logo = '';
    var $size_chart = '';

    function __construct() 
	{
        parent::__construct();
    }
	
	function add($logo_name, $size_name)
	{
		$this->brand_name = $this->input->post('brand_name');
		$this->description = $this->input->post('description');
		$this->logo = $logo_name;
		$this->size_chart = $size_name;		
		$this->db->insert('brands',$this);
	}
	
	function edit()
	{
		$this->brand_name = $this->input->post('brand_name');
		$this->description = $this->input->post('description');
		$this->logo = $this->input->post('logo');
		$this->size_chart = $this->input->post('size_chart');		
		$this->db->update('brands',$this,array('brand_name' => $this->input->post('brand_name')));
	}
	
	function delete()
	{
		$this->db->delete('brands',array('brand_name' => $this->input->post('brand_name')));
	}
	
	
	function get($brand_name = FALSE)
	{
	    if ($brand_name === FALSE) 
		{
			$query = $this->db->get('brands');	
			return $query->result();
	    }
	    $query = $this->db->get_where('brands', array('brand_name' => $brand_name));
	    return $query->row_array();
	}
	
}
?>