<?php
if (!function_exists('check_authen')) {   
    function check_authen($role, $is_redirect) {
        $CI =& get_instance();
        if($CI->session->userdata('logged_in') && $CI->session->userdata('role') == $role) {
            return true;
        }
        else if($is_redirect){
            $CI->session->set_flashdata('redirect_url', current_url());
            redirect('authen/login_'.$role, 'refresh');
        }
        else {
            return false;
        }
    }
}
?>