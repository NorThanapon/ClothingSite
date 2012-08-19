
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
			$query = $query = $this->db->query("SELECT sub_cat . * , sup_cat.cat_name_en AS  `parent_name` 
												FROM  `categories` AS sub_cat LEFT JOIN  `categories` AS sup_cat 
												ON sub_cat.cat_parent = sup_cat.cat_id");
			return $query->result();
	    }
		//$query = $this->db->query("SELECT *,c1.cat_name_en as parent_name FROM `categories` as c1 inner join `categories` as c2 on c1.cat_id = c2.cat_parent");
	    $query = $this->db->get_where('categories', array('cat_id' => $cat_id));
		
	    return $query->row();
	}
	
	/*function get_parent()
	{
		$query = $this->db->query("SELECT * FROM `categories` as c1 inner join `categories` as c2 on c1.cat_id = c2.cat_parent");
		//$query = $this->db->get_where('categories', array('cat_id' => $cat_id));
	    return $query->row();	
	}*/
	
	
	
	
}
?>