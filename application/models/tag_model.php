<?php

class Tag_model extends CI_Model 
{
	var $tag_id = '';
    var $tag_name_th = '';
    var $tag_name_en = '';
    var $description_en = '';
	var $total_quality='';
	var $isActive = '';

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
		if($this->input->post('isActive')==FALSE)
		{
			$isAct = 0;
		}		
		$data = array(
			'tag_name_th' => $this->input->post('tag_name_th'),
			'tag_name_en' => $this->input->post('tag_name_en'),
			'description_en' => $this->input->post('description_en'),
			'isActive' => $isAct,
			'total_quantity'  => $this->input->post('total_quantity'),
			);
		$this->db->insert('tags', $data); 
	}
	
	function edit($tag_id)
	{
		$isAct = 1;
		if($this->input->post('isActive')==FALSE)
		{
			$isAct=0;
		}
		$data = array(
			'tag_name_th' => $this->input->post('tag_name_th'),
			'tag_name_en' => $this->input->post('tag_name_en'),
			'description_en' => $this->input->post('description_en'),
			'isActive' => $isAct
			);

		$this->db->update('tags',$data,array('tag_id'=>$tag_id));
	}
	
	function delete($tag_id)
	{	
		$this->db->delete('tags',array('tag_id'=>$tag_id));
	}
	
	function get($tag_id = FALSE)
	{
	    if ($tag_id === FALSE) 
		{
			$query = $this->db->query("SELECT * FROM tags;");
			return $query->result();
	    }
		//$query = $this->db->query("SELECT *,c1.cat_name_en as parent_name FROM `categories` as c1 inner join `categories` as c2 on c1.cat_id = c2.cat_parent");
	    $query = $this->db->post(array('tag_id' => $tag_id));
		
	    return $query->row();
	}
	function get_product_in_tag($tag_id)
	{
		$this->db->select('*');
		$this->db->from('produtcts');
		$this->db->join('products_tags', 'products.product_id = products_tags.product_id');
		$this->db->where('tag_id',$tag_id);
		$query = $this->db->get();
	    return $query->result();
	}
	
	function search($name)
	{
		$where = "";
		if ($name != "" && $name != " " && $name != FALSE)
		{
			if ($where != "" ) $where = $where . " AND ";
			$where = $where . "(tag_name_th LIKE '%".$name."%' OR tag_name_en LIKE '%".$name."%')";
		}
		return $query->result();
	}

}
?>