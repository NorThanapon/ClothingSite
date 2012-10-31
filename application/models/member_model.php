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
	function update_member_profile()
	{		
		$data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'telephone	' => $this->input->post('telephone'),
			'mobile' => $this->input->post('mobile'),
			'address' => $this->input->post('address'),
			'postcode' => $this->input->post('postcode')
		);
		$this->db->update('members',$data,array('e_mail'=>$this->input->post('e_mail')));
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