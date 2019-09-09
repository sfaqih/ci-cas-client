<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	protected $controller;
	protected $method;
	protected $isLogin;
	//public $kode_lsp = 'lsp029_';
	function __construct()
	{
		parent::__construct();
		
		$this->load->library('acl');
		$this->load->library('auth');
		$this->load->model('Access_menu_model');
		$this->load->model('Sub_menu_model');
		$this->load->model('access_tool_button_model', 'atb_model');
		  
		$data = array();

		$this->role = 2;
		$this->username = 'aing';		
		$this->casLogin = $this->cas->is_authenticated();
		
		/*tangkap nama controller class yang sedang diakses */
		$this->controller = $this->router->fetch_class();
		
		/* jika method kosong isi dengan index */
		$this->method = empty($this->router->fetch_method()) ? 'index' : $this->router->fetch_method();
		
		$data['controller_name'] = $this->controller;
		$data['method_name'] = $this->method;

		if ($this->auth->cek_login() || $this->casLogin) {
			$data['role_id'] = $this->role;	

			$this->menu = $this->Access_menu_model->menu_bar($this->role);

			foreach ($this->menu as $key => $value) {
				$this->sub_menu[$key] = $this->Sub_menu_model->by_menu($value->id);
			}
		}else{
			$data['role_id'] = 1;
		}
		
		if(!$this->casLogin)
		{
			block_access();
		}

		$this->id_acl = ($this->acl->fetch_id($data) ? $this->acl->fetch_id($data) : null);

		$this->button = $this->atb_model->get_by_acl($this->id_acl)->result_array();
	}
}