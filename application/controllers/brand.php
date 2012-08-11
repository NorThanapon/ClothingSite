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
        if (!$this->input->post('submit')) 
		{
            $this->load->view('brand/add',$data);
            return;
        }
         
		
		$this->load->library('upload');
		$result_logo = $this->upload_brand_file($this->input->post('brand_name'), 'logo');
		$result_size = $this->upload_brand_file($this->input->post('brand_name'), 'size');
		//TODO:handel error
		if(isset($result_logo['error']))
		{
			echo 'error';
		}
		
		$this->load->model('brand_model');
		$this->brand_model->add($result_logo['file_name'],$result_size['file_name']);
		redirect();
		
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
		
		if (!$this->input->post('submit')) {
            $this->load->model('brand_model');
			//echo $brand_name;
			$data['brand'] =  $this->brand_model->get_brand($brand_name);
			$this->load->view('brand/edit',$data);
			
            return;
        }		
	}
	
    function upload_brand_file($brand_name, $form_name) 
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
}
?>