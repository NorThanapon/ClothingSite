<?php
class Image_model extends CI_Model 
{
	function __construct() 
 	{
        parent::__construct();
    }
	function add_photo($file_name,$color_id)
	{		
		$data = array(
		    
		    'product_id' => $this->input->post('product_id'),	
			'color_id' => $color_id,
			'file_name'=>$file_name
			);
		$this->db->insert('images',$data);
	}
	function delete_photo($photo_id,$file_name)
	{
		unlink($file_name);
		$this->db->delete('images',array('image_id' => $photo_id));	
		
	}
	function unlink_image($file_name)
	{
		unlink($file_name);
	}
	function get_latest()
    {
		$this->db->order_by('image_id', 'desc');
		$this->db->limit(1);
        $query = $this->db->get('images');	
		//echo "in DB ".$query->row();
        return $query->row();	
    }
	function get_photo_file($image_id)
	{
		$query = $this->db->get_where('images', array('image_id' => $image_id));
		return $query->row();
	}
	function get_photos($product_id=false)
    {
        if ($product_id === FALSE) 
        {
                $query = $this->db->get('images_colors');	
                return $query->result();
        }
        $query = $this->db->get_where('images_colors', array('product_id' => $product_id));
        //if ($query->num_rows() > 0)
        return $query->result();
        //return FALSE;
    }
	function edit_color($photo_id,$color_id)
	{
		$data = array(
			'color_id' => $color_id,			
			);
		$this->db->update('images',$data,array('image_id'=>$photo_id));
	}
	

}
?>