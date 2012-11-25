<?php
class Category extends CI_Controller {
	public function index($brand_id) {		
		//$this->load->model('c_model');
		//$data['brand_list'] = $this->brand_model->get(); 				
		//$data['page'] = 'brand_list';
        $this->load->view('main_page',$data);
    }
	public function product($cat_gender,$cat_name=FALSE,$cat_id=FALSE,$product_id=FALSE,$item=FALSE){
		
		$this->load->model('bfash_model');
		$this->load->model('product_model');
		$this->load->model('image_model');
		$this->load->model('category_model');
		
		$data = $this->bfash_model->init();
		
		$this->lang->load('content-history', $this->language_model->get());
		$this->lang->load('content_main_product_list', $this->language_model->get());
		
		// set lang
		$cat_name_att = 'cat_name_'.$data['lang'];
		$cat_name_lang = $this->category_model->get($cat_id)->$cat_name_att;
					
		if($product_id != FALSE)
		{	
			//set lang
			$product_name_att = 'product_name_'.$data['lang'];
			$product_name_lang = $this->product_model->get_main_image($product_id)->$product_name_att;
			$item = $this->product_model->get_main_image($product_id);
			
			$data['page'] = 'front_product/content_main_product_name';
			$data['base_url'] = base_url().'category/'.$cat_gender.'/'.$cat_name.'/'.$cat_id.'/'.$product_id;
			//breadcrumbs
			$data['breadcrumbs'] = array($this->lang->line('Home'), $cat_name_lang,$product_name_lang);
			$data['link'] = array(site_url(), base_url().'category/'.$cat_gender.'/'.$cat_name.'/'.$cat_id, $data['base_url'], );
			$product = $this->product_model->get($product_id);
			$data['brand_id'] = $product->brand_id;
			$data['brand_name'] = str_replace(' ','-',$product->brand_name);
			
			$data['product_id'] = $product_id;
			//set page history
			$this->session->set_userdata('redirect',current_url());
		
			$data['product_detail'] = $this->product_model->get_main_image($product_id);		
			$data['sub_image'] = $this->product_model->get_sub_image($product_id,$item ->size,$item->color_id);
			$data['logo'] = $this->product_model->get_product_brand_image($data['product_detail']->brand_name);
			$data['item_detail_size'] = $this->product_model->get_item_detail_size($product_id);
			$data['item_detail_color'] = $this->product_model->get_item_detail_color($product_id);
			$this->load->view('main_page',$data);
			return ;
		}
		
		//set common page
		$data['page'] = 'front_product/content_main_product_list';
		$data['base_url'] = base_url().'category/'.$cat_gender.'/'.$cat_name.'/'.$cat_id;
		//breadcrumbs
		$data['breadcrumbs'] = array($this->lang->line('Home'), $cat_name_lang);
		$data['link'] = array(site_url(), $data['base_url']);
		
		//set page history
		$this->session->set_userdata('redirect',current_url());
		
		if($cat_gender == "women")
		{
			
			//Set product_list
			$data['products'] = $this->product_model->get_product_cat_image($cat_id);
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
		if($cat_gender == "men")
		{
			
			//Set product_list
			$data['products'] = $this->product_model->get_product_cat_image($cat_id);
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
	}
	public function product_list($cat_gender,$cat_name=FALSE,$cat_id=FALSE,$page=0,$per_page=0){
		$this->load->model('bfash_model');
		$this->load->model('product_model');
		$this->load->model('image_model');
		$this->load->model('category_model');
		
		$data = $this->bfash_model->init();
		$data['page'] = 'front_product/content_main_product_list';
		
		$this->lang->load('content-history', $this->language_model->get());
		$this->lang->load('content_main_product_list', $this->language_model->get());
		
		$cat_name_att = 'cat_name_'.$data['lang'];
		$cat_name_lang = $this->category_model->get($cat_id)->$cat_name_att;
		
		if($cat_gender == "women")
		{
			//set common page
			$data['previous'] = array($this->lang->line('Home'));
			if($cat_name === FALSE){
				$data['current'] = '';
			}
			$data['current'] = $cat_name_lang;
			$data['base_url'] = base_url().'category/'.$cat_gender.'/'.$cat_name.'/'.$cat_id;
			//============ END setting common page
		
			//Set product_list
			$data['products'] = $this->product_model->get_product_cat_image($cat_id);
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
		else if($cat_gender == "men")
		{
			//set common page
			$data['previous'] = array($this->lang->line('Home'));
			if($cat_name === FALSE){
				$data['current'] = '';
			}
			$data['current'] = $cat_name_lang;
			$data['base_url'] = base_url().'category/'.$cat_gender.'/'.$cat_name.'/'.$cat_id;
			//END 
			
			//Set product_list
			$data['products'] = $this->product_model->get_product_cat_image($cat_id);
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
	/*
	public function change_language() {
		if (!$this->input->post('lang'))
		{		
			product($cat_gender,$cat_name=FALSE,$cat_id=FALSE,$product_id=FALSE,$item=FALSE);			
			//redirect(current_url());
		}
		else
		{
			$this->load->model('language_model');
			$this->language_model->add($this->input->post('lang'));
			product($cat_gender,$cat_name=FALSE,$cat_id=FALSE,$product_id=FALSE,$item=FALSE);			
			//redirect(current_url());
		}
	}*/
}
?>