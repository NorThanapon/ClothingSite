<?php
class Bfash_model extends CI_Model 
{
	function __construct() 
	{
        parent::__construct();
    }
	function init()
	{
		$this->load->model('brand_model');
		$this->load->model('product_model');
		$this->load->model('image_model');
		$this->load->model('category_model');
		
		// Check lang
		//language
		$this->load->model('language_model');
		if($this->language_model->is_empty())
		{
			$this->language_model->add('en');
		}
		$this->load->helper('language');  
		$this->lang->load('contentside', $this->language_model->get());
		$this->lang->load('header', $this->language_model->get());
		$this->lang->load('footer', $this->language_model->get());
		
		$data['lang'] = $this->language_model->get();
		
		
		// Check Authen
		if(check_authen('member',FALSE)) 
        {
			$data['sign_in_link'] = "authen/logout_member";
			$data['sign_in'] = $this->lang->line('Sign out');
			$data['title_sign'] = "Sign out";
			$data['join_link'] = "orderhistory";
			$data['title_join'] = "View order history";
			$data['join_name'] = $this->lang->line('Hello').$this->session->userdata('e_mail') ;
			$data['e_mail'] = $this->session->userdata('e_mail');
        }
		else
		{
			$data['sign_in_link'] = "authen/login_member";
			$data['sign_in'] = $this->lang->line('Sign in');
			$data['title_sign'] = "Sign in";
			$data['join_link'] = "member/registration";
			$data['title_join'] = "registration";
			$data['join_name'] = $this->lang->line('Join');
		}	
				
		//load number of cookie
		$value = $this->encrypt->decode($this->input->cookie('cart'));
		$detail = explode('&',$value);
		$amount = 0;
		for($i=0; $i<count($detail)-1; $i++){
				$item = explode(',',$detail[$i]);
				$amount += $item[1];
		}
		$data['cookie_amount'] = $amount;	
		
		//set common page
			$data['page_title'] = "Welcome to BfashShop.com";
			$data['brand_list'] = $this->brand_model->get_brand(); 
			$data['content_history'] ='common/content-history';
			$data['women_categories'] = $this->category_model->get_by_gender('WOMEN');
			$data['men_categories'] = $this->category_model->get_by_gender('MEN');
		//END set common
		
		return $data;
	
	}
}
?>