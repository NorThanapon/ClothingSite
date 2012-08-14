<?php
class Order extends CI_Controller 
{
    public function index() 
    {
        if(!check_authen('staff',TRUE)) 
        {
            return;
        }
        $data['page_title'] = 'Admin: Order Management';
        $this->load->view('order/list',$data);
    }
}
?>