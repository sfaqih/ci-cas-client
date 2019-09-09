<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controller_model extends MY_Model {
	protected $_table = 't_controller';
	protected $_primary = 'id';

	public function __construct()
	{
		parent::__construct();
		$this->_table = 't_controller';
	}

	function index()
	{
		return $this->db->get($this->_table)->result();
	}

}