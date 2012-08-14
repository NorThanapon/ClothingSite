<?php
class Product extends CI_Controller 
{
    public function index() 
    {
        if(!check_authen('staff',TRUE)) 
        {
            return;
        }
        $data['page_title'] = 'Admin: Product Management';
        $this->load->view('product/list',$data);
    }
}
?>