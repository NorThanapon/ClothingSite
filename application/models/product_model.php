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
		$on_sale = 0;		
		if($this->input->post('on_sale')==true)
		{			
			$on_sale = 1;
		}
		$data = array(
			//'product_id' => $this->input->post('product_id'),
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
			'on_sale'   => $on_sale,
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
		$on_sale = 0;		
		if($this->input->post('on_sale')==true)
		{			
			$on_sale = 1;
		}
		
		
		$data = array(
			//'product_id' => $this->input->post('product_id'),
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
			'on_sale'   => $on_sale,
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
		
		
		if ($where != "" ) $query = $this->db->get_where('products_brands_categories', $where);
		else $query = $this->db->get('products_brands_categories');
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
		$sql = "DELETE FROM `images` WHERE product_id in(".$products.")";
		$this->db->query($sql);	
		$sql = "DELETE FROM `products` WHERE product_id in(".$products.")";
		$this->db->query($sql);		
		
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
	
	function save_main_image($image_id)
	{			
		//echo "model>>".$this->input->post('product_id')."...".$image_id;
		$data = array(
			'product_id' => $this->input->post('product_id'),
			'main_image' => $image_id
		);
		$this->db->update('products',$data,array('product_id'=>$this->input->post('product_id')));
	}
	function get_last_id()
	{		
		//$query = $this->db->get('products')->order_by("product_id", "desc"); 
		$query = $this->db->query("SELECT  *  FROM `products` order by product_id desc");
		return $query->row(0);
	}
	function get_product_brand_image($brand_name)
	{
	
		//$this->db->distinct('product_id');
	    $query =  $this->db->query("SELECT distinct(product_id),main_image,`product_name_th`,`product_name_en`,`markup_price`,`markdown_price`,`on_sale`,`image_file_name` FROM `products_brands_items_images_colors` where brand_name='".$brand_name."'and image_id = main_image ");
	    //$query = $this->db->get_where('products_brands_items_images_colors', array('brand_name' => $brand_name , 'image_id' => 'main_image' ));
		
		
	    return $query->result();
	}
	

}
?>