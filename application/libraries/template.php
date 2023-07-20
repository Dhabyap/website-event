<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class template {

    function load($content = '') {
        $CI =& get_instance();

		$data['head'] 	    = $CI->load->view('template/head');
		$data['navbar']     = $CI->load->view('template/navbar');
		$data['footer']     = $CI->load->view('template/footer');
        
        $data['content']    = $content;
		$CI->load->view('template/container', $data);
    }
    function admin($content = '', $send_data, $setting = "") {
        $CI =& get_instance();
        
        $data['header']     = $CI->load->view('template/admin/header', TRUE);
        $data['sidebar']    = $CI->load->view('template/admin/sidebar', $setting);
        $data['navbar']     = $CI->load->view('template/admin/navbar', $setting);
        $data['content']    = $CI->load->view($content,$send_data);
        $data['footer']     = $CI->load->view('template/admin/footer', TRUE);
		$CI->load->view('template/admin/container', $data);
    }


}
