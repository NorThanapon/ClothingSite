<?php
class Cart_model extends CI_Model 
{
	function __construct() 
 	{
        parent::__construct();
    }
	
	function validate_add_cart_item(){
		//$size = $this->input->post('ddl-size');
		//$color_id = $this->input->post('txt-color-image');
		
		$item_id = $this->input->post('item_id');
		$quantity = $this->input->post('quantity');
		
		$query = $this->db->get_where('items',array('item_id'=>$item_id));
		if($query->num_rows > 0){
			return $query->row();
		}
		else{
			return false;
		}
	
	}
	
	function get_item($where){
		$query = $this->db->get_where('items',$where);
		if($query->num_rows() > 1){
			return $query->result();
		}
		return $query->row();
	}
	
	function get_item_detail($where)
	{
		$query = $this->db->query("SELECT *
								   FROM products p
								   LEFT JOIN items i ON p.product_id = i.product_id
								   LEFT JOIN colors c ON c.color_id = i.color_id
								   LEFT JOIN images m ON m.image_id = p.main_image
								   WHERE item_id IN(".$where.")");
		return $query->result();
	}
	
	function get_item_id($size,$color_id){
		$query = $this->db->query("SELECT *
								   FROM products_items_colors
								   WHERE size = '".$size."' AND color_id = ".$color_id);
		return $query->row();
	}
	
	/*
	function get_item_detail($where)
	{
		$query = $this->db->query("SELECT DISTINCT item_id, product_name_en, product_name_th, markup_price, markdown_price, image_id, image_file_name,
												   color_id, on_sale, color_name, size, quantity
									FROM products_brands_items_images_colors
									WHERE item_id IN (".$where.")
									AND main_image = image_id");
		return $query->result();
	}
	*/
}
?>