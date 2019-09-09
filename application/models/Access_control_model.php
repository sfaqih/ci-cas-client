<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Access_control_model extends MY_Model {
	protected $_table = 't_acl';
	protected $_primary = 'id';

	public function __construct()
	{
		parent::__construct();
		$this->_table = 't_acl';
	}

	function index()
	{
		$this->db->select('a.*, CONCAT(controller_name, " | ", method_name) AS con_tod, e.nama_peran');
		$this->db->from('t_acl a');
		$this->db->join('t_controller_method b', 'a.controller_method_id = b.id');
		$this->db->join('t_controller c', 'b.controller_id = c.id');
		$this->db->join('t_method d', 'b.method_id = d.id');
		$this->db->join('t_role e', 'a.role_id = e.id');
		$this->db->order_by('con_tod', 'ASC');
		return $this->db->get()->result();
	}
	function check_acl($params)
	{
		$this->db->select('a.*');
		$this->db->from($this->_table. ' a');
		$this->db->join('t_controller_method b', 'a.controller_method_id = b.id');
		$this->db->join('t_controller c', 'b.controller_id = c.id');
		$this->db->join('t_method d', 'b.method_id = d.id');
		foreach ($params as $field => $value) {
			$this->db->where($field, $value);
		}

		return $this->db->get()->row();
	}
}