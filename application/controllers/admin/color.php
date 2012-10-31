<?php
class Color extends CI_Controller 
{
    public function index() 
    {
        $this->load->model('color_model');
        $data["all_colors"] = $this->color_model->get();
        $data["colors"] = $data["all_colors"];
        $data["allow_manage_color"] = TRUE;
        $data["picker_control_name"] = "color";
        $data["picker_control_id"] = "ddl-color";
        $this->load->view("test",$data);
    }
    
    public function service_add() {
        if(!check_authen('staff',TRUE)) return;
        $this->load->model('color_model');
        $id = $this->color_model->get_latest()->color_id;
        $id++;
        $this->load->library('upload');
        $result = $this->_upload_color_file($id, 'file_name');
        $this->color_model->add($result['file_name']);
        echo json_encode($this->color_model->get_latest());
    }
    
    public function service_delete() {
        if(!check_authen('staff',TRUE)) return;
        $this->load->model('color_model');
        $color = $this->color_model->get($this->input->post('delete_color'));
        $this->color_model->delete($color->color_id, './assets/db/colors/'.$color->file_name);
        echo json_encode($color);
    }
    
    function _upload_color_file($color_id, $form_name) 
    {
        if (!empty($_FILES[$form_name]['name'])) 
        {
            $config['upload_path'] = './assets/db/colors/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2000';
            $config['overwrite'] = TRUE;
            $config['file_name'] = $color_id.'.'.substr(strrchr($_FILES[$form_name]['name'], '.'), 1);
            $this->upload->initialize($config);

            if ($this->upload->do_upload($form_name)) 
            {
                $config2['image_library'] = 'gd';
                $config2['source_image'] = './assets/db/colors/'.$config['file_name'];
                $config2['create_thumb'] = FALSE;
                $config2['maintain_ratio'] = FALSE;
                $config2['width']	 = 30;
                $config2['height']	= 30;
                $this->load->library('image_lib', $config2); 
                $this->image_lib->resize();
                return $this->upload->data();
            }
            return array('error' => $this->upload->display_errors());    
        }
        return FALSE;
    }
}
?>