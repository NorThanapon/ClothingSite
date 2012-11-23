<?php
class Image_model extends CI_Model 
{
	function __construct() 
 	{
        parent::__construct();
    }
	function add_photo($file_name)
	{		
		$data = array(
		    'product_id' => $this->input->post('product_id'),	
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
		//echo "$file_name>".$file_name;
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
                $query = $this->db->get('images');	
                return $query->result();
        }
        $query = $this->db->get_where('images', array('product_id' => $product_id));
        //if ($query->num_rows() > 0)
        return $query->result();
        //return FALSE;
    }
	function get($image_id){
		$query = $this->db->get_where('images',array('image_id' => $image_id));
		return $query->row();
	}
	function get_where($where){									
		$query = $this->db->query("SELECT * 
									FROM  `images` 
									WHERE  `image_id` 
									IN ( ".$where." )  ");
		return $query->result();
	}
	function add_item_image($item_id , $image_id){
		$data = array(
		    'item_id' => $item_id,	
			'image_id'=> $image_id
		);
		
		$this->db->insert('items_images',$data);
	}	
	
	
	function get_item_image($item_id = FALSE){
		if($item_id === FALSE){
			$query = $this->db->get('items_images');
			return $query->result();
		}
		$query = $this->db->get_where('items_images', array('item_id'=>$item_id));

		return $query->result();
		
	}	
	
	function delete_item_image($item_id,$image_id){
	
		if($image_id == null){
			$this->db->delete('items_images',array('item_id' => $item_id));	
			return;
		}
		$this->db->delete('items_images',array('item_id' => $item_id,'image_id'=>$image_id));	
		return;
	}
	/*
	function edit_color($photo_id,$color_id)
	{
		$data = array(
			'color_id' => $color_id,			
			);
		$this->db->update('images',$data,array('image_id'=>$photo_id));
	}
	*/

}
?>