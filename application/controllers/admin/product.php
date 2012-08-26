<?php
class Product extends CI_Controller 
{
    public function index() 
    {
        if(!check_authen('staff',TRUE)) 
        {
            return;
        }
		$this->load->model('product_model');
		$this->load->model('category_model');
        $data['page_title'] = 'Admin: Product Management';
		$data['product_list'] = $this->product_model->get();
		$data['category_list'] = $this->category_model->get();
        $this->load->view('product/list',$data);
    }
	
	public function add() 
	{
		$data['dup_message_th']="";
		$data['dup_message_en']="";
		if(!check_authen('staff',TRUE)) {	
			return;       
	    }
		//authenticated
		$data['page_title'] = 'Admin: Product Management';
		$this->load->model('product_model');
		$data['products'] = $this->product_model->get();
		if (!$this->input->post('submit')) 
	    {    
			$this->load->view('product/add',$data);
			return;
	    }
		//form submitted
		$data['form_product_id'] = $this->input->post('product_id');
		$data['form_product_name_th'] = $this->input->post('product_name_th');
		$data['form_product_name_en'] = $this->input->post('product_name_en');
		$data['brand_name'] = $this->input->post('brand_name');
		$data['cat_id'] = $this->input->post('cat_id');
		$data['total_quantity'] = $this->input->post('total_quantity');
		$data['markup_price']  = $this->input->post('markup_price');
		$data['markdown_price']  = $this->input->post('markdown_price');
		$data['description_th']  = $this->input->post('description_th');
		$data['description_en']  = $this->input->post('description_en');
		$data['how_to_wash_th']  = $this->input->post('how_to_wash_th');
		$data['how_to_wash_en']  = $this->input->post('how_to_wash_en');
		$data['isActive']  = $this->input->post('isActive');
		
		$this->load->model('product_model');
        if($this->brand_model->get($data['form_product_id'])!=FALSE)
        {
            $data['error_message'] = 'Duplicate productID. The productID you entered is already existed in the database.';
            $this->load->view('product/add',$data);
            return;
        }
		//check none duplicate productID
        redirect('admin/product');	
	}
	
	public function edit()
	{
		if(!check_authen('staff',TRUE)) 
		{	
			return;       
	    }
		//authenticated
		$data['page_title'] = 'Admin: Product Management';
		if($product_id===FALSE)
        {
			redirect('admin/product');
        }
		//product input
		$this->load->model('product_model');
		if (!$this->input->post('submit')) //not pass submit
    	{			        
            $data['product'] =  $this->brand_model->get($product_id);
            if ($data['product'] == FALSE)
			{
				redirect('admin/product');
			}
            $this->load->view('product/edit',$data);
            return;
        }
		//form submitted
		$data['form_product_id'] = $this->input->post('product_id');
		$data['form_product_name_th'] = $this->input->post('product_name_th');
		$data['form_product_name_en'] = $this->input->post('product_name_en');
		$data['brand_name'] = $this->input->post('brand_name');
		$data['cat_id'] = $this->input->post('cat_id');
		$data['total_quantity'] = $this->input->post('total_quantity');
		$data['markup_price']  = $this->input->post('markup_price');
		$data['markdown_price']  = $this->input->post('markdown_price');
		$data['description_th']  = $this->input->post('description_th');
		$data['description_en']  = $this->input->post('description_en');
		$data['how_to_wash_th']  = $this->input->post('how_to_wash_th');
		$data['how_to_wash_en']  = $this->input->post('how_to_wash_en');
		$data['isActive']  = $this->input->post('isActive');
		
		$data['product'] = $this->product_model->get($this->input->post('product_id_key'));
		if($this->product_model->get($data['form_product_id'])!=FALSE && $data['form_product_id'] != $this->input->post('product_id_key'))
        {
            $data['error_message'] = 'Duplicate productID. The productID you entered is already existed in the database.';
            $this->load->view('product/edit', $data);
            return;
        }
        //none duplicate productID
		$this->product_model->edit($this->input->post('product_id_key'));
		redirect('admin/product');
	}
	
}
?>