<?php 

class Category extends CI_Controller 
{
    public function index() 
    {
	if(!check_authen('staff',TRUE)) 
	{
		return;
	}
	$this->load->model('category_model');
	$data['page_title'] = 'Admin: Category Management';
	$data['cat_list'] = $this->category_model->get();		
	$this->load->view('category/list',$data);
    }
	
	public function add() 
	{
	    if(!check_authen('staff',TRUE)) {	
			return;       
	    }
		//authenticated
		$data['dup_message_th']="";
		$data['dup_message_en']="";
	    $data['page_title'] = 'Admin: Category Management';	
	    $this->load->model('category_model');
	    $data['categories'] = $this->category_model->get();
	    if (!$this->input->post('submit')) 
	    {    
			$this->load->view('category/add',$data);
			return;
	    }
		//form submitted
		$data['form_cat_name_th'] = $this->input->post('cat_name_th');
        $data['form_cat_name_en'] = $this->input->post('cat_name_en');
		$data['form_description_th'] = $this->input->post('description_th');
        $data['form_description_en'] = $this->input->post('description_en');
		$data['form_cat_parent'] = $this->input->post('cat_parent');
		
		$this->load->library('form_validation');
        $this->form_validation->set_rules('cat_name_th', 'Category name(Thai)', 'trim|required');
		$this->form_validation->set_rules('cat_name_en', 'Category name(English)', 'trim|required');
	if ($this->form_validation->run() == FALSE)
    { 
            $data['error_message']='Please fill in the category name.';
            $this->load->view('category/add', $data);
            return;
	}
		//validation passed
		if($this->category_model->get_by_name($data['form_cat_name_th'],FALSE)!=FALSE)
        {
            $data['error_message'] = 'Duplicate category name. The category name you entered is already existed in the database.';
			$data['dup_message_th'] = "This field is already existed in the database.";
            $this->load->view('category/add',$data);
            return;
        }
		if($this->category_model->get_by_name(FALSE,$data['form_cat_name_en'])!=FALSE)
        {
            $data['error_message'] = 'Duplicate category name. The category name you entered is already existed in the database.';
			$data['dup_message_en'] = "This field is already existed in the database.";
            $this->load->view('category/add',$data);
            return;
        }
		if($this->category_model->get_by_name($data['form_cat_name_th'],$data['form_cat_name_en'])!=FALSE)
        {
            $data['error_message'] = 'Duplicate category name. The category name you entered is already existed in the database.';
			$data['dup_message_th'] = "This field is already existed in the database.";
			$data['dup_message_en'] = "This field is already existed in the database.";
            $this->load->view('category/add',$data);
            return;
        }
		
		
		//none duplicate category
	    $this->category_model->add();
	    redirect('admin/category');
	}
	
	public function edit($cat_id=FALSE) 
	{
	    $data['page_title'] = 'Admin: Category Management';	
	    if(!check_authen('staff',TRUE)) 
	    {
			return;            
	    }
	    if($cat_id===FALSE)
	    {
			redirect('admin/category');
	    }
	    $this->load->model('category_model');
	    if (!$this->input->post('submit')) 
	    {
			$data['categories'] =  $this->category_model->get($cat_id);
			$data['allCat'] = $this->category_model->get();
			$this->load->view('category/edit',$data);
			return;
	    }
	    //form submitted
		$data['form_cat_name_en'] = $this->input->post('cat_name_en');        
        $this->load->model('category_model');
        $data['category'] =  $this->category_model->get($this->input->post($cat_id));
		
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cat_name_en', 'Name(English)', 'trim|required');
		$this->form_validation->set_rules('cat_name_th', 'Name(Thai)', 'trim|required');
		
		 if ($this->form_validation->run() == FALSE)
        {
            $data['error_message'] = 'Please fill in the requirement information.';
			$data['categories'] =  $this->category_model->get($cat_id);
			$this->load->view('category/edit', $data);
            return;
    	}
		//form validated
        if(($this->category_model->select('SELECT * FROM categories WHERE cat_name_en=\''.$this->input->post('cat_name_en').'\' ')!=FALSE &&
		    $this->category_model->get($cat_id)->cat_name_en!= $this->input->post('cat_name_en') )||
			(($this->category_model->select('SELECT * FROM categories WHERE cat_name_th=\''.$this->input->post('cat_name_th').'\' ')!=FALSE )&&
		    $this->category_model->get($cat_id)->cat_name_th!=$this->input->post('cat_name_th'))
     	  )
        {
            $data['error_message'] = 'Duplicate brand name. The category name you entered is already existed in the database.';
			$data['categories'] =  $this->category_model->get($cat_id);
			$this->load->view('category/edit', $data);
            return;
			
        }
		//none duplicate category name			
		$this->category_model->edit($this->input->post('cat_id'));
		$data['categories'] =  $this->category_model->get($cat_id);
		$data['allCat'] = $this->category_model->get();
		redirect('admin/category');
	    
	}
	
	public function filter($parent, $name=FALSE)
	{
	    if(!check_authen('staff',TRUE)) 
	    {
			return;
	    }
	    $this->load->model('category_model');
	    $data['page_title'] = 'Admin: Category Management';
	    $data['cat_list'] = $this->category_model->filter($parent, $name);
	    $data['categories'] = $this->category_model->get();
	    $data['filter_parent'] = $parent;
	    $data['filter_name'] = $name;
	    $this->load->view('category/list',$data);
	}
	
	public function delete($cat_id=FALSE)
	{
	    if(!check_authen('staff',TRUE)) 
	    {		
		return;            
	    }
	    if($cat_id===FALSE)
	    {
		    redirect('admin/category');
	    }
	    $this->load->model('category_model');
	    $this->category_model->delete($cat_id);
	    $data['cat_list'] = $this->category_model->get();
	    redirect('admin/category');
	}
	
}
?>