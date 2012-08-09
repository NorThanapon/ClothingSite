<?php

class Authen extends CI_Controller {
    public function index() {
            
    }
    
    public function authen_staff(){
        $this->load->library('encrypt');
        $this->load->model('staff_model');
        $query = $this->staff_model->get_staff($this->input->post('username'));
        if($query->num_rows() > 0){
            $staff = $query->row();
            if($this->encrypt->decode($staff->password) == $this->input->post('password')){
                echo "yes";
                $data = array(
                   'username'  => $staff->username,
                   'logged_in'  => TRUE,
                   'role' => 'staff'
                );
                $this->session->set_userdata($data);
                echo $this->session->userdata('username');
            }
            echo 'no';
        }
        else {
            echo 'no';
        }
    }
    
    public function logout()    {
        $this->session->sess_destroy();
        //redirect;
    }
}