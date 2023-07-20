<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url('login');
            redirect($url);
        };
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('m_event_model');
    }
    public function index()
    {
        $send_data['test'] = 'yuhu';

        $content = 'back/event';
        $setting['active_event'] = 'bg-gradient-primary active';
        $setting['page'] = 'Event';
		$this->template->admin($content, $send_data, $setting);	
    }
    public function detail($id)
    {
        $send_data['details'] = $this->m_event_model->data_event($id);

        $content = 'back/detail_event';
        $setting['active_event'] = 'bg-gradient-primary active';
        $setting['page'] = 'Detail Event';
		$this->template->admin($content, $send_data, $setting);	
    }

    function table() 
    {
        return $this->m_event_model->table();
    }
    function peserta_table($id) 
    {
        return $this->m_event_model->peserta_table($id);
    }

    function create_event()
    {
        $data = $this->m_event_model->save_event();
        echo json_encode($data);
    }

    function data_event($id)
    {
        $data = $this->m_event_model->data_event($id);
        echo json_encode($data);
    }
    function data_detail_event($id)
    {
        $data = $this->m_event_model->data_detail_event($id);
        echo json_encode($data);
    }

    function delete_event($id)
    {
        $data = $this->m_event_model->delete_event($id);
        echo json_encode($data);
    }
    function delete_detail_event($id)
    {
        $data = $this->m_event_model->delete_detail_event($id);
        echo json_encode($data);
    }

    function add_event_peserta()
    {
        $data = $this->m_event_model->add_event_peserta();
        echo json_encode($data);
    }
}