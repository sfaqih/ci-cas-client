<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Acl
{
	
	protected $controller;
	protected $method;
	protected $role;
	
	function __construct()
	{
		$this->ci =& get_instance();
		$this->config =& get_config();
	}
	
	function check_permission($vars)
	{
		$this->ci->load->model('access_control_model');
		$permissions = $this->ci->access_control_model->check_acl($vars);

		
		if($permissions == null)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	function fetch_id($param)
	{
		$this->ci->load->model('access_control_model');

		$result = $this->ci->access_control_model->check_acl($param);
		
		if ($result) {
			return $result->id;
		}else{
			return false;
		}
	}
}