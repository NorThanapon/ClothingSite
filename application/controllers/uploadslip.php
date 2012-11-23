<?php
class UploadSlip extends CI_Controller {
	public function index() 
	{
		$data['page_title'] = 'Upload Slip | BfashShop';
		$data['error'] = "No";    
		$data['order_id']=$this->input->post('order_id');;
		$data['page'] = 'Payment/upload-slip';
        $this->load->view('sub_page',$data);
	}
	function _upload_photo_file($photo_id, $form_name) 
    {
		
        if (!empty($_FILES[$form_name]['name'])) 
        {
		
            $config['upload_path'] = './assets/db/payment/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2000';				
            $config['overwrite'] = TRUE;		
            $config['file_name'] = $photo_id.'_'.$form_name.'.'.substr(strrchr($_FILES[$form_name]['name'], '.'), 1);
			
					
            $this->upload->initialize($config);
			if ($this->upload->do_upload($form_name)) 
            {	
							
				return $this->upload->data();	
				
            }
			
        }
		
		//echo "--No-------------";//----------------------------------------------------------------------------------------
        return FALSE;
    }
	public function upload()
	{
		$data['page_title'] = 'Upload Slip | BfashShop';
		$this->load->library('upload');
		if(empty($_FILES['slip']['name']))
		{
			
			$this->load->library('form_validation');
			$data['error_message'] = 'Please select image.';
			$data['order_id'] = $this->input->post('order_id');
			$data['page'] = 'Payment/upload-slip';
			$this->load->view('sub_page',$data);			
			return;
		}
		$this->load->model('order_model');
		$slip_id = $this->order_model->get_latest()->order_id;
		$slip_id++;		
		
        $result_slip = $this->_upload_photo_file($slip_id,'slip');	
		
		$this->order_model->up_slip($result_slip['file_name']);
		$data['order_id']=$this->input->post('order_id');
		$data['page'] = 'Payment/upload-slip';
		$this->load->view('sub_page',$data);	
	}
}
?>