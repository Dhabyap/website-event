<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{
	public function index()
	{
		$data = '';
		$content['content'] = $this->load->view('front/index', $data);
		$this->template->load($content);	
	}
}