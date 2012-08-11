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
		$data['brand_list'] = $this->category_model->get();
		$this->load->view('category',$data);
	}
	
	public function add() 
	{
	
	}
	
	public function edit($brand_name=FALSE) 
	{
	
	}
	
	
}
?>