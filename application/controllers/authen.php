<?php

class Authen extends CI_Controller {
    public function index() {
            
    }
    
    public function login_staff(){
        if ($this->input->post('username')) {
            $this->load->library('encrypt');
            $this->load->model('staff_model');
            $query = $this->staff_model->get_staff($this->input->post('username'));
            if($query->num_rows() > 0){
                $staff = $query->row();
                if($this->encrypt->decode($staff->password) == $this->input->post('password')){
                    $data = array(
                       'username'  => $staff->username,
                       'logged_in'  => TRUE,
                       'role' => 'staff'
                    );
                    $this->session->set_userdata($data);
                    
                    echo $this->session->flashdata('redirect_url');
                    redirect($this->session->flashdata('redirect_url'));
                }
                else {
                    $data['page_title'] = 'Admin: Log In';
                    $data['fail_authen'] = TRUE;
                    $this->session->set_flashdata('redirect_url', $this->session->flashdata('redirect_url'));
                    $this->load->view('staff/login', $data);
                }
            }
            else {
                $data['page_title'] = 'Admin: Log In';
                $data['fail_authen'] = TRUE;
                $this->session->set_flashdata('redirect_url', $this->session->flashdata('redirect_url'));
                $this->load->view('staff/login', $data);
            }    
        }
        else {
            $data['page_title'] = 'Admin: Log In';
            $data['fail_authen'] = FALSE;
            $this->session->set_flashdata('redirect_url', $this->session->flashdata('redirect_url'));
            $this->load->view('staff/login', $data);
        }
        
    }
    
    public function logout()    {
        $this->session->sess_destroy();
        redirect();
    }
}