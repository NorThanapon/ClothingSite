<?php

class Brand extends CI_Controller {
    public function index() {
        $data['page_title'] = 'Admin: Brand Management';
	$this->load->view('brand/brand_list', $data);
    }
}

?>