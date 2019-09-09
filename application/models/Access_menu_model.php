<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Access_menu_model extends MY_Model {
	protected $_table = 't_access_menu';
	protected $_primary = 'id';

	public function __construct()
	{
		parent::__construct();
		$this->_table = 't_access_menu';
	}

	function index()
	{
		$this->db->select('a.*, b.menu, c.sub_menu, d.nama_peran');
		
        $this->db->from($this->_table. ' as a');
        $this->db->join('t_menu b', 'a.id_menu = b.id');
        $this->db->join('t_sub_menu c', 'a.id_sub_menu = c.id');
        $this->db->join('t_role d', 'a.id_role = d.id');
        $this->db->order_by('nama_peran', 'asc');

		return $this->db->get()->result();
	}

	public function menu_bar($level)
	{
		$this->db->from($this->_table. ' as a');
		$this->db->join('t_menu b', 'a.id_menu = b.id');
		$this->db->where('id_role', $level);
		$this->db->order_by('no_urut', 'ASC');
		$this->db->group_by('id_menu');
		
		$query = $this->db->get();

		return $query->result();
	}
}