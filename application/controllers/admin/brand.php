<?php

class Brand extends CI_Controller 
{
    public function index() 
    {
        if(!check_authen('staff',TRUE)) 
        {
                return;
        }
        $this->load->model('brand_model');
        $data['page_title'] = 'Admin: Brand Management';
        $data['brand_list'] = $this->brand_model->get();
        $this->load->view('brand/list',$data);
    }

    public function add() 
    {
        if(!check_authen('staff',TRUE))
        {
            return;            
        }
        //authenticated
        $data['page_title'] = 'Admin: Brand Management';
        if (!$this->input->post('submit'))
        {
            $this->load->view('brand/add',$data);
            return;
        }
        //form submitted
        $data['form_band_name'] = $this->input->post('brand_name');
        $data['form_description'] = $this->input->post('description');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('brand_name', 'Brand name', 'trim|required');
	if ($this->form_validation->run() == FALSE)
        { 
            $data['error_message']='Please fill in the brand name.';
            $this->load->view('brand/add', $data);
            return;
	}
        //validation passed
        $this->load->library('upload');
        $result_logo = $this->_upload_brand_file($this->input->post('brand_name'), 'logo');
        if(isset($result_logo['error']))
        {
            $data["error_message"] = $result_logo['error'];
            $this->load->view('brand/add', $data);
            return;
        }
        //no file error
        $this->load->model('brand_model');
        $this->brand_model->add($result_logo['file_name']);
        redirect('admin/brand');
    }

    public function edit($brand_name=FALSE) 
	{		
		$data['page_title'] = 'Admin: Brand Management';
		
		if(!check_authen('staff',TRUE)) {
            return;            
        }
			
		if($brand_name===FALSE){
			redirect('admin/brand');
		}
		$this->load->model('brand_model');
		if($this->input->post('cancel')){
			redirect('admin/brand');
			return;
		}
		if (!$this->input->post('submit')) //not pass submit
		{			        
			$data['brand'] =  $this->brand_model->get($brand_name);
			$this->load->view('brand/edit',$data);
                        return;
                }
		else
		{
			$this->load->helper(array('form', 'url'));

			$this->load->library('form_validation');

			$this->form_validation->set_rules('brand_name', 'Brand name', 'trim|required');

			if ($this->form_validation->run() == FALSE)	{
				$this->load->view('brand/edit');
				return;
			}
			else
			{				
				$logo_name = FALSE;
				$this->load->library('upload');
										
				if($result_logo = $this->_upload_brand_file($this->input->post('brand_name'), 'logo'))
				{			
					//TODO:handel error
					if(isset($result_logo['error']))
					{
						echo 'error';				
					}
					$logo_name = $result_logo['file_name'];
				}
				
				$this->brand_model->edit($this->input->post('brand_name_key'));
				redirect('admin/brand');
			}
		}
       
	}
	
    function _upload_brand_file($brand_name, $form_name) 
	{
        if (!empty($_FILES[$form_name]['name'])) 
		{
            $config['upload_path'] = './assets/db/brands/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2000';
            $config['overwrite'] = TRUE;
            $config['file_name'] = $brand_name.'_'.$form_name.'.'.substr(strrchr($_FILES[$form_name]['name'], '.'), 1);
            $this->upload->initialize($config);

            if ($this->upload->do_upload($form_name)) 
			{
                return $this->upload->data();
            }
            else 
			{
                return array('error' => $this->upload->display_errors());
            }
        }
        return FALSE;
    }
	
	public function delete($brand_name=FALSE)
	{
		if(!check_authen('staff',TRUE)) 
		{		
            return;            
        }
		if($brand_name===FALSE)
		{
			redirect('admin/brand');
		}
		
		$this->load->model('brand_model');
		$logo = './assets/db/brands/'.$this->brand_model->get($brand_name)->logo;
		$this->brand_model->delete($brand_name,$logo);		
		redirect('admin/brand');		
		return;
		
	}
}
?>