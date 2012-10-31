<?php
class Product extends CI_Controller 
{
    public function index() 
    {
        if(!check_authen('staff',TRUE)) 
        {
            return;
        }
		$this->load->model('product_model');
		$this->load->model('category_model');
		$this->load->model('brand_model');
        $data['page_title'] = 'Admin: Product Management';
		$data['product_list'] = $this->product_model->get();
		$data['category_list'] = $this->category_model->get();
		$data['brand_list'] = $this->brand_model->get();
		$data['page'] = 'product/list';
        $this->load->view('main_admin_page',$data);

       // $this->load->view('product/list',$data);
    }
	
	public function add() 
	{
		$data['dup_message_th']="";
		$data['dup_message_en']="";
		$data['page'] = 'product/add';
		$data['form_on_sale']=0;
        
		if(!check_authen('staff',TRUE)) {	
			return;       
	    }
		$this->load->model('brand_model');
		$data['brands'] = $this->brand_model->get();
		$this->load->model('category_model');
		$data['categories'] = $this->category_model->get();
		
		//authenticated
		$data['page_title'] = 'Admin: Product Management';
		$this->load->model('product_model');
		$data['products'] = $this->product_model->get();
		if (!$this->input->post('submit') && !$this->input->post('manage_photo')) 
	    {    
			$this->load->view('main_admin_page',$data);
			return;
	    }
		//form submitted
		//$data['form_product_id'] = $this->input->post('product_id');
		$data['form_product_name_th'] = $this->input->post('product_name_th');
		$data['form_product_name_en'] = $this->input->post('product_name_en');
		$data['form_brand_id'] = $this->input->post('brand_id');
		$data['form_cat_id'] = $this->input->post('cat_id');
		$data['form_total_quantity'] =0;
		$data['form_markup_price']  = $this->input->post('markup_price');
		$data['form_markdown_price']  = $this->input->post('markdown_price');
		$data['form_description_th']  = $this->input->post('description_th');
		$data['form_description_en']  = $this->input->post('description_en');
		$data['form_how_to_wash_th']  = $this->input->post('how_to_wash_th');
		$data['form_how_to_wash_en']  = $this->input->post('how_to_wash_en');
		$data['form_on_sale']  = $this->input->post('on_sale');
		$active=0;
		if($this->input->post('is_active')==true)
		{
			$active = 1;
		}
		$data['form_is_active']  = $active;
		$on_sale=0;
		if($this->input->post('on_sale')==true)
		{
			$on_sale = 1;
		}		
		$data['form_on_sale']  = $on_sale;
	
		
		//form validation
		$this->load->library('form_validation');
		//$this->form_validation->set_rules('product_id', 'Product ID', 'trim|required');
		$this->form_validation->set_rules('product_name_en', 'Name(English)', 'trim|required');
		$this->form_validation->set_rules('product_name_th', 'Name(Thai)', 'trim|required');
		$this->form_validation->set_rules('brand_id', 'Brand', 'trim|required');
		$this->form_validation->set_rules('markup_price', 'Markup Price', 'trim|required');
		$this->form_validation->set_rules('cat_id', 'Category', 'trim|required');
		//$this->form_validation->set_rules('total_quantity', 'Total Quantity', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
        {
            $data['error_message'] = 'Please fill in the field that is required';
			$data['brand'] = $this->brand_model->get();
			$data['category'] = $this->category_model->get();    
			$this->load->view('main_admin_page',$data);
            return;
    	}
		$this->load->model('product_model');
        /*if($this->product_model->get($data['form_product_id'])!=FALSE)
        {
            $data['error_message'] = 'Duplicate productID. The productID you entered is already existed in the database.';
            $this->load->view('main_admin_page',$data);
            return;
        }*/
		//check none duplicate productID
		
		$this->product_model->add();
		
		if($this->input->post('manage_photo'))
		{
			$data['product'] =  $this->product_model->get($this->input->post('product_id'));
			if ($data['product'] == FALSE)
			{
			//	redirect('admin/product');
				$data['page'] = 'product/list';
				$this->load->view('main_admin_page',$data);
			}
			//To Do
			$product_id = $this->product_model->get_last_id();
			//To do 
            redirect('admin/product/photo/'.$product_id->product_id);
			//$data['page'] = 'admin/product/photo/'.$this->input->post('product_id');
			//$this->load->view('main_admin_page',$data);
            return;
		}
		
		redirect('admin/product');
		//$data['page'] = 'product/list';		
		//$this->load->view('main_admin_page',$data);
	}
	
