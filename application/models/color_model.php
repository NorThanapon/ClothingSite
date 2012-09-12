<?php


class Color_model extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }
    
    function add($file_name)
    {
        $data = array(
            'color_name' => $this->input->post('color_name'),
            'file_name' => $file_name
        );
        $this->db->insert('colors',$data);
    }
    function delete($color_id, $file_name)
    {
        unlink($file_name);
	$this->db->delete('colors',array('color_id' => $color_id));	
    }
    function get($color_id = FALSE)
    {
        if ($color_id === FALSE) 
        {
                $query = $this->db->get('colors');	
                return $query->result();
        }
        $query = $this->db->get_where('colors', array('color_id' => $color_id));
        if ($query->num_rows() > 0)
            return $query->row();
        return FALSE;
    }
    function get_latest()
    {
	$this->db->order_by('color_id', 'desc');
	$this->db->limit(1);
        $query = $this->db->get('colors');	
        return $query->row();
	
    }
}