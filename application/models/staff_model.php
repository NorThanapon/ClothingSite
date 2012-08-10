
<?php

class Staff_model extends CI_Model {

    var $username = '';
    var $password = '';

    function __construct() {
        parent::__construct();
    }
	
    function add_staff(){
        $this->load->library('encrypt');
        $this->username = $this->input->post('username');
        $this->password = $this->encrypt->encode($this->input->post('password'));
        
        $this->db->insert('staffs',$this);
    }
    
    function get_staff($username)
    {
        $query = $this->db->get_where('staffs', array('username' => $username));
        return $query;
    }
	
}
?>