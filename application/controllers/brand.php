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
        $data['page_title'] = 'Admin: Brand Management';
        if(!check_authen('staff',TRUE)) 
		{
            return;            
        }
		if($this->input->post('cancel'))
		{
			redirect('brand');
			return;
		}
        if (!$this->input->post('submit')) 
		{
            $this->load->view('brand/add',$data);
            return;
        }
		$this->load->library('upload');
		$result_logo = $this->_upload_brand_file($this->input->post('brand_name'), 'logo');
		//$result_size = $this->_upload_brand_file($this->input->post('brand_name'), 'size');
		//TODO:handel error
		if(isset($result_logo['error']))
		{
			echo 'error';
		}
		
		
		$this->load->model('brand_model');
		$this->brand_model->add($result_logo['file_name']);
		redirect('brand');
		
		//$this->load->model('staff_model');
		//$this->staff_model->add_staff();
        
    }
    public function edit($brand_name=FALSE) 
	{		
		$data['page_title'] = 'Admin: Brand Management';
		
		if(!check_authen('staff',TRUE)) {
            return;            
        }
			
		if($brand_name===FALSE)
		{
			redirect('brand');
		}
		
		$this->load->model('brand_model');
		if($this->input->post('cancel'))
		{
			redirect('brand');
			return;
		}
		if (!$this->input->post('submit')) //not pass submit
		{			        
			$data['brand'] =  $this->brand_model->get($brand_name);
			$this->load->view('brand/edit',$data);			
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
			redirect('brand');
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
			redirect('category');
		}
		
		$this->load->model('brand_model');
		
		$this->category_model->delete($brand_name);
		//ToDo:		
		redirect('brand');		
		return;
		
	}
}
?>