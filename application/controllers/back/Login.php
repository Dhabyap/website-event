<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url('login');
            redirect($url);
        };
    }
    public function index()
    {
        $send_data['test'] = 'yuhu';
        $content = 'back/dashboard';
        $setting['active_dashboard'] = 'bg-gradient-primary active';
        $setting['page'] = 'Dashboard';
		$this->template->admin($content, $send_data, $setting);	
    }
}