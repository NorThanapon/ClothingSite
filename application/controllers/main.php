<?php
class Main extends CI_Controller {
    public function index() {
		
		$this->load->model('bfash_model');
		$data = $this->bfash_model->init();
		//set page history
		$this->session->set_userdata('redirect',current_url());
        $this->load->view('index',$data);
    }

	public function change_language() {
		if (!$this->input->post('lang'))
		{		
			index();
		}
		else
		{
			$this->load->model('language_model');
			$this->language_model->add($this->input->post('lang'));
			index();
		}
	}
}
?>