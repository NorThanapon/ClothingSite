<?php 
class Tag extends CI_Controller 
{
    public function index() 
    {
		if(!check_authen('staff',TRUE)) 
		{
			return;
		}
		$this->load->model('tag_model');
		$data['page_title'] = 'Admin: Tag Management';
		$data['tag_list'] = $this->tag_model->get();	
		$data['page'] = 'tag/list';	
		$this->load->view('main_admin_page',$data);
    }

	public function add() 
	{
	    if(!check_authen('staff',TRUE)) {	
			return;       
	    }
		
		//authenticated
		$data['dup_message_th']="";
		$data['dup_message_en']="";
	    $data['page_title'] = 'Admin: Tag Management';	
	    $this->load->model('tag_model');
	    $data['tags'] = $this->tag_model->get();
		
		if (!$this->input->post('submit')) 
	    {    
			$data['page'] = 'tag/add';
			$this->load->view('main_admin_page',$data);
			return;
	    }
		
		//form submitted
		$data['form_tag_name_th'] = $this->input->post('tag_name_th');
        $data['form_tag_name_en'] = $this->input->post('tag_name_en');
		$data['form_description_th'] = $this->input->post('description_th');
        $data['form_description_en'] = $this->input->post('description_en');
		
		$this->load->library('form_validation');
        $this->form_validation->set_rules('tag_name_th', 'Tag name(Thai)', 'trim|required');
		$this->form_validation->set_rules('tag_name_en', 'Tag name(English)', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{ 
				$data['error_message']='Please fill in the tag name.';
				$data['page'] = 'tag/add';
				$this->load->view('main_admin_page',$data);
				return;
		}
		//validation passed
		if($this->tag_model->get_by_name($data['form_tag_name_th'],FALSE)!=FALSE)
        {
            $data['error_message'] = 'Duplicate tag name. The tag name you entered is already existed in the database.';
			$data['dup_message_th'] = "This field is already existed in the database.";
			$data['page'] = 'tag/add';
			$this->load->view('main_admin_page',$data);
            return;
        }
		if($this->tag_model->get_by_name(FALSE,$data['form_tag_name_en'])!=FALSE)
        {
            $data['error_message'] = 'Duplicate tag name. The tag name you entered is already existed in the database.';
			$data['dup_message_en'] = "This field is already existed in the database.";
			$data['page'] = 'tag/add';
			$this->load->view('main_admin_page',$data);
            return;
        }
		if($this->tag_model->get_by_name($data['form_tag_name_th'],$data['form_tag_name_en'])!=FALSE)
        {
            $data['error_message'] = 'Duplicate tag name. The tag name you entered is already existed in the database.';
			$data['dup_message_th'] = "This field is already existed in the database.";
			$data['dup_message_en'] = "This field is already existed in the database.";
			$data['page'] = 'tag/add';
			$this->load->view('main_admin_page',$data);
            return;
        }
				
		//none duplicate tag		
	    $this->tag_model->add();
	    
		redirect('admin/tag');
	}
	public function edit($tag_id=FALSE)
	{
		$data['page_title'] = 'Admin: Tag Management';	
	    if(!check_authen('staff',TRUE)) 
	    {
			return;            
	    }
		$data['dup_message_th']="";
		$data['dup_message_en']="";		
		
	    if($tag_id===FALSE)
	    {
			redirect('admin/tag');
	    }
	    $this->load->model('tag_model');
		$data['allTag'] = $this->tag_model->get();		

	    if (!$this->input->post('submit')) 
	    {
			$data['tags'] =  $this->tag_model->get($tag_id);
			$data['page'] = 'tag/edit';
			$this->load->view('main_admin_page',$data);
			return;
	    }
	    //form submitted 
		$data['form_tag_name_th'] = $this->input->post('tag_name_th');
        $data['form_tag_name_en'] = $this->input->post('tag_name_en');
		$data['form_description_th'] = $this->input->post('description_th');
        $data['form_description_en'] = $this->input->post('description_en');
		$data['form_is_active'] = $this->input->post('is_active');
		
        $this->load->model('tag_model');
        $data['tags'] =  $this->tag_model->get($this->input->post($tag_id));
		
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tag_name_en', 'Name(English)', 'trim|required');
		$this->form_validation->set_rules('tag_name_th', 'Name(Thai)', 'trim|required');

		if ($this->form_validation->run() == FALSE)
        {
            $data['error_message'] = 'Please fill in the tag name.';
			$data['tags'] =  $this->tag_model->get($tag_id);
			$data['page'] = 'tag/edit';
			$this->load->view('main_admin_page',$data);
            return;
    	}
		
		//form validated
		if(($this->tag_model->get_by_name($data['form_tag_name_th'],FALSE)!=FALSE )&&
		    $this->tag_model->get($tag_id)->tag_name_th!=$this->input->post('tag_name_th'))
		{
            $data['error_message'] = 'Duplicate tag name. The tag name you entered is already existed in the database.';
			$data['dup_message_th'] = "This field is already existed in the database.";
			$data['tags'] =  $this->tag_model->get($tag_id);
			$data['page'] = 'tag/edit';
			$this->load->view('main_admin_page',$data);
            return;
			
        }
        if($this->tag_model->get_by_name(FALSE,$data['form_tag_name_en'])!=FALSE &&
		    $this->tag_model->get($tag_id)->tag_name_en!= $this->input->post('tag_name_en') )
		{
			$data['error_message'] = 'Duplicate tag name. The tag name you entered is already existed in the database.';
			$data['dup_message_en'] = "This field is already existed in the database.";
			$data['tags'] =  $this->tag_model->get($tag_id);
			$data['page'] = 'tag/edit';
			$this->load->view('main_admin_page',$data);
            return;
		}

		//none duplicate tag name			
		$this->tag_model->edit($this->input->post('tag_id'));
		$data['tags'] =  $this->tag_model->get($tag_id);
		$data['allTag'] = $this->tag_model->get();

		redirect('admin/tag');
	}

	public function delete($tag_id=FALSE)
	{
	    if(!check_authen('staff',TRUE)) 
	    {		
			return;            
	    }
	    
		$data['page_title'] = 'Admin: Tag Management';
	    if($tag_id===FALSE)
	    {
		    redirect('admin/tag');
	    }
		$this->load->model('tag_model');
		//redirect('admin/tag/a'.$tag_id.'l'. $this->tag_model->has_tags_under_tag($tag_id));
		if( $this->tag_model->has_products_under_tag($tag_id))//==
		{
			$this->load->library('form_validation');
			$data['error_message'] = 'Can not delete '. $this->tag_model->get($tag_id)->tag_name_en.' tag. It has products undered it.';		
			$data['tag_list'] = $this->tag_model->get();	
			$data['page'] = 'tag/list';
			$this->load->view('main_admin_page',$data);
			return;
		}
	    
	    $this->tag_model->delete($tag_id);
	    $data['tag_list'] = $this->tag_model->get();
	    redirect('admin/tag');
		
	}

	public function edit_product($tag_id=FALSE)
	{
		$data['page_title'] = 'Admin: Tag Management';
		if(!check_authen('staff',TRUE)) 
		{	
			return;       
	    }
		$this->load->model('tag_model');
		$this->load->model('product_model');
		$data['product_list'] = $this->product_model->get();
		$data['tags'] =  $this->tag_model->get($tag_id);		
		$data['product_in_tag'] = $this->tag_model->get_product_in_tag($tag_id);
		$data['page'] = 'tag/edit_product';
		$this->load->view('main_admin_page',$data);		
	}
	
	
	public function delete_product($tag_id=FALSE,$product_id=FALSE)
	{
		$data['page_title'] = 'Admin: Tag Management';
		if(!check_authen('staff',TRUE)) 
		{	
			return;       
	    }

		$this->load->model('tag_model');
		$this->tag_model->delete_product($tag_id,$product_id);
					
		redirect('admin/tag/edit_product/'.$tag_id);
		
	}

	public function search($name=FALSE)
	{
	    if(!check_authen('staff',TRUE)) 
	    {
			return;
	    }

	    if($name !== FALSE) 
		{
			$name =  rawurldecode($name);
	    }
	    
	    
	    $this->load->model('tag_model');
	    $data['page_title'] = 'Admin: Tag Management';
	    $data['tag_list'] = $this->tag_model->search($name);
	    $data['tags'] = $this->tag_model->get();
	    $data['search_name'] = $name;
	    $data['page'] = 'tag/list';
		$this->load->view('main_admin_page',$data);
	    
	}

	public function add_product_in_tag($tag_id=false)
	{
		if(!check_authen('staff',TRUE)) {	
			return;       
	    }
		
		//check
		$data['dup_message_th']="";
		$data['dup_message_en']="";
		$this->load->model('tag_model');	
		$data['product_in_tag'] =  $this->tag_model->get_product_in_tag($tag_id);
		if( $this->tag_model->product_exist($tag_id, $this->input->post('product')))
		{
			$this->load->library('form_validation');
			$data['error_message'] = $this->tag_model->get_product_name($this->input->post('product'))->product_name_en.' already existed.';		
			$data['tags'] =  $this->tag_model->get($tag_id);
			$data['page'] = 'tag/edit_product';
			$this->load->view('main_admin_page',$data);
			return;
		}
				
		//none duplicate product
		
	    $this->tag_model->add_product_in_tag($tag_id,$this->input->post('product'));	
		
		redirect('admin/tag/edit_product/'.$tag_id);
	}
}
?>
?>