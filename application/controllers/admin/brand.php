<?php
class Brand extends CI_Controller 
{
    public function index() 
    {
        if(!check_authen('staff',TRUE)) return;
        
        $this->load->model('brand_model');
		$data['page'] = 'brand/list';
        $data['page_title'] = 'Admin: Brand Management';
        $data['brand_list'] = $this->brand_model->get();
        $this->load->view('main_admin_page',$data);
    }

    public function add() 
    {
        if(!check_authen('staff',TRUE)) return;
        //authenticated
        $data['page_title'] = 'Admin: Brand Management';
        if (!$this->input->post('submit'))
        {
			$data['page'] = 'brand/add';
            $this->load->view('main_admin_page',$data);
            return;
        }
        //form submitted
        $data['form_brand_name'] = trim($this->input->post('brand_name'));
        $data['form_description_th'] = trim($this->input->post('description_th'));
		$data['form_description_en'] = trim($this->input->post('description_en'));
		$data['form_is_active'] = $this->input->post('is_active');
		
        $this->load->library('form_validation');
        $this->form_validation->set_rules('brand_name', 'Brand name', 'trim|required');
		
	if ($this->form_validation->run() == FALSE)
        { 
            $data['error_message']='Please fill in the brand name.';
			$data['page'] = 'brand/add';
            $this->load->view('main_admin_page', $data);
            return;
	}
        //validation passed
        $this->load->model('brand_model');
        if($this->brand_model->get_by_name($data['form_brand_name'])!=FALSE)
        {
            $data['error_message'] = 'Duplicate brand name. The brand name you entered is already existed in the database.';
			$data['page'] = 'brand/add';
            $this->load->view('main_admin_page',$data);
            return;
        }
		//echo $data['form_brand_name'];
		
        //none duplicate brand name
        $this->load->library('upload');
        $result_logo = $this->_upload_brand_file($this->input->post('brand_name'), 'logo');
        if(isset($result_logo['error']))
        {
            $data["error_message"] = $result_logo['error'];
			$data['page'] = 'brand/add';
            $this->load->view('main_admin_page', $data);
            return;
        }
        //no file error
        $this->brand_model->add($result_logo['file_name']);
		
		//create size chart
		$size_chart_name = array("WOMEN","MEN");
		$validbrandname = str_replace(' ','_',$data['form_brand_name']);
		$this->load->helper('file');
		foreach($size_chart_name as $filename)
		{
			//$file = asset_url().'size_chart/'.$validbrandname.'_'.$filename.'.txt';
			//$file = '/domains/bfashshop.com/public_html/assets/size_chart/'.$validbrandname.'_'.$filename.'.txt';
			//echo "path ".'./assets/size_chart/'.$validbrandname.'_'.$filename.'.txt';
			write_file('./assets/size_chart/'.$validbrandname.'_'.$filename.'.txt', '');
			//file_put_contents($file, "");
		}
		
        redirect('admin/brand');
		
    }

