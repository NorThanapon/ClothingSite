<?php
class Orderhistory extends CI_Controller {
    public function index() 
	{
		$data['page_title'] = 'Oeder history | BfashShop';
		$data['error'] = "No";
		$this->load->model('order_model');
		$e_mail = $this->input->post('e_mail');
		$data["orders"] = $this->order_model-> get_member_order($e_mail);		
		
		$data['page'] = 'order_history';
        $this->load->view('sub_page',$data);
		
      
    }	
}
?>