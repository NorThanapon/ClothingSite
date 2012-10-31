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
	$data['page'] = 'category/list';
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
		$data['error_gender']="";
	    $data['page_title'] = 'Admin: Category Management';	
	    $this->load->model('category_model');
	    $data['categories'] = $this->category_model->get();
	    if (!$this->input->post('submit')) 
	    {    
			$data['page'] = 'category/add';
			$this->load->view('main_admin_page',$data);
			return;
	    }
		//form submitted
		$data['form_cat_name_th'] = $this->input->post('cat_name_th');
        $data['form_cat_name_en'] = $this->input->post('cat_name_en');
		$data['form_description_th'] = $this->input->post('description_th');
        $data['form_description_en'] = $this->input->post('description_en');
		$data['form_cat_gender'] = $this->input->post('cat_gender');
		$data['form_is_active'] = $this->input->post('is_active');
		
		$this->load->library('form_validation');
        $this->form_validation->set_rules('cat_name_th', 'Category name(Thai)', 'trim|required');
		$this->form_validation->set_rules('cat_name_en', 'Category name(English)', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{ 
				$data['error_message']='Please fill in the category name.';
				$data['page'] = 'category/add';
				$this->load->view('main_admin_page',$data);
				return;
		}
		if($data['form_cat_gender']=="")
		{
			$data['error_message'] = 'Please select the gender.';
			$data['error_gender'] = "Please select the gender.";
			$data['page'] = 'category/add';
			//echo ">..>".$data['form_cat_gender'];
			$this->load->view('main_admin_page',$data);
            return;
			
		}
		
		//validation passed
		if($this->category_model->get_by_name($data['form_cat_name_th'],FALSE)!=FALSE)
        {
            $data['error_message'] = 'Duplicate category name. The category name you entered is already existed in the database.';
			$data['dup_message_th'] = "This field is already existed in the database.";
			$data['page'] = 'category/add';
			$this->load->view('main_admin_page',$data);
            return;
        }
		if($this->category_model->get_by_name(FALSE,$data['form_cat_name_en'])!=FALSE)
        {
            $data['error_message'] = 'Duplicate category name. The category name you entered is already existed in the database.';
			$data['dup_message_en'] = "This field is already existed in the database.";
			$data['page'] = 'category/add';
			$this->load->view('main_admin_page',$data);
            return;
        }
		if($this->category_model->get_by_name($data['form_cat_name_th'],$data['form_cat_name_en'])!=FALSE)
        {
            $data['error_message'] = 'Duplicate category name. The category name you entered is already existed in the database.';
			$data['dup_message_th'] = "This field is already existed in the database.";
			$data['dup_message_en'] = "This field is already existed in the database.";
			$data['page'] = 'category/add';
			$this->load->view('main_admin_page',$data);
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
		$data['dup_message_th']="";
		$data['dup_message_en']="";
		$data['error_gender']="";
	    if($cat_id===FALSE)
	    {
			redirect('admin/category');
	    }
	    $this->load->model('category_model');
		$data['allCat'] = $this->category_model->get();
	    if (!$this->input->post('submit')) 
	    {
			$data['categories'] =  $this->category_model->get($cat_id);
			$data['page'] = 'category/edit';
			$this->load->view('main_admin_page',$data);
			return;
	    }
	    //form submitted 
		$data['form_cat_name_th'] = $this->input->post('cat_name_th');
        $data['form_cat_name_en'] = $this->input->post('cat_name_en');
		$data['form_description_th'] = $this->input->post('description_th');
        $data['form_description_en'] = $this->input->post('description_en');
		$data['form_cat_gender'] = $this->input->post('cat_gender');
		$data['form_is_active'] = $this->input->post('is_active');
		
        $this->load->model('category_model');
        $data['category'] =  $this->category_model->get($this->input->post($cat_id));
		
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cat_name_en', 'Name(English)', 'trim|required');
		$this->form_validation->set_rules('cat_name_th', 'Name(Thai)', 'trim|required');
		$this->form_validation->set_rules('cat_gender', 'Gender', 'trim|required');		
		
		if ($this->form_validation->run() == FALSE)
        {
            $data['error_message'] = 'Please fill in the category name.';
			$data['categories'] =  $this->category_model->get($cat_id);
			$data['page'] = 'category/edit';		
			//echo ">..>".$data['form_cat_gender'];			
			$this->load->view('main_admin_page',$data);
            return;
    	}		
		if($data['form_cat_gender']=="")
		{
			$data['error_message'] = 'Please select the gender.';
			$data['error_gender'] = "Please select the gender.";
			$data['categories'] =  $this->category_model->get($cat_id);
			$data['page'] = 'category/edit';
			//echo ">..>".$data['form_cat_gender'];
			$this->load->view('main_admin_page',$data);
            return;
			
		}
		//form validated
		if(($this->category_model->get_by_name($data['form_cat_name_th'],FALSE)!=FALSE )&&
		    $this->category_model->get($cat_id)->cat_name_th!=$this->input->post('cat_name_th'))
		{
            $data['error_message'] = 'Duplicate brand name. The category name you entered is already existed in the database.';
			$data['dup_message_th'] = "This field is already existed in the database.";
			$data['categories'] =  $this->category_model->get($cat_id);
			$data['page'] = 'category/edit';
			$this->load->view('main_admin_page',$data);
            return;
			
        }
        if($this->category_model->get_by_name(FALSE,$data['form_cat_name_en'])!=FALSE &&
		    $this->category_model->get($cat_id)->cat_name_en!= $this->input->post('cat_name_en') )
		{
			$data['error_message'] = 'Duplicate brand name. The category name you entered is already existed in the database.';
			$data['dup_message_en'] = "This field is already existed in the database.";
			$data['categories'] =  $this->category_model->get($cat_id);
			$data['page'] = 'category/edit';
			$this->load->view('main_admin_page',$data);
            return;
		}
		
		//none duplicate category name			
		$this->category_model->edit($this->input->post('cat_id'));
		$data['categories'] =  $this->category_model->get($cat_id);
		$data['allCat'] = $this->category_model->get();
		redirect('admin/category');
	    
	}
	
	public function search($gender, $name=FALSE)
	{
	    if(!check_authen('staff',TRUE)) 
	    {
		return;
	    }
	    if($name !== FALSE) {
		$name =  rawurldecode($name);
	    }    
	    $this->load->model('category_model');
	    $data['page_title'] = 'Admin: Category Management';
	    $data['cat_list'] = $this->category_model->search($gender, $name);
	    $data['categories'] = $this->category_model->get();
	    $data['search_gender'] = $gender;
	    $data['search_name'] = $name;
		$data['page'] = 'category/list';
		$this->load->view('main_admin_page',$data);
	    
	}
	
	public function delete($cat_id=FALSE)
	{
	    if(!check_authen('staff',TRUE)) 
	    {		
			return;            
	    }
	    
		$data['page_title'] = 'Admin: Category Management';
	    if($cat_id===FALSE)
	    {
		    redirect('admin/category');
	    }
		$this->load->model('category_model');
		//redirect('admin/category/a'.$cat_id.'l'. $this->category_model->has_categories_under_category($cat_id));
		if( $this->category_model->has_products_under_category($cat_id))//)||$this->category_model->has_categories_under_category($cat_id))//==
		{
			$this->load->library('form_validation');
			$data['error_message'] = 'Can not delete '. $this->category_model->get($cat_id)->cat_name_en.' category. It has products or categories undered it.';		
			$data['cat_list'] = $this->category_model->get();	
			$data['page'] = 'category/list';
			$this->load->view('main_admin_page',$data);
			return;
		}
	    
	    $this->category_model->delete($cat_id);
	    $data['cat_list'] = $this->category_model->get();
	    redirect('admin/category');
	}
	
}
?>
?>