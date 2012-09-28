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
		
		//none duplicate tag
		$this->load->model('tag_model');				
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
//<<<<<<< HEAD
//=======
		
		$data['product_in_tag'] = $this->tag_model->get_product_in_tag($tag_id);
		
//>>>>>>> tag: delete, search
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
        $data['form_description_en'] = $this->input->post('description_en');
		$data['form_isActive'] = $this->input->post('isActive');
		
        $this->load->model('tag_model');
//<<<<<<< HEAD
        $data['tags'] =  $this->tag_model->get($this->input->post($tag_id));
		
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cat_name_en', 'Name(English)', 'trim|required');
		$this->form_validation->set_rules('cat_name_th', 'Name(Thai)', 'trim|required');
//=======
        $data['tags'] =  $this->tag_model->get($this->input->post($tag_id));
		
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tag_name_en', 'Name(English)', 'trim|required');
		$this->form_validation->set_rules('tag_name_th', 'Name(Thai)', 'trim|required');
//>>>>>>> tag: delete, search
		
		 if ($this->form_validation->run() == FALSE)
        {
            $data['error_message'] = 'Please fill in the tag name.';
			$data['tags'] =  $this->tag_model->get($tag_id);
			$this->load->view('tag/edit', $data);
            return;
    	}
		
		/*
		//form validated
		if(($this->category_model->get_by_name($data['form_cat_name_th'],FALSE)!=FALSE )&&
		    $this->category_model->get($cat_id)->cat_name_th!=$this->input->post('cat_name_th'))
		{
            $data['error_message'] = 'Duplicate brand name. The category name you entered is already existed in the database.';
			$data['dup_message_th'] = "This field is already existed in the database.";
			$data['categories'] =  $this->category_model->get($cat_id);
			$this->load->view('category/edit', $data);
            return;
			
        }
        if($this->category_model->get_by_name(FALSE,$data['form_cat_name_en'])!=FALSE &&
		    $this->category_model->get($cat_id)->cat_name_en!= $this->input->post('cat_name_en') )
		{
			$data['error_message'] = 'Duplicate brand name. The category name you entered is already existed in the database.';
			$data['dup_message_en'] = "This field is already existed in the database.";
			$data['categories'] =  $this->category_model->get($cat_id);
			$this->load->view('category/edit', $data);
            return;
		}
		*/

		//none duplicate tag name			
		$this->tag_model->edit($this->input->post('tag_id'));
		$data['tags'] =  $this->tag_model->get($tag_id);
		$data['allTag'] = $this->tag_model->get();
//<<<<<<< HEAD
		
		redirect('admin/tag');
		
		
		//
		/*$data['page_title'] = 'Admin: Tag Management';
		if(!check_authen('staff',TRUE)) {	
			return;       
	    }

		 if($tag_id===FALSE)
	    {
			redirect('admin/tag');
	    }

		$this->load->model('tag_model');
		$data['product_in_tag'] = $this->tag_model->get_product_in_tag();
		$this->load->view('tag/edit',$data);*/
//=======
		$data['product_in_tag'] = $this->tag_model->get_product_in_tag($tag_id);
		$this->load->view('tag/edit',$data);
		redirect('admin/tag');
		

		
//>>>>>>> tag: delete, search
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
		//redirect('admin/category/a'.$cat_id.'l'. $this->category_model->has_categories_under_category($cat_id));
		if( $this->tag_model->has_products_under_tag($tag_id))//==
		{
			$this->load->library('form_validation');
			$data['error_message'] = 'Can not delete '. $this->tag_model->get($tag_id)->tag_name_en.' tag. It has products undered it.';		
			$data['tag_list'] = $this->tag_model->get();	
			$this->load->view('tag/list', $data);
			return;
		}
	    
	    $this->tag_model->delete($tag_id);
	    $data['tag_list'] = $this->tag_model->get();
	    redirect('admin/tag');
	}


	public function delete_product($tag_id=FALSE,$product_id=FALSE)
	{
		$data['page_title'] = 'Admin: Category Management';
		if(!check_authen('staff',TRUE)) {	
			return;       
	    }

		$this->load->model('tag_model');
		$this->load_model->delete_product($tag_id,$product_id);
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
	    $this->load->view('tag/list',$data);
	    
	}
	
}
//<<<<<<< HEAD
?>