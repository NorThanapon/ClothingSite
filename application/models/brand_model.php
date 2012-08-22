
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
	
	function add($logo_name)
	{
		$this->brand_name = $this->input->post('brand_name');
		$this->description = $this->input->post('description');
		$this->logo = $logo_name;
		$this->db->insert('brands',$this);
	}
	
	function edit($brand_name,$logo_name=FALSE)
	{	
	    $data = array(						
		    'brand_name' => $this->input->post('brand_name'),
		    'description' => $this->input->post('description')						
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
	
}
?>