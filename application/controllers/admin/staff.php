<?php

class Staff extends CI_Controller {
    public function index() {
            
    }
    
    public function add_staff() {
        $this->load->view('staff/add_staff_view');
    }
    
    public function process_add_staff() {
        $this->load->model('staff_model');
        $this->staff_model->add_staff();
        $this->load->view('staff/add_staff_view');
    }
    
}
    
?>