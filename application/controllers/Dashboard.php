<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
			
	}

	public function index()
	{	
		$view = 'dashboard/index';

		$user = $this->cas->user();
		// print_r($user); die();

		$this->template->load('templet/index', $view);
	}
}