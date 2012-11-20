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
			
		
		$this->load->model('order_model');
		$data['orders'] = $this->order_model->get_order();
		$data['page'] = 'order/list';
        $this->load->view('main_admin_page',$data);		
       
    }
}
?>