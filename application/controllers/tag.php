<?php 
class Tag extends CI_Controller 
{
    public function index($tag_name=FALSE, $tag_id=FALSE) 
    {
		$this->load->model('bfash_model');
		$this->load->model('product_model');
		$this->load->model('image_model');
		$this->load->model('category_model');
		$this->load->model('tag_model');		
				
		$data = $this->bfash_model->init();
		
		$this->lang->load('content-history', $this->language_model->get());
		$this->lang->load('content_main_product_list', $this->language_model->get());

		$data['base_url'] = base_url().'tag/'.$tag_name.'/'.$tag_id;
		
		//breadcrumbs
		$data['breadcrumbs'] = array($this->lang->line('Home'), $tag_name);
		
		$data['link'] = array(site_url(), site_url().'tag/'.$tag_name.'/'.$tag_id);
		
		$data['products'] = $this->product_model->get_product_tag_image($tag_id);	
		
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
	
	public function product_detail($tag_name,$tag_id,$product_id) 
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
		$data['breadcrumbs'] = array($this->lang->line('Home'), $tag_name, $data['product_detail']->product_name_en);
		
		$data['link'] = array(site_url(), site_url().'tag/'.$tag_name.'/'.$tag_id, site_url().'tag/'.$tag_name.'/'.$tag_id.'/'.$data['product_detail']->product_name_en);
		
		
		$data['page'] = 'front_product/content_main_product_name';
		$this->load->view('main_page',$data);
    }
	
}
?>