
<?php
class Brand extends CI_Controller {
    public function index() {
        if(!check_authen('staff',TRUE)) {
            return;            
        }
        $this->load->model('brand_model');
        $data['page_title'] = 'Admin: Brand Management';
        $data['brand_list'] =  $this->brand_model->get_brand();
	$this->load->view('brand/brand_list', $data);
    }
    
    public function add_brand() {
        $this->load->view('brand/add_brand');
    }
}
?>