<?php

class Language_model extends CI_Model 
{	
	function __construct() 
	{
        parent::__construct();
    }
	
	function add($lang)
	{
		$this->session->set_userdata('language',$lang);
	}
	
	function get()
	{
		return $this->session->userdata('language');
	}	
	
	function is_empty()
	{
		if(!$this->session->userdata('language'))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>