<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->casLogin = $this->cas->is_authenticated();
		
	}

	public function index()
	{
		if (!$this->auth->cek_login()) {
			$this->load->view('templet/login');
		}else{
			redirect(base_url().'dashboard');
		}		
		
	}

	public function login()
	{
		if (!$this->casLogin) {
			return $this->cas->force_auth();
		}
		
		redirect(base_url().'dashboard');
	}
}
