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
	    if(!check_authen('staff',TRUE)) 
	    {
		return;            
	    }
	    $data['page_title'] = 'Admin: Category Management';	
	    $this->load->model('category_model');
	    $data['categories'] = $this->category_model->get();
	    if (!$this->input->post('submit')) 
	    {    
		$this->load->view('category/add',$data);
		return;
	    }
	    $this->category_model->add();
	    redirect('category');
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
	    $this->load->model('category_model');
	    if (!$this->input->post('submit')) 
	    {
		$data['categories'] =  $this->category_model->get($cat_id);
		$data['allCat'] = $this->category_model->get();
		$this->load->view('category/edit',$data);
		return;
	    }
	    else
	    {
		$this->category_model->edit($this->input->post('cat_id'));
		$data['categories'] =  $this->category_model->get($cat_id);
		$data['allCat'] = $this->category_model->get();
		redirect('category');
	    }
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
		    redirect('category');
	    }
	    $this->load->model('category_model');
	    $this->category_model->delete($cat_id);
	    $data['cat_list'] = $this->category_model->get();
	    redirect('category');
	}
	
}
?>