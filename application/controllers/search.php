<?php 
class Search extends CI_Controller 
{
    public function index($search=FALSE) 
    {
		$this->load->model('bfash_model');
		$this->load->model('product_model');
		$this->load->model('image_model');
		$this->load->model('category_model');		
				
		$data = $this->bfash_model->init();
		
		$this->lang->load('content-history', $this->language_model->get());
		$this->lang->load('content_main_product_list', $this->language_model->get());
		
		if($item_id==FALSE)
			$data['base_url'] = base_url().'search/'.$product_name.'/'.$product_name;
		else
		$data['base_url'] = base_url().'search/'.$product_name.'/'.$item_id;
		
		//breadcrumbs
		if($product_name==FALSE && $item_id==FALSE)
		{
			$data['breadcrumbs'] = array($this->lang->line('Home'), $this->lang->line('search'));
			$data['link'] = array(site_url(),site_url());
		}
		else if($product_name!=FALSE && $item_id==FALSE)
		{
			$data['breadcrumbs'] = array($this->lang->line('Home'), $this->lang->line('search'),$product_name);
			$data['link'] = array(site_url(), site_url(),site_url().'search/'.$product_name);
		}
		else if($product_name == FALSE && $item_id!=FALSE)
		{
			$data['breadcrumbs'] = array($this->lang->line('Home'), $this->lang->line('search'),$item_id);
			$data['link'] = array(site_url(), site_url(),site_url().'search/'.$product_name.'/'.$item_id);
		}
		
		//set page history
		$this->session->set_userdata('redirect',current_url());
			
		$data['search'] = $this->product_model->get_by_name($search);	
		
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
		
		$data['page'] = 'front_product/content_main_product_list';	
		$this->load->view('main_page',$data);
    }
	
	public function product_detail($product_name,$item_id,$product_id,) 
    {
		$this->load->model('bfash_model');
		$this->load->model('product_model');
		$this->load->model('image_model');
		$this->load->model('category_model');
		
		$data = $this->bfash_model->init();
		$this->lang->load('content-history', $this->language_model->get());
		$this->lang->load('content_main_product_list', $this->language_model->get());

		$data['product_detail'] = $this->product_model->get_main_image($product_id);
		$data['sub_image'] = $this->product_model->get_sub_image($product_id);	
		$data['color_in_size'] = $this->product_model->get_color_in_size($product_id,'10');		
		$data['item_detail_size'] = $this->product_model->get_item_detail_size($product_id);
		
		//breadcrumbs
		$data['breadcrumbs'] = array($this->lang->line('Home'),$this->lang->line('search'), $data['product_detail']->product_name_en);
		$data['link'] = array(site_url(), site_url(), site_url().'search/'.$product_name.'/'.$product_id);
		
		//set page history
		$this->session->set_userdata('redirect',current_url());
		
		$data['page'] = 'front_product/content_main_product_name';
		$this->load->view('main_page',$data);
    }
	
}
?>