	public function edit($product_id=FALSE)
	{
		if(!check_authen('staff',TRUE)) 
		{	
			return;       
	    }
		//authenticated
		$data['page_title'] = 'Admin: Product Management';
		$data['dup_message_th']="";
		$data['dup_message_en']="";
		if($product_id===FALSE)
        {
			redirect('admin/product');
        }
		//product input
		$this->load->model('product_model');
		$this->load->model('category_model');
		$this->load->model('brand_model');
		
		if (!$this->input->post('submit') && !$this->input->post('manage_photo')) //not pass submit AND manage_photo
    	{			 
			$data['product'] =  $this->product_model->get($product_id);
			$data['brand'] = $this->brand_model->get();
			$data['category'] = $this->category_model->get();    
            if ($data['product'] == FALSE)
			{
				redirect('admin/product');
			}
            //$this->load->view('product/edit',$data);
			$data['page'] = 'product/edit';		
			$this->load->view('main_admin_page',$data);
			
            return;
        }
		//form submitted
		//$data['form_product_id'] = $this->input->post('product_id');
		$data['form_product_name_th'] = $this->input->post('product_name_th');
		$data['form_product_name_en'] = $this->input->post('product_name_en');
		$data['form_brand_name'] = $this->input->post('brand_name');
		$data['form_cat_id'] = $this->input->post('cat_id');
		//$data['form_total_quantity'] = $this->input->post('total_quantity');
		$data['form_markup_price']  = $this->input->post('markup_price');
		$data['form_markdown_price']  = $this->input->post('markdown_price');
		$data['form_description_th']  = $this->input->post('description_th');
		$data['form_description_en']  = $this->input->post('description_en');
		$data['form_how_to_wash_th']  = $this->input->post('how_to_wash_th');
		$data['form_how_to_wash_en']  = $this->input->post('how_to_wash_en');
		$data['form_on_sale']  = $this->input->post('on_sale');
		$active=0;
		if($this->input->post('is_active')==true)
		{
			$active = 1;
		}
		$data['form_is_active']  = $active;
		$on_sale=0;
		if($this->input->post('on_sale')==true)
		{
			$on_sale = 1;
		}		
		$data['form_on_sale']  = $on_sale;
		
		//form validation
		$this->load->library('form_validation');
		//$this->form_validation->set_rules('product_id', 'Product ID', 'trim|required');
		$this->form_validation->set_rules('product_name_en', 'Name(English)', 'trim|required');
		$this->form_validation->set_rules('product_name_th', 'Name(Thai)', 'trim|required');
		$this->form_validation->set_rules('brand_id', 'Brand', 'trim|required');
		$this->form_validation->set_rules('markup_price', 'Markup Price', 'trim|required');
		$this->form_validation->set_rules('cat_id', 'Category', 'trim|required');
		$this->form_validation->set_rules('total_quantity', 'Total Quantity', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
        {
            $data['error_message'] = 'Please fill in the field that is required.';
			$data['brand'] = $this->brand_model->get();
			$data['category'] = $this->category_model->get();    
			$data['product'] =  $this->product_model->get($product_id);
			//$this->load->view('product/edit', $data);
			$data['page'] = 'product/edit';		
			$this->load->view('main_admin_page',$data);
            return;
    	}
		
		$this->product_model->edit($this->input->post('product_id_key'));
		
		if($this->input->post('manage_photo'))
		{
			$data['product'] =  $this->product_model->get($product_id);
			if ($data['product'] == FALSE)
			{
				redirect('admin/product');
			}
            redirect('admin/product/photo/'.$product_id);
            return;
		}
		
		//manage photo is not submitted
		redirect('admin/product');
	}
	
	public function delete($product_id=FALSE)
	{
	    if(!check_authen('staff',TRUE)) 
	    {		
			return;            
	    }
	    if($product_id===FALSE)
	    {
		    redirect('admin/product');
	    }
		$this->load->model('product_model');
		$this->load->model('category_model');
		$this->load->model('brand_model');
		if($this->product_model->has_items_under_products(array($product_id)))// check has items of this product or not
		{
			$product=$this->product_model->get($product_id);
			$this->load->library('form_validation');
			$data['error_message'] = 'Can not delete '.$product->product_name_en.'. It has items undered it.';		
			$data['product_list'] = $this->product_model->get();
			$data['category_list'] = $this->category_model->get();
			$data['brand_list'] = $this->brand_model->get();
			//$this->load->view('product/list', $data);
			$data['page'] = 'product/list';
			$this->load->view('main_admin_page',$data);
			return;
		}
		$this->load->model('image_model');
		$image_of_product = $this->image_model->get_photos($product_id);
		foreach($image_of_product as $item)
		{
			//echo ">>>".$item->image_file_name;
			$this->image_model->delete_photo($item->image_id,'./assets/db/products/'.$item->image_file_name);
		}
		
		
		$this->product_model->delete($product_id);	   
	    $data['product_list'] = $this->product_model->get();
		redirect('admin/product');
	}
	public function search($product_cat, $brand=FALSE, $status, $name=FALSE)
	{
	    if(!check_authen('staff',TRUE)) 
	    {
			return;
	    }
	    if($name !== FALSE) {
			$name =  rawurldecode($name);
	    }
	    
	    
	    $this->load->model('product_model');
		$this->load->model('category_model');
		$this->load->model('brand_model');
	    $data['page_title'] = 'Admin: Product Management';
	    $data['product_list'] = $this->product_model->search($product_cat, $brand, $status, $name);
	    $data['products'] = $this->product_model->get();
		$data['category_list'] = $this->category_model->get();
		$data['brand_list'] = $this->brand_model->get();
	    $data['search_product_cat'] = $product_cat;
	    $data['search_name'] = $name;
		$data['search_brand'] = $brand;
		$data['search_status'] = $status;
	    //$this->load->view('product/list',$data);
		$data['page'] = 'product/list';
        $this->load->view('main_admin_page',$data);
	    
	}
	
	public function detail($product_id)
	{
		if(!check_authen('staff',TRUE)) 
	    {
			return;
	    }
		$data['page_title'] = 'Admin: Product Management';
		$this->load->model('product_model');
		$data['product'] = $this->product_model->get($product_id);
		//$this->load->view('product/detail',$data);
		$data['page'] = 'product/detail';
        $this->load->view('main_admin_page',$data);
	}
	public function update_status()
	{
		if(!check_authen('staff',TRUE)) 
	    {
			return;
	    }		
		$this->load->model('product_model');
		if(!$this->input->post('btn_update'))
		{
			$this->delete_batch();
			return;
		}
		if($this->input->post('chb_select_product')=="") 
	    {
			$this->load->model('category_model');
			$this->load->model('brand_model');
			$this->load->library('form_validation');
			$data['error_message'] = 'Please select products.';		
			$data['product_list'] = $this->product_model->get();
			$data['category_list'] = $this->category_model->get();
			$data['brand_list'] = $this->brand_model->get();
			$data['page'] = 'product/list';
			$this->load->view('main_admin_page',$data);
			return;			
	    }	
		
		$i=0;
		
		//$temp['product_id'][0]="";
		//$temp[0]="";
		$status=0;
		foreach( $this->input->post('chb_select_product') as $item)
		{
			$temp[$i]['product_id'] = $item;			
			if($this->input->post('change_status')=="1")
			{
				$temp[$i]['is_active']=1;
			}
			else if($this->input->post('change_status')=="2")
			{
				$temp[$i]['is_active']=0;
			}
			else if($this->input->post('change_status')=="3")
			{
				$temp[$i]['on_sale']=1;
			}
			else if($this->input->post('change_status')=="4")
			{
				$temp[$i]['on_sale']=0;
			}
			$i++;
			
		}
			//var_dump($temp);
		
		$this->product_model->update_status($temp);		
		$this->load->model('category_model');
		$this->load->model('brand_model');
		$data['product_list'] = $this->product_model->get();
		$data['category_list'] = $this->category_model->get();
		$data['brand_list'] = $this->brand_model->get();
		redirect('admin/product');
		
	}
	public function delete_batch()
	{
		if(!check_authen('staff',TRUE)) 
	    {
			return;
	    }		
		$this->load->model('product_model');	
		$this->load->model('category_model');
		$this->load->model('brand_model');
		if($this->input->post('chb_select_product')==null)
		{
			$this->load->library('form_validation');
			$data['error_message'] = 'Please select products.';		
			$data['product_list'] = $this->product_model->get();
			$data['category_list'] = $this->category_model->get();
			$data['brand_list'] = $this->brand_model->get();
			//$this->load->view('product/list', $data);
			$data['page'] = 'product/list';
			$this->load->view('main_admin_page',$data);
			return;
		}
			
		$i=0;		
		$status=0;
		$temp="";
		foreach( $this->input->post('chb_select_product') as $item)
		{
			
				$temp = $temp."'".$item."',";	
				$i++;
							
		}
		if($this->product_model->has_items_under_products($this->input->post('chb_select_product')))
		{
			$this->load->library('form_validation');
			$data['error_message'] = 'Can not delete some products. They have items undered it.';		
			$data['product_list'] = $this->product_model->get();			
			$data['category_list'] = $this->category_model->get();
			$data['brand_list'] = $this->brand_model->get();
			//$this->load->view('product/list', $data);
			$data['page'] = 'product/list';
			$this->load->view('main_admin_page',$data);
			return;
		}
		
		$temp = substr($temp, 0,strlen($temp)-1); 		
		$this->product_model->delete_batch($temp);
		
		$data['product_list'] = $this->product_model->get();
		$data['category_list'] = $this->category_model->get();
		$data['brand_list'] = $this->brand_model->get();
		redirect('admin/product');
		
	}
	function _upload_photo_file($photo_id, $form_name) 
    {
		
        if (!empty($_FILES[$form_name]['name'])) 
        {
            $config['upload_path'] = './assets/db/products/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2000';				
            $config['overwrite'] = TRUE;		
            $config['file_name'] = $photo_id.'_'.$form_name.'.'.substr(strrchr($_FILES[$form_name]['name'], '.'), 1);
			
            $this->upload->initialize($config);
			
            if ($this->upload->do_upload($form_name)) 
            {		
				
				$this->_upload_resize_photo(1325,1725,$config['file_name'],'l');
				$this->_upload_resize_photo(265,345,$config['file_name'],'m');
				$this->_upload_resize_photo(57,74,$config['file_name'],'s');	
                return $this->upload->data();				 
            }
			echo "error".$this->upload->display_errors();
           // return array('error' => $this->upload->display_errors());    
        }
		//echo "--No-------------";//----------------------------------------------------------------------------------------
        return FALSE;
    }
	public function _upload_resize_photo($width,$height,$file_name,$size_name)
	{				
		$this->load->library('image_moo');
		$this->image_moo->load('./assets/db/products/'.$file_name);
		$this->image_moo->resize($width,$height);	
		$this->image_moo->set_jpeg_quality(90);
		$this->image_moo->save('./assets/db/products/'.$size_name.'_'.$file_name);
		//if ($this->image_moo->error) echo $this->image_moo->display_errors(); 
	}
	public function photo($product_id)//addPhoto change Name
	{
		if(!check_authen('staff',TRUE)) return;
		$this->load->model('product_model');
		$this->load->model('image_model');
		$data['product'] = $this->product_model->get($product_id);
		$data['photos'] = $this->image_model->get_photos($product_id);
		$data['page_title']='Manage Photo';
		$this->load->model('color_model');
        $data["all_colors"] = $this->color_model->get();
        $data["colors"] = $data["all_colors"];
        $data["allow_manage_color"] = TRUE;
        $data["picker_control_name"] = "color";
        $data["picker_control_id"] = "ddl-color";
		$data['page'] = 'product/photo_management';
        $this->load->view('main_admin_page',$data);
		
		//$this->load->view('product/photo_management',$data);
		 
	}
	public function delete_photo($photo_id,$product_id)
	{
		if(!check_authen('staff',TRUE)) return;
		$this->load->model('product_model');
		$this->load->model('image_model');
        $photo = $this->image_model->get_photo_file($photo_id);		
        $this->image_model->delete_photo($photo_id, './assets/db/products/'.$photo->file_name);
		$this->image_model->unlink_image('./assets/db/products/s_'.$photo->file_name);
		$this->image_model->unlink_image('./assets/db/products/m_'.$photo->file_name);
		$this->image_model->unlink_image('./assets/db/products/l_'.$photo->file_name);
		$data['product'] = $this->product_model->get($this->input->post('product_id'));
		$data['photos'] = $this->image_model->get_photos($product_id);
		redirect('admin/product/photo/'.$product_id);
		
	}
	public function add_photo()
	{
	
		if(!check_authen('staff',TRUE)) return;
		 
		$this->load->library('upload');
		$this->load->model('product_model');
		$this->load->model('image_model');
		$color_id = $this->input->post('color');
		if($this->input->post('photo')==null && $color_id==null)
		{
			$this->load->library('form_validation');
			$data['error_message'] = 'Please select image and color.';
			$data['product'] = $this->product_model->get($this->input->post('product_id'));
			$data['photos'] = $this->image_model->get_photos('$product_id');
			//$data['page'] = 'product/photo_management';
			$this->load->view('main_admin_page',$data);
			redirect('admin/product/photo/'.$this->input->post('product_id'),$data);			
			return;
		}
		
		$photo_id = $this->image_model->get_latest()->image_id;
		$photo_id++;		
		
        $result_photo = $this->_upload_photo_file($photo_id,'photo');		
		$data['product'] =  $this->product_model->get($this->input->post('product_id'));
		if ($data['product'] == FALSE)
		{
			redirect('admin/product');
			return;
		}
		
		$this->image_model->add_photo($result_photo['file_name'] ,$color_id);
		$data['product'] = $this->product_model->get($this->input->post('product_id'));
		$data['photos'] = $this->image_model->get_photos('$product_id');
		redirect('admin/product/photo/'.$this->input->post('product_id'));
	   
	}
	public function edit_color($product_id,$image_id,$color_id)
	{
		if(!check_authen('staff',TRUE)) return;
		
		$this->load->model('product_model');		
		$this->load->model('image_model');
		//$image_id = $this->input->post('image_id');	
		$temp = 'color_change';
		//$color_id = $this->input->post($temp);		
        $this->image_model->edit_color($image_id,$color_id);
		$data['product'] = $this->product_model->get($this->input->post('product_id'));
		$data['photos'] = $this->image_model->get_photos($product_id);	
		redirect('admin/product/photo/'.$product_id);
		
	}
	public function save_main_image()
	{
		if(!check_authen('staff',TRUE)) return;
		$this->load->model('product_model');
		$this->load->model('image_model');
		$this->product_model->save_main_image($this->input->post('main_image'));
		$data['product'] = $this->product_model->get($this->input->post('product_id'));
		$data['photos'] = $this->image_model->get_photos($this->input->post('product_id'));	
		redirect('admin/product/photo/'.$this->input->post('product_id'));
		
	}
}
?>