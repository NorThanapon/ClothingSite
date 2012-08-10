<?php

class Authen extends CI_Controller {
    public function index() {
            
    }
    
    public function login_staff(){
        if (!$this->input->post('username')) { //no authen
            $this->_redirect(FALSE);
            return;
        }
        
        $this->load->library('encrypt');
        $this->load->model('staff_model');
        $query = $this->staff_model->get_staff($this->input->post('username'));
        if($query->num_rows() <= 0){    //no username
            $this->_redirect(TRUE);
            return;
        }
        
        $staff = $query->row();
        if($this->encrypt->decode($staff->password) != $this->input->post('password')){ //false password
            $this->_redirect(TRUE);
            return;
        }
        
        $data = array(
           'username'  => $staff->username,
           'logged_in'  => TRUE,
           'role' => 'staff'
        );
        $this->session->set_userdata($data);
        redirect($this->session->flashdata('redirect_url'));
    }
    
    function _redirect($fail_authen) {
        $data['page_title'] = 'Admin: Log In';
        $data['fail_authen'] = $fail_authen;
        $this->session->set_flashdata('redirect_url', $this->session->flashdata('redirect_url'));
        $this->load->view('staff/login', $data);
    }
    
    public function logout()    {
        $this->session->sess_destroy();
        redirect();
    }
}