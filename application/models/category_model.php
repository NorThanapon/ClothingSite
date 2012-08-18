
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
		$data = array(
						
						'cat_name_th' =>  $this->input->post('cat_name_th'),
						'cat_name_en' =>  $this->input->post('cat_name_en'),
						'description_th' => $this->input->post('description_th'),
						'description_en ' => $this->input->post('description_en'),
						'cat_parent' => $this->input->post('cat_parent')
					);
		$this->db->insert('categories', $data); 
	}
	
	function edit($cat_id)
	{
		$data = array(
			'cat_name_th' = $this->input->post('cat_name_th');
			'cat_name_en' = $this->input->post('cat_name_en');
			'description_th' = $this->input->post('description_th');
			'description_en' = $this->input->post('description_en');
			if($this->input->post('cat_parent')!="")
			{
				'cat_parent' = $this->input->post('cat_parent');
			}			
		};
		$this->db->update('categories',$data,array('cat_id'=>$cat_id));
		//$this->db->update('categories',$this,array('brand_name' => $this->input->post('brand_name')));
	}
	
	function delete()
	{
	
		$this->db->delete('categories',array('cat_id'=>$this->input->post('cat_id')));
	}
	
	function get($cat_id = FALSE)
	{
	
	    if ($cat_id === FALSE) 
		{
			$query = $this->db->get('categories');	
			return $query->result();
	    }
	    $query = $this->db->get_where('categories', array('cat_id' => $cat_id));
	    return $query->row();
	}
	
	/*function get_parent()
	{
		$query = $this->db->query("SELECT * FROM categories;");
		//$query = $this->db->get_where('categories', array('cat_id' => $cat_id));
	    return $query->row();	
	}*/
	
	
	
	
}
?>