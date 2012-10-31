<?php
class Member_model extends CI_Model 
{
	var $e_mail = '';
	var $member_username = '';
	var $member_password = '';
	
	function __construct() 
 	{
        parent::__construct();
    }
	function add()
	{
		$this->load->library('encrypt');
		$data = array(
			'e_mail' => $this->input->post('e_mail'),
			'password' => $this->encrypt->encode($this->input->post('password'))
		);
		$this->db->insert('members',$data);
	}
	function get($e_mail)
	{
		$query = $this->db->get_where('members', array('e_mail' => $e_mail));
        return $query->row();
	}
	function change_password($e_mail,$password)
	{
		$this->load->library('encrypt');
		$data = array(
			'password' => $this->encrypt->encode($password)
		);
		$this->db->update('members',$data,array('e_mail'=>$e_mail));
	}
	
}
?>