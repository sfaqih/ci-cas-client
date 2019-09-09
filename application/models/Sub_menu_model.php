<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sub_menu_model extends MY_Model {
	protected $_table = 't_sub_menu';
	protected $_primary = 'id';

	public function __construct()
	{
		parent::__construct();
		$this->_table = 't_sub_menu';
	}

	function index()
	{
        $this->db->select('a.*, b.menu');
        $this->db->from($this->_table. ' as a');
        $this->db->join('t_menu b', 'a.id_menu = b.id');
        $this->db->order_by('menu', 'ASC');
        $this->db->order_by('no_urut', 'ASC');

		return $this->db->get()->result();
	}

	function by_menu($id_menu)
	{
		$this->db->where('id_menu', $id_menu);
		$this->db->order_by('no_urut', 'asc');

		return $this->db->get($this->_table)->result();
	}
}