
<?php


class Category_model extends CI_Model 
{
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
		$this->cat_name_th = $this->input->post('cat_name_th');
		$this->cat_name_en = $this->input->post('cat_name_en');
		$this->description_th = $this->input->post('description_th');
		$this->description_en = $this->input->post('description_en');
		$this->cat_parent = $this->input->post('cat_parent');		
		$this->db->insert('categories',$this);
	}
	
	function edit()
	{
	//TODO:
		$this->cat_name_th = $this->input->post('cat_name_th');
		$this->cat_name_en = $this->input->post('cat_name_en');
		$this->description_th = $this->input->post('description_th');
		$this->description_en = $this->input->post('description_en');
		$this->cat_parent = $this->input->post('cat_parent');				
		//$this->db->update('categories',$this,array('brand_name' => $this->input->post('brand_name')));
	}
	
	function delete()
	{
	//TODO:
		$this->db->delete('brands',array('brand_name' => $this->input->post('brand_name')));
	}
	
	function get($brand_name = FALSE)
	{
	//TODO:
	    if ($brand_name === FALSE) 
		{
			$query = $this->db->get('brands');	
			return $query->result();
	    }
	    $query = $this->db->get_where('brands', array('brand_name' => $brand_name));
	    return $query->row();
	}
	
}
?>