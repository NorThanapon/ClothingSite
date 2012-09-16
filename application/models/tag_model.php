<?php

class Tag_model extends CI_Model 
{
	var $tag_id = '';
    var $tag_name_th = '';
    var $tag_name_en = '';
    var $description_en = '';
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
			'tag_name_th' => $this->input->post('cat_name_th'),
			'tag_name_en' => $this->input->post('cat_name_en'),
			'description_en' => $this->input->post('description_en'),
			'isActive' => $isAct
			);
		$this->db->insert('tags', $data); 
	}
	
	function edit($cat_id)
	{
		$isAct = 1;
		if($this->input->post('isActive')==FALSE)
		{
			$isAct=0;
		}
		$data = array(
			'tag_name_th' => $this->input->post('cat_name_th'),
			'tag_name_en' => $this->input->post('cat_name_en'),
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
	
	/*function search($parent, $name)
	{
		$where = "";
		if ($parent != "0" && $parent != FALSE) $where = $where . "cat_parent = " . $parent;
		if ($name != "" && $name != " " && $name != FALSE)
		{
			if ($where != "" ) $where = $where . " AND ";
			$where = $where . "(tag_name_th LIKE '%".$name."%' OR cat_name_en LIKE '%".$name."%')";
		}
		
		if ($where != "" ) $query = $this->db->get_where('categories_parent', $where);
		else $query = $this->db->get('categories_parent');
		return $query->result();
	}*/

}
?>