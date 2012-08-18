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
		$data['page_title'] = 'Admin: Category Management';	
		$this->load->model('category_model');
		$data['categories'] = $this->category_model->get();
		if(!check_authen('staff',TRUE)) 
		{
            return;            
        }
		if (!$this->input->post('submit')) 
		{
			
            $this->load->view('category/add',$data);
            return;
        }
				
		
		$this->category_model->add();
		redirect();
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
			redirect('category');
		}
		if (!$this->input->post('submit')) 
		{
            $this->load->model('category_model');
			$data['categories'] =  $this->category_model->get($cat_id);
			$data['allCat'] = $this->category_model->get();
			$this->load->view('category/edit',$data);
            return;
        }		
	}
	
	public function get()
	{
		$data['page_title'] = 'Admin: Category Management';	
		if(!check_authen('staff',TRUE)) 
		{
            return;            
        }
		$this->load->model('category_model');
		$data['categories'] = $this->category_model->get($cat_id);
	}
	
}
?>