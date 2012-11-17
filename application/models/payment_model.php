<?php
class Payment_model extends CI_Model 
{
	function __construct() 
 	{
        parent::__construct();
    }
	function add($member_id,$order_data)
	{
		
		$data = array(
			'order_id' => $this->input->post('order_id'),
			'member_id' => $member_id,
			'date_add' => $order_data['date_add'],
			'date_expire' => $order_data['date_expire'],
			'status' => 'New',
			'shipping_address' => $this->input->post('shipping_address'),
			'vat' => $this->input->post('vat'),
			'shipping_cost' => $this->input->post('shipping'),
			'total_price' => $this->input->post('total')	
		);
		
		
		$this->db->insert('orders',$data);
		
	}
	function add_order_detail($order_id,$item_id,$quantity,$unit_price)
	{
		$data = array(
			'order_id' => $order_id,
			'item_id' => $item_id,
			'quantity' => $quantity,			
			'unit_price' => $unit_price
		);	
		
		$this->db->insert('orders_detail',$data);
		
	}
	function get_order_number()
	{
		$query = $this->db->get('orders');
		return $query->num_rows();
	}
	function get_order($order_id)
	{
		$query = $this->db->get_where('orders', array('order_id' => $order_id));
        return $query->row();
	}
	function get_order_detail($order_id)
	{
	
		$query = $this->db->query("SELECT i.item_id , p.product_name_en,p.product_name_th , o.quantity , o.unit_price 
								   FROM orders_detail o left join items i on  o.item_id = i.item_id 
								   left join products p on i.product_id = p.product_id 
								   WHERE order_id IN(".$order_id.")");
		return $query->result();
	}
	function get_item($product_id,$size,$color_id)
	{
		$query = $this->db->query("SELECT item_id FROM products_items_colors WHERE product_id=".$product_id." AND size='".$size."' AND color_id=".$color_id."");
		return $query->row();
	}

	
	
}
?>