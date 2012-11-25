<?php 
class Search extends CI_Controller 
{	public function index() 
	{
        $data['page_title'] = "Welcome to BfashShop.com";
		$this->load->model('brand_model');
		$data['brand_list'] = $this->brand_model->get(); 				
		$data['page'] = '';
        //$this->load->view('main_page',$data);
		redirect('');
    }
	public function product($search,$product_id=FALSE) 
	{
		$this->load->model('bfash_model');
		$this->load->model('product_model');
		$this->load->model('image_model');
		$this->load->model('category_model');
				
		$data = $this->bfash_model->init();
		$search = str_replace("-"," ",$search);
		$this->lang->load('content-history', $this->language_model->get());
		$this->lang->load('content_main_product_list', $this->language_model->get());
	
	
	
		if($product_id!=FALSE)
		{
			$data['product_detail'] = $this->product_model->get_main_image($product_id);
			$item = $this->product_model->get_main_image($product_id);
			$data['sub_image'] = $this->product_model->get_sub_image($product_id,$item->size,$item->color_id);	
			
			$size = $this->product_model->get_size($product_id);	

			//for size chart
			$data['brand_name'] = str_replace(' ','-',$item->brand_name);
			$data['brand_id'] = $item->brand_id;
			$data['product_id'] = $product_id;
			
			$data['color_in_size'] = $this->product_model->get_color_in_size($product_id,$size->size);
			
			$data['item_detail_size'] = $this->product_model->get_item_detail_size($product_id);

			$data['base_url'] = base_url().'search/'.$search.'/'.$product_id;
			
			//breadcrumbs
			$data['breadcrumbs'] = array($this->lang->line('Home'), $data['re_name']=0, $data['product_detail']->product_name_en);
			$data['link'] = array(site_url(), site_url().'search/'.$search.'/'.$product_id, $data['base_url']);
			
			//set page history
			$this->session->set_userdata('redirect',current_url());
			
			$data['page'] = 'front_product/content_main_product_name';
			$this->load->view('main_page',$data);
			return;
		}
		
		$data['re_name'] = str_replace(' ','-',$search);
		
		$data['base_url'] = base_url().'search/'.$search;
		
		//breadcrumbs
		$data['breadcrumbs'] = array($this->lang->line('Home'), $search);
		$data['link'] = array(site_url(), site_url().'search/'.$search);
		
		$data['products'] = $this->product_model->search_by_key($search);	
		$data['page'] = 'front_product/content_main_product_list';
			
		//set page history
		$this->session->set_userdata('redirect',current_url());
		
		//set product
		$data['num_item'] = count($data['products']);
		$data['show_start'] = 1;
		$data['show_end'] = 20;
		if($data['show_end']>$data['num_item'])
		{
			$data['show_end'] = $data['num_item'];
		}
		$data['per_page'] = 20;
		if($data['show_end']==0)
		{
			$data['show_end'] = 1;
		}
		$data['num_page'] = ceil($data['num_item']/$data['show_end']); // CHANGE to 20
		$data['current_page'] = 1;
		$this->load->view('main_page',$data);
    }

	public function product_list( $search, $page=0, $per_page=0 ,$product_id=FALSE)
    {
		$this->load->model('bfash_model');
		$this->load->model('product_model');
		$this->load->model('image_model');
		$this->load->model('category_model');
		$search = str_replace("-"," ",$search);
		$data = $this->bfash_model->init();
		$this->lang->load('content-history', $this->language_model->get());
		$this->lang->load('content_main_product_list', $this->language_model->get());
		
		
		
		if($product_id!=FALSE)
		{
			$data['product_detail'] = $this->product_model->get_main_image($product_id);
			$item = $this->product_model->get_main_image($product_id);
			$data['sub_image'] = $this->product_model->get_sub_image($product_id,$item->size,$item->color_id);	
			
			$size = $this->product_model->get_size($product_id);	

			//for size chart
			$data['brand_name'] = str_replace(' ','-',$item->brand_name);
			$data['brand_id'] = $item->brand_id;
			$data['product_id'] = $product_id;
			
			$data['color_in_size'] = $this->product_model->get_color_in_size($product_id,$size->size);
			
			$data['item_detail_size'] = $this->product_model->get_item_detail_size($product_id);

			$data['base_url'] = base_url().'search/'.$search.'/'.$product_id;
			
			//breadcrumbs
			$data['breadcrumbs'] = array($this->lang->line('Home'), $data['re_name']=0, $data['product_detail']->product_name_en);
			$data['link'] = array(site_url(), site_url().'search/'.$search.'/'.$product_id, $data['base_url']);
			
			//set page history
			$this->session->set_userdata('redirect',current_url());
			
			$data['page'] = 'front_product/content_main_product_name';
			$this->load->view('main_page',$data);
	
		}
				
		$data['re_name'] = str_replace('-',' ',$search);
		
		$data['products'] = $this->product_model->search_by_key($search);

		$data['base_url'] = base_url().'search/'.$search.'/page/'.$page.'/'.$per_page;
		//breadcrumbs
		$data['breadcrumbs'] = array($this->lang->line('Home'), $search);
		$data['link'] = array(site_url(), site_url().'search/'.$page.'/'.$per_page);
		$data['page'] = 'front_product/content_main_product_list';
		
		$data['num_item'] = count($data['products']);
			if($per_page == 0)
			{
				$data['show_end'] = $data['num_item'];
				$data['show_start'] = 1;
				$data['per_page'] = $data['num_item'];
				$data['num_page'] = 1; 
				$data['current_page'] = $page;
				$this->load->view('main_page',$data);
				return ;
			}
			
			$data['show_end'] = $per_page*$page;
			$data['show_start'] = ($per_page*($page-1)+1);
			if($data['show_start']>$data['num_item'])
			{
				$data['show_start'] = $data['show_start']-($data['show_start']-$data['num_item']);
			}
			if($page == 1)
			{
				$data['show_start'] = 1;
			}
			if($data['show_end']>$data['num_item']){
				$data['show_end'] = $data['show_end']-($data['show_end']-$data['num_item']);
			}
			$data['per_page'] = $per_page;
			$data['num_page'] = ceil($data['num_item']/$per_page); // CHANGE to 20
			$data['current_page'] = $page;
		
		$this->load->view('main_page',$data);
	}
	

    
}
