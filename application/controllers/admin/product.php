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
		$this->load->model('brand_model');
        $data['page_title'] = 'Admin: Product Management';
		$data['product_list'] = $this->product_model->get();
		$data['category_list'] = $this->category_model->get();
		$data['brand_list'] = $this->brand_model->get();
        $this->load->view('product/list',$data);
    }
	
	public function add() 
	{
		$data['dup_message_th']="";
		$data['dup_message_en']="";
		if(!check_authen('staff',TRUE)) {	
			return;       
	    }
		$this->load->model('brand_model');
		$data['brands'] = $this->brand_model->get();
		$this->load->model('category_model');
		$data['categories'] = $this->category_model->get();
		
		//authenticated
		$data['page_title'] = 'Admin: Product Management';
		$this->load->model('product_model');
		$data['products'] = $this->product_model->get();
		if (!$this->input->post('submit') && !$this->input->post('manage_photo')) 
	    {    
			$this->load->view('product/add',$data);
			return;
	    }
		//form submitted
		$data['form_product_id'] = $this->input->post('product_id');
		$data['form_product_name_th'] = $this->input->post('product_name_th');
		$data['form_product_name_en'] = $this->input->post('product_name_en');
		$data['form_brand_name'] = $this->input->post('brand_name');
		$data['form_cat_id'] = $this->input->post('cat_id');
		$data['form_total_quantity'] = $this->input->post('total_quantity');
		$data['form_markup_price']  = $this->input->post('markup_price');
		$data['form_markdown_price']  = $this->input->post('markdown_price');
		$data['form_description_th']  = $this->input->post('description_th');
		$data['form_description_en']  = $this->input->post('description_en');
		$data['form_how_to_wash_th']  = $this->input->post('how_to_wash_th');
		$data['form_how_to_wash_en']  = $this->input->post('how_to_wash_en');
		$active=0;
		if($this->input->post('isActive')==true)
		{
			$active = 1;
		}
		$data['form_isActive']  = $active;
		
		//form validation
		$this->load->library('form_validation');
		$this->form_validation->set_rules('product_id', 'Product ID', 'trim|required');
		$this->form_validation->set_rules('product_name_en', 'Name(English)', 'trim|required');
		$this->form_validation->set_rules('product_name_th', 'Name(Thai)', 'trim|required');
		$this->form_validation->set_rules('brand_name', 'Brand', 'trim|required');
		$this->form_validation->set_rules('markup_price', 'Markup Price', 'trim|required');
		$this->form_validation->set_rules('cat_id', 'Category', 'trim|required');
		$this->form_validation->set_rules('total_quantity', 'Total Quantity', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
        {
            $data['error_message'] = 'Please fill in the field that is required';
			$data['brand'] = $this->brand_model->get();
			$data['category'] = $this->category_model->get();    
			$this->load->view('product/add', $data);
            return;
    	}
		$this->load->model('product_model');
        if($this->product_model->get($data['form_product_id'])!=FALSE)
        {
            $data['error_message'] = 'Duplicate productID. The productID you entered is already existed in the database.';
            $this->load->view('product/add',$data);
            return;
        }
		//check none duplicate productID
		
		$this->product_model->add();
		
		if($this->input->post('manage_photo'))
		{
			$data['product'] =  $this->product_model->get($this->input->post('product_id'));
			if ($data['product'] == FALSE)
			{
				redirect('admin/product');
			}
            $this->load->view('product/photo_management',$data);
            return;
		}
		
		//
		redirect('admin/product');	
	}
	
	public function edit($product_id=FALSE)
	{
		if(!check_authen('staff',TRUE)) 
		{	
			return;       
	    }
		//authenticated
		$data['page_title'] = 'Admin: Product Management';
		$data['dup_message_th']="";
		$data['dup_message_en']="";
		if($product_id===FALSE)
        {
			redirect('admin/product');
        }
		//product input
		$this->load->model('product_model');
		$this->load->model('category_model');
		$this->load->model('brand_model');
		
		if (!$this->input->post('submit') && !$this->input->post('manage_photo')) //not pass submit AND manage_photo
    	{			 
			$data['product'] =  $this->product_model->get($product_id);
			$data['brand'] = $this->brand_model->get();
			$data['category'] = $this->category_model->get();    
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
		$data['form_brand_name'] = $this->input->post('brand_name');
		$data['form_cat_id'] = $this->input->post('cat_id');
		$data['form_total_quantity'] = $this->input->post('total_quantity');
		$data['form_markup_price']  = $this->input->post('markup_price');
		$data['form_markdown_price']  = $this->input->post('markdown_price');
		$data['form_description_th']  = $this->input->post('description_th');
		$data['form_description_en']  = $this->input->post('description_en');
		$data['form_how_to_wash_th']  = $this->input->post('how_to_wash_th');
		$data['form_how_to_wash_en']  = $this->input->post('how_to_wash_en');
		$active=0;
		if($this->input->post('isActive')==true)
		{
			$active = 1;
		}
		$data['form_isActive']  = $active;
		
		//form validation
		$this->load->library('form_validation');
		$this->form_validation->set_rules('product_id', 'Product ID', 'trim|required');
		$this->form_validation->set_rules('product_name_en', 'Name(English)', 'trim|required');
		$this->form_validation->set_rules('product_name_th', 'Name(Thai)', 'trim|required');
		$this->form_validation->set_rules('brand_name', 'Brand', 'trim|required');
		$this->form_validation->set_rules('markup_price', 'Markup Price', 'trim|required');
		$this->form_validation->set_rules('cat_id', 'Category', 'trim|required');
		$this->form_validation->set_rules('total_quantity', 'Total Quantity', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
        {
            $data['error_message'] = 'Please fill in the category name.';
			$data['brand'] = $this->brand_model->get();
			$data['category'] = $this->category_model->get();    
			$data['product'] =  $this->product_model->get($product_id);
			$this->load->view('product/edit', $data);
            return;
    	}
		
		//check duplicated data
		if($this->product_model->get($data['form_product_id'])!=FALSE && $this->product_model->get($product_id)->product_id != $data['form_product_id'])
        {
            $data['error_message'] = 'Duplicate productID. The productID you entered is already existed in the database.';
			$data['brand'] = $this->brand_model->get();
			$data['category'] = $this->category_model->get();    
			$data['product'] =  $this->product_model->get($product_id);
            $this->load->view('product/edit', $data);
            return;
        }
		
        //none duplicate productID
		$this->product_model->edit($this->input->post('product_id_key'));
		
		if($this->input->post('manage_photo'))
		{
			$data['product'] =  $this->product_model->get($product_id);
			if ($data['product'] == FALSE)
			{
				redirect('admin/product');
			}
            $this->load->view('product/photo_management',$data);
            return;
		}
		
		//manage photo is not submitted
		redirect('admin/product');
	}
	
	public function delete($product_id=FALSE)
	{
	    if(!check_authen('staff',TRUE)) 
	    {		
			return;            
	    }
	    if($product_id===FALSE)
	    {
		    redirect('admin/product');
	    }
		$this->load->model('product_model');
    
	    $this->product_model->delete($product_id);
	    $data['product_list'] = $this->product_model->get();
	    redirect('admin/product');
	}
	public function search($product_cat, $brand=FALSE, $status, $name=FALSE)
	{
	    if(!check_authen('staff',TRUE)) 
	    {
		return;
	    }
	    if($name !== FALSE) {
		$name =  rawurldecode($name);
	    }
	    
	    
	    $this->load->model('product_model');
		$this->load->model('category_model');
		$this->load->model('brand_model');
	    $data['page_title'] = 'Admin: Product Management';
	    $data['product_list'] = $this->product_model->search($product_cat, $brand, $status, $name);
	    $data['products'] = $this->product_model->get();
		$data['category_list'] = $this->category_model->get();
		$data['brand_list'] = $this->brand_model->get();
	    $data['search_product_cat'] = $product_cat;
	    $data['search_name'] = $name;
		$data['search_brand'] = $brand;
		$data['search_status'] = $status;
	    $this->load->view('product/list',$data);
	    
	}
	
	public function detail($product_id)
	{
		if(!check_authen('staff',TRUE)) 
	    {
			return;
	    }
		$data['page_title'] = 'Admin: Product Management';
		$this->load->model('product_model');
		$data['product'] = $this->product_model->get($product_id);
		$this->load->view('product/detail',$data);
	}
	public function update_status()
	{
		if(!check_authen('staff',TRUE)) 
	    {
			return;
	    }		
		$this->load->model('product_model');
		
		
		foreach( $this->input->post('chb_select_product') as $item)
		{
			//$temp=$this->product_model->get($item);
			//if(isset($item)==true)
			{
				if($this->input->post('change_status')=="1")
				{
					//$temp->is_active=true;
					$status=1;
					
				}
				else if($this->input->post('change_status')=="2")
				{
					//$temp->is_active=false;
					$status=0;
				}
				$this->product_model->update_status($item,$status);
			}
		}
		$this->load->model('category_model');
		$this->load->model('brand_model');
		$data['product_list'] = $this->product_model->get();
		$data['category_list'] = $this->category_model->get();
		$data['brand_list'] = $this->brand_model->get();
		redirect('admin/product');
		
	
	}
}
?>