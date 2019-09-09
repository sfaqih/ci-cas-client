<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Access_tool_button_model extends MY_Model {
	protected $_table = 't_access_tool';
	protected $_primary = 'id';

	public function __construct()
	{
		parent::__construct();
		$this->_table = 't_access_tool';
	}

	function index()
	{
        $this->db->select('a.*, CONCAT(controller_name, " | ", method_name, "|", nama_peran) AS access, b.nama');
        $this->db->from($this->_table. ' as a');
        $this->db->join('t_tool_button b', 'a.id_button = b.id');
        $this->db->join('t_acl c', 'a.id_acl = c.id');
        $this->db->join('t_role d', 'c.role_id = d.id', 'left');
        $this->db->join('t_controller_method e', 'c.controller_method_id = e.id');
        $this->db->join('t_controller f', 'e.controller_id = f.id');
        $this->db->join('t_method g', 'e.method_id = g.id');
        
		return $this->db->get()->result();
	}

	function get_by_acl($id_acl)
	{
		$this->db->select('nama, icon, attribut');
		$this->db->from($this->_table. ' as a');
		$this->db->join('t_tool_button b', 'a.id_button = b.id');
		$this->db->where('id_acl', $id_acl);
		$this->db->order_by('order', 'asc');
		

		return $this->db->get();		
	}
}