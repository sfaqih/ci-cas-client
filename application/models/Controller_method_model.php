<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controller_method_model extends MY_Model {
	protected $_table = 't_controller_method';
	protected $_primary = 'id';

	public function __construct()
	{
		parent::__construct();
		$this->_table = 't_controller_method';
	}

	function index()
	{
		$this->db->distinct();
		$this->db->select('a.id,b.controller_name, c.method_name, CONCAT(b.controller_name, " | ", c.method_name) AS con_tod');
		$this->db->from('t_controller_method a');
		$this->db->join('t_controller b', 'a.controller_id = b.id');
		$this->db->join('t_method c', 'a.method_id = c.id');
		$this->db->order_by('con_tod', 'ASC');
		return $this->db->get($this->_table)->result();
	}
}