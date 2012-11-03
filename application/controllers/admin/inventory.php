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
		$this->load->model('color_model');
        $data['page_title'] = 'Admin: Inventory Management';
		$data['product_list'] = $this->product_model->get();
		$data['item_list'] = $this->item_model->get();
		$data['colors'] = $this->color_model->get();
        $this->load->view('inventory/list',$data);
    }
	
	public function add()
	{
		//load color
		$this->load->model('color_model');
        //$data["all_colors"] = $this->color_model->get();
        //$data["colors"] = $data["all_colors"];
		$data["colors"] = NULL;
		//$data["colors"] = $this->product_model->get_color_in_product($this->input->post('product_id'));
        $data["allow_manage_color"] = FALSE;
        $data["picker_control_name"] = "color";
        $data["picker_control_id"] = "ddl-color";
		//end load color
		
		
		$data['dup_message_th']="";
		$data['dup_message_en']="";
		if(!check_authen('staff',TRUE)) {	
			return;       
	    }
		$this->load->model('item_model');
		//$data['items'] = $this->item_model->get($item_id);
		
		$this->load->model('product_model');
		$data['products'] = $this->product_model->get();
		//authenticated
		$data['page_title'] = 'Admin: Inventory Management';
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
	
		//check validation
		$this->load->library('form_validation');
		$this->form_validation->set_rules('item_id', 'Item ID', 'trim|required');
		$this->form_validation->set_rules('product_id', 'Product ID', 'trim|required');
		$this->form_validation->set_rules('size', 'Size', 'trim|required');
		$this->form_validation->set_rules('color', 'Color Picker', 'trim|required');
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
	
		if ($this->form_validation->run() == FALSE)
        {
            $data['error_message'] = 'Please fill in the field that is required';
			$data['items'] = $this->item_model->get();
			$data['products'] = $this->product_model->get();    
			$this->load->view('inventory/add', $data);
            return;
    	}
		
		//check duplicate item ID
		if($this->item_model->get($data['form_item_id'])!=FALSE)
		{
			$data['error_message'] = 'Duplicate brand name. The category name you entered is already existed in the database.';
			$data['dup_message_en'] = "This field is already existed in the database.";
			$data['item_list'] =  $this->item_model->get($this->input->post('item_id'));
			$this->load->view('inventory/add', $data);
            return;
		}
		
		$this->item_model->add();
		
		// update total quantity of products
		
		$total  = $this->product_model->get($this->input->post('product_id'));    
		$item_quantity = $this->input->post('quantity');
		$total = $total->total_quantity + $item_quantity;
		$this->item_model->update_total_quantity($this->input->post('product_id'),$total);
				
		redirect('admin/inventory');	
	}
	
	public function edit($item_id=FALSE){
		if(!check_authen('staff',TRUE)) {	
			return;       
	    }
		//load color
		$this->load->model('color_model');
        $data["all_colors"] = $this->color_model->get();
        $data["colors"] = $data["all_colors"];
        $data["allow_manage_color"] = TRUE;
        $data["picker_control_name"] = "color";
        $data["picker_control_id"] = "ddl-color";
		//end load color
		
		
		$data['dup_message_th']="";
		$data['dup_message_en']="";
		if($item_id===FALSE)
        {
			redirect('admin/product');
        }
		
		$this->load->model('item_model');
		$this->load->model('product_model');
		
		$data['items'] = $this->item_model->get($item_id);
		$data['products'] = $this->product_model->get();
		
		$data['page_title'] = 'Admin: Inventory Management';
		if (!$this->input->post('submit')) 
	    {    
			$this->load->view('inventory/edit',$data);
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
		$this->form_validation->set_rules('color', 'Color Picker', 'trim|required');
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
	
		if ($this->form_validation->run() == FALSE)
        {
            $data['error_message'] = 'Please fill in the field that is required';
			$data['items'] = $this->item_model->get();
			$data['products'] = $this->product_model->get();    
			$this->load->view('inventory/add', $data);
            return;
    	}
		
		//check duplicate item ID
		if($this->item_model->get($data['form_item_id'])!= FALSE && $this->input->post('item_id_key') != $data['form_item_id'])
		{
			$data['error_message'] = 'Duplicate brand name. The category name you entered is already existed in the database.';
			$data['dup_message_en'] = "This field is already existed in the database.";
			$data['item_list'] =  $this->item_model->get($this->input->post('item_id'));
			$this->load->view('inventory/add', $data);
            return;
		}
		
		// update total quantity of products
		$old_quantity = $this->item_model->get($this->input->post('item_id_key'))->quantity;
		$total =  $this->product_model->get($this->input->post('product_id'))->total_quantity;
		$new_quantity = $this->input->post('quantity');
		$different = $new_quantity - $old_quantity;
		
		$total = $total+$different;
		$this->item_model->update_total_quantity($this->input->post('product_id'),$total);		
		$this->item_model->edit($this->input->post('item_id_key'));
		
		redirect('admin/inventory');	
	}
	
	
    public function service_add() {
        if(!check_authen('staff',TRUE)) return;
        $this->load->model('color_model');
        $id = $this->color_model->get_latest()->color_id;
        $id++;
        $this->load->library('upload');
        $result = $this->_upload_color_file($id, 'file_name');
        $this->color_model->add($result['file_name']);
        echo json_encode($this->color_model->get_latest());
    }
    
    public function service_delete() {
        if(!check_authen('staff',TRUE)) return;
        $this->load->model('color_model');
        $color = $this->color_model->get($this->input->post('delete_color'));
        $this->color_model->delete($color->color_id, './assets/db/colors/'.$color->file_name);
        echo json_encode($color);
    }
    
    function _upload_color_file($color_id, $form_name) 
    {
        if (!empty($_FILES[$form_name]['name'])) 
        {
            $config['upload_path'] = './assets/db/colors/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2000';
            $config['overwrite'] = TRUE;
            $config['file_name'] = $color_id.'.'.substr(strrchr($_FILES[$form_name]['name'], '.'), 1);
            $this->upload->initialize($config);

            if ($this->upload->do_upload($form_name)) 
            {
                $config2['image_library'] = 'gd';
                $config2['source_image'] = './assets/db/colors/'.$config['file_name'];
                $config2['create_thumb'] = FALSE;
                $config2['maintain_ratio'] = FALSE;
                $config2['width']	 = 14;
                $config2['height']	= 14;
                $this->load->library('image_lib', $config2); 
                $this->image_lib->resize();
                return $this->upload->data();
            }
            return array('error' => $this->upload->display_errors());    
        }
        return FALSE;
    }
	
	
	public function delete($item_id=FALSE)
	{
	    if(!check_authen('staff',TRUE)) 
	    {		
			return;            
	    }
	    
		$data['page_title'] = 'Admin: Inventory Management';
	    if($item_id===FALSE)
	    {
		    redirect('admin/inventory');
	    }
		$this->load->model('item_model');
			    
	    $this->item_model->delete($item_id);
	    $data['item_list'] = $this->item_model->get();
	    redirect('admin/inventory');
	}
	
	
	public function search($product_name=FALSE, $item_amount_low=FALSE, $item_amount_high=FALSE)
	{
	    if(!check_authen('staff',TRUE)) 
	    {
		return;
	    }
	    if($product_name !== FALSE) {
			$product_name =  rawurldecode($product_name);
	    }
		
		$this->load->model('color_model');
		$this->load->model('item_model');
		$this->load->model('product_model');
		
		$data['colors'] = $this->color_model->get();
		if($product_name== '-' && $item_amount_low == '-' && $item_amount_high == '-')
		{
			$data['page_title'] = 'Admin: Inventory Management';
			$data['item_list'] = $this->item_model->get();
			$data['product_list'] = $this->product_model->get();			
			$this->load->view('inventory/list', $data);
            return;
		}
		
		if(( !is_numeric($item_amount_high) &&  $item_amount_high != '-')|| (!is_numeric($item_amount_low) &&$item_amount_low != '-'))
		{
			$data['page_title'] = 'Admin: Inventory Management';
			$data['error_message'] = 'AAA';
			//$data['item_list'] = $this->item_model->search($product_name, $item_amount_low, $item_amount_high);
			$data['item_list'] = $this->item_model->get();
			$data['product_list'] = $this->product_model->get();
			$this->load->view('inventory/list',$data);
			return;
		}
		$data['search_product_name'] = $product_name;
	    $data['search_item_amount_low'] = $item_amount_low;
		$data['search_item_amount_high'] = $item_amount_high;
		
	    $data['page_title'] = 'Admin: Inventory Management';
	    $data['item_list'] = $this->item_model->search($product_name, $item_amount_low, $item_amount_high);
		$data['item_list_2'] = $this->item_model->get();
		$data['product_list'] = $this->product_model->get();
			
	    $this->load->view('inventory/list',$data);
	    
	}
	
	public function color_in_product($product_id)
	{
		$this->load->model('product_model');
		$data['colors'] = $this->product_model->get_color_in_product($product_id);
		$data["allow_manage_color"] = FALSE;
		$data["picker_control_name"] = "color";
        $data["picker_control_id"] = "ddl-color";
		$this->load->view('common/color/color_picker',$data);
	}	
}
?>