<?php
class testLangauge extends CI_Controller 
{
	public function index() 
		{
			if($this->input->post('langauge'))  
			{  
				$language = $this->input->post('langauge') ;  
			}  
			else  
			{  
				$language = "english";  
			}  
			  
			// load language file  
			$this->load->helper('language');  
			$this->lang->load('codepursuit', $language);  			  
			$this->load->view('test');  
			
		}

}
?>