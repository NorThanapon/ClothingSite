<?php
class Inventory extends CI_Controller 
{
    public function index() 
    {
        if(!check_authen('staff',TRUE)) 
        {
            return;
        }
		$this->load->model('product_model');
		$this->load->model('item_model');
        $data['page_title'] = 'Admin: Inventory Management';
		$data['product_list'] = $this->product_model->get();
		$data['item_list'] = $this->item_model->get();
        $this->load->view('inventory/list',$data);
    }
	
	public function add()
	{
		$data['dup_message_th']="";
		$data['dup_message_en']="";
		if(!check_authen('staff',TRUE)) {	
			return;       
	    }
		$this->load->model('item_model');
		$data['items'] = $this->item_model->get();
		$this->load->model('product_model');
		$data['products'] = $this->product_model->get();
		
		//authenticated
		$data['page_title'] = 'Admin: Inventory Management';
		$this->load->model('product_model');
		$data['products'] = $this->product_model->get();
		if (!$this->input->post('submit')) 
	    {    
			$this->load->view('inventory/add',$data);
			return;
	    }
		
		$data['form_item_id'] = $this->input->post('item_id');
		$data['form_product_id'] = $this->input->post('product_id');
		$data['form_size'] = $this->input->post('size');
		$data['form_color'] = $this->input->post('color');
		$data['form_quantity'] = $this->input->post('quantity');
	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('item_id', 'Item ID', 'trim|required');
		$this->form_validation->set_rules('product_id', 'Product ID', 'trim|required');
		$this->form_validation->set_rules('size', 'Size', 'trim|required');
		$this->form_validation->set_rules('color_id', 'Color', 'trim|required');
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
	
		if ($this->form_validation->run() == FALSE)
        {
            $data['error_message'] = 'Please fill in the field that is required';
			$data['item'] = $this->item_model->get();
			$data['product'] = $this->product_model->get();    
			$this->load->view('inventory/add', $data);
            return;
    	}
		$this->item_model->add();
		
		// update total quantity of products
		
		redirect('admin/inventory');	

	}
	
}
?>