<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth_model');
        
    }
    public function login()
    {
        $data = array();
        $this->load->view('back/auth/login', $data);
    }
    public function register()
    {
        $data = array();
        $this->load->view('back/auth/register', $data);
    }

    function submit_register(){

        $data = $this->M_auth_model->save_register();
        echo json_encode($data);
    }

    function auth()
    {
        $data = $this->M_auth_model->check_auth();
        echo json_encode($data);
    }

    function logout(){
        $this->session->sess_destroy();
        $url=base_url('login');
        redirect($url);
    }
}