<?php
if (!function_exists('convert_url')) {   
    function convert_url($url) {
        return str_replace(' ', '_',$url);
    }
}
if (!function_exists('revert_url')) {   
    function revert_url($url) {
        return str_replace('_', ' ',$url);
    }
}
?>