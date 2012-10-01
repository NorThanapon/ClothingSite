<?php
class Product_model extends CI_Model 
{
	var $product_id = '';
	var $product_name_th ='';
	var $product_name_en = '';
	var $brand_name = '';
	var $cat_id = '';
	var $total_quantity = '';
	var $markup_price = '';
	var $markdown_price = '';
	var $description_th = '';
	var $description_en = '';
	var $how_to_wash_th = '';
	var $how_to_wash_en = '';
	var $date_add = '';
	var $is_active = '';
	
	function __construct() 
 	{
        parent::__construct();
    }

	function add()
	{		
		$is_active = 0;
		if($this->input->post('is_active')==true)
		{
			$is_active = 1;
		}
		$data = array(
			'product_id' => $this->input->post('product_id'),
			'product_name_th' => $this->input->post('product_name_th'),
			'product_name_en' => $this->input->post('product_name_en'),
			'brand_id' => $this->input->post('brand_id'),
			'cat_id'  => $this->input->post('cat_id'),
			'total_quantity'  => $this->input->post('total_quantity'),
			'markup_price' => $this->input->post('markup_price'),
			'markdown_price'  => $this->input->post('markdown_price'),
			'description_th'  => $this->input->post('description_th'),
			'description_en'  => $this->input->post('description_en'),
			'how_to_wash_th'  => $this->input->post('how_to_wash_th'),
			'how_to_wash_en'  => $this->input->post('how_to_wash_en'),
			'date_add' =>   $date = date("Y-m-d H:i:s"),
			'is_active' => $is_active
		);
		$this->db->insert('products',$data);
	}
	
	function edit($product_id)
	{
		$is_active = 0;
		if($this->input->post('is_active')==true)
		{
			$is_active = 1;
		}
		
		
		$data = array(
			'product_id' => $this->input->post('product_id'),
			'product_name_th' => $this->input->post('product_name_th'),
			'product_name_en' => $this->input->post('product_name_en'),
			'brand_id' => $this->input->post('brand_id'),
			'cat_id'  => $this->input->post('cat_id'),
			'total_quantity'  => $this->input->post('total_quantity'),
			'markup_price' => $this->input->post('markup_price'),
			'markdown_price'  => $this->input->post('markdown_price'),
			'description_th'  => $this->input->post('description_th'),
			'description_en'  => $this->input->post('description_en'),
			'how_to_wash_th'  => $this->input->post('how_to_wash_th'),
			'how_to_wash_en'  => $this->input->post('how_to_wash_en'),
			'is_active'   => $is_active
		);
		$this->db->update('products',$data,array('product_id'=>$product_id));
	}
	
	function delete($product_id)
	{	
		$this->db->delete('products',array('product_id'=>$product_id));
	}
	
	function get($product_id = FALSE)
	{
	
	    if ($product_id === FALSE) 
		{
			$query = $this->db->get_where('products_brands_categories');
			return $query->result();
	    }
	    $query = $this->db->get_where('products_brands_categories', array('product_id' => $product_id));
	    return $query->row();
	}
	
	function get_by_name($product_name = FALSE)
	{
	
	    $where = "";
		if($product_name === FALSE)
		{
			$query = $this->db->get('products');
			if ($query->num_rows() > 0)
				return $query->result();
			return FALSE;
		}
		if ($product_name != "" && $product_name != " " && $product_name != FALSE)
		{
			if ($where != "" ) $where = $where . " AND ";
			$where = $where . "(product_name_en LIKE '%".$product_name."%' OR product_name_th LIKE '%".$product_name."%')";
		}
		
	   if ($where != "" ) $query = $this->db->get_where('products', $where);
			return $query->result();
	}
	
	function get_by_brand_id($brand_id = FALSE)
	{
	    if ($brand_id === FALSE) 
		{
			$query = $this->db->get_where('products_brands_categories');
			return $query->result();
	    }
	    $query = $this->db->get_where('products_brands_categories', array('brand_id' => $brand_id));
	    return $query->result();
	}
	
	function select($query)
	{
		$query = $this->db->query($query);
		return $query->result();
	
	}
	
	function search($product_cat, $brand, $status, $name)
	{
		$where = "";
		if ($product_cat != "0" && $product_cat != FALSE) $where = $where . "cat_id = " . $product_cat;
		if ($name != "" && $name != " " && $name != FALSE)
		{
			if ($where != "" ) $where = $where . " AND ";
			$where = $where . "(product_name_th LIKE '%".$name."%' OR product_name_en LIKE '%".$name."%')";
		}
		if ($brand != "0" && $brand != FALSE)
		{
			if ($where != "" ) $where = $where . " AND ";
			$where = $where . "brand_name LIKE '%".$brand."%'";
		}
		if($status != "2")
		{
			if ($where != "" ) $where = $where . " AND ";
			$where = $where . "is_active = ".$status;
		}
		
		
		if ($where != "" ) $query = $this->db->get_where('products', $where);
		else $query = $this->db->get('products');
		return $query->result();
	}
	function update_status($products)
	{
		$this->db->update_batch('products',$products,'product_id'); 		
	}
	function delete_batch($products)
	{
		//DELETE FROM `products` WHERE product_id in( '5','i')
		//$this->db->delete('products', array('id' =>$products )); 
		//$this->db->where('product_id', $products);
		//$this->db->delete('products'); 	
		$sql = "DELETE FROM `products` WHERE product_id in(".$products.")";
		$this->db->query($sql);		
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
	function has_items_under_products($product_ids)
	{
		
		
		//$query = $this->db->get_where('items',array('product_id' => $product_id));
		$this->db->where_in('product_id',$product_ids);	
		$query = $this->db->get('items');
			
		
		if($query->num_rows()>0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	

}
?>