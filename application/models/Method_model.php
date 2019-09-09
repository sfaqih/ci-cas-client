<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Method_model extends MY_Model {
	protected $_table = 't_method';
	protected $_primary = 'id';

	public function __construct()
	{
		parent::__construct();
		$this->_table = 't_method';
	}

	function index()
	{
		return $this->db->get($this->_table)->result();
	}

	// function update($id, $data)
	// {
	// 	$this->db->where('id', $id);
	// }
}