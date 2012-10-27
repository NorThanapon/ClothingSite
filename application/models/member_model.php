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
			'username' => $this->input->post('username'),
			'password' => $this->encrypt->encode($this->input->post('password')),
			'e_mail' => $this->input->post('e_mail')
		);
		$this->db->insert('members',$data);
	}
	function get($username)
	{
		$query = $this->db->get_where('members', array('username' => $username));
        return $query->row();
	}
}
?>