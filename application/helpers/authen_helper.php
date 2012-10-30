<?php
if (!function_exists('check_authen')) {   
    function check_authen($role, $is_redirect) {
        $CI =& get_instance();
        $CI->load->library('encrypt');
        if($CI->session->userdata('logged_in') && $CI->session->userdata('role') == $role) {
            return true;
        }
		// check member
		else if($CI->session->userdata('logged_in') && $CI->session->userdata('role_mrmber') == $role) {
            return true;
        }
		//======================================================
        else if( $CI->encrypt->decode($CI->input->cookie('username'))
                &&  $CI->encrypt->decode($CI->input->cookie('role'))==$role){
            $data = array(
               'username'   => $CI->input->cookie('username'),
               'logged_in'  => TRUE,
               'role'       => $CI->input->cookie('role')
            );
            $CI->session->set_userdata($data);
            return true;
        }
		// for set member cookie
		else if( $CI->encrypt->decode($CI->input->cookie('e_mail'))
                &&  $CI->encrypt->decode($CI->input->cookie('role_member'))==$role){
            $data = array(
               'e_mail'   => $CI->input->cookie('username'),
               'logged_in'  => TRUE,
               'role_member'       => $CI->input->cookie('role')
            );
            $CI->session->set_userdata($data);
            return true;
        }
		// for set member cookie
        else if($is_redirect){
            $CI->session->set_flashdata('redirect_url', current_url());
			//=========================================================
			if($role=="member")//for $role = member
			{
				//redirect('', 'refresh');
			}
			else if($role=="staff")
			{
			//========================================================= (P' nor coding)
				redirect('authen/login_'.$role, 'refresh');
			//========================================================= (P' nor coding)
			}
			
            
        }
        else {
            return false;
        }
    }
}
?>