    public function edit($brand_id=FALSE) 
    {		
        if(!check_authen('staff',TRUE)) return;
        //authenticated
        $data['page_title'] = 'Admin: Brand Management';      		
        if($brand_id===FALSE)
        {
	    redirect('admin/brand');
        }
        $brand_id = revert_url($brand_id);
        //brand input
	$this->load->model('brand_model');
	if (!$this->input->post('submit')) //not pass submit
    	{			        
            $data['brand'] =  $this->brand_model->get($brand_id);
            if ($data['brand'] == FALSE) redirect('admin/brand');
			$data['page'] = 'brand/edit';
            $this->load->view('main_admin_page',$data);
            return;
        }
        //form submitted
        $data['form_brand_name'] = trim($this->input->post('brand_name'));
        $data['form_description_th'] = trim($this->input->post('description_th'));
		$data['form_description_en'] = trim($this->input->post('description_en'));
        $data['form_isActive'] = $this->input->post('is_active');
		
        $data['brand'] =  $this->brand_model->get($this->input->post('brand_id'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('brand_name', 'Brand name', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
            $data['error_message'] = 'Please fill in the brand name.';
			$data['page'] = 'brand/edit';
            $this->load->view('main_admin_page',$data);
            return;
    	}
        //form validated
        if($this->brand_model->get_by_name($data['form_brand_name'])!=FALSE && $data['form_brand_name'] != $this->input->post('brand_name'))
        {
            $data['error_message'] = 'Duplicate brand name. The brand name you entered is already existed in the database.';
            $data['page'] = 'brand/edit';
            $this->load->view('main_admin_page',$data);
            return;
        }
        //none duplicate brand name
        $logo_name = FALSE;
        $this->load->library('upload');
        if($result_logo = $this->_upload_brand_file($this->input->post('brand_name'), 'logo'))
        {
            if(isset($result_logo['error']))
            {
                $data["error_message"] = $result_logo['error'];
                $data['page'] = 'brand/edit';
				$this->load->view('main_admin_page',$data);
                return;
            }
            $logo_name = $result_logo['file_name'];
        }
        else if($this->input->post('remove_logo') != "")
        {
            $logo_name = NULL;
        }
        //no file error or no file uploaded			
		$this->brand_model->edit($this->input->post('brand_id'), $logo_name);
        redirect('admin/brand');
    }
	
    function _upload_brand_file($brand_id, $form_name) 
    {
        if (!empty($_FILES[$form_name]['name'])) 
        {
            $config['upload_path'] = './assets/db/brands/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2000';
            $config['overwrite'] = TRUE;
            $config['file_name'] = $brand_id.'_'.$form_name.'.'.substr(strrchr($_FILES[$form_name]['name'], '.'), 1);
            $this->upload->initialize($config);

            if ($this->upload->do_upload($form_name)) 
            {
                return $this->upload->data();
            }
            return array('error' => $this->upload->display_errors());    
        }
        return FALSE;
    }
    
    public function delete($brand_id=FALSE)
    {
        if(!check_authen('staff',TRUE)) 
        {		
            return;            
        }
        $data['page_title'] = 'Admin: Brand Management';
        if($brand_id===FALSE)
        {
            redirect('admin/brand');
        }
        
        $brand_id = revert_url($brand_id);
		$this->load->model('brand_model');
		if($this->brand_model->brand_has_product($brand_id))
		{
			$data['error_message'] = "Can not delete ".$brand_id." due to this brand have products";
			$data['brand_list'] = $this->brand_model->get();	
			$data['page'] = 'brand/list';
			$this->load->view('main_admin_page',$data);
			return;
		}
        $logo ="";
		if($this->brand_model->get($brand_id)->logo != "")
		{
			$logo = './assets/db/brands/'.$this->brand_model->get($brand_id)->logo;
		}
        $this->brand_model->delete($brand_id,$logo);		
        redirect('admin/brand');		
        return;		
    }
	
	public function search($keyword=FALSE)
	{
		if(!check_authen('staff',TRUE)) 
	    {		
			return;            
	    }
		$keyword = trim($keyword); 
		$this->load->model('brand_model');
		$data['page_title'] = 'Admin: Brand Management';
		$data['brand_list'] = $this->brand_model->search($keyword);
		$data['keyword'] = $keyword;		
		$data['page'] = 'brand/list';
		$this->load->view('main_admin_page',$data);
	}
	
	public function sizechart()
	{
		 if(!check_authen('staff',TRUE)) return;
        //authenticated
        $data['page_title'] = 'Admin: Size Chart Management';
        if (!$this->input->post('submit'))
        {
			$data['page'] = 'brand/sizechart';
            $this->load->view('main_admin_page',$data);
            return;
        }
	}

	public function size_chart($brand_id = FALSE)
	{
		if(!check_authen('staff',TRUE)) 
	    {		
			return;            
	    }
		if($brand_id===FALSE)
        {
			redirect('admin/brand');
        }
		$brand_id = revert_url($brand_id);
		$this->load->model('brand_model');
		//$data['brand'] =  $this->brand_model->get($this->input->post('brand_id'));
		$data['brand'] =  $this->brand_model->get($brand_id);
		//$data['cat'] = $cat;
		//$data['page'] = 'size_chart_back/edit';
		$data['page_title'] = 'Admin: Brand Management';
		$data['page'] = 'brand/size_chart';
		$this->load->view('main_admin_page',$data);
	}
	
	public function edit_size_chart($brand_id = FALSE, $gender)
	{
		if(!check_authen('staff',TRUE)) 
	    {		
			return;            
	    }
		if($brand_id===FALSE)
        {
			redirect('admin/brand');
        }
		/*--------------
		$this->load->helper('file');
		$file = './assets/size_chart/test_3_WOMEN.txt';
		$data['text'] = read_file($file);
		echo $file ."text ".$data['text'];
		*/
		$this->load->helper('file');
		$this->load->model('brand_model');
		$data['brand'] =  $this->brand_model->get($brand_id);		
		$data['gender'] = $gender;
		//echo $gender;
		$data['filename'] = str_replace(' ','_',$data['brand']->brand_name).'_'.$gender;
		//$filename = str_replace(' ','_',$data['brand']->brand_name).'_'.$gender;
		$file = './assets/size_chart/'.$data['filename'].'.txt';
		$data['text'] = read_file($file);
		
		$data['page_title'] = 'Admin: Brand Management';
		$data['page'] = 'brand/edit_size_chart';
		$this->load->view('main_admin_page',$data);
	}
	
	public function edit_size_chart_text($brand_id, $filename)
	{
	
		$this->load->helper('file');
		$text = $this->input->post('data');
		//file_put_contents('/domains/bfashshop.com/public_html/assets/size_chart/'.$filename.'.txt', $text);
		
		write_file('./assets/size_chart/'.$filename.'.txt', $text);
		
		//file_put_contents("assets\\size_chart\\test.txt", $this->input->post('data_tab'));
		redirect('admin/brand/size_chart/'.$brand_id);
	}
}
?>