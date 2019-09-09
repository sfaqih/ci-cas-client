<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends MY_Model {

	protected $_table = 't_menu';
	protected $_primary = 'id';

	public function __construct()
	{
		parent::__construct();
		$this->_table = 't_menu';
	}

	public function index_menu()
	{
		$this->db->order_by('no_urut', 'ASC');

		return $this->db->get($this->_table)->result();			
	}

	public function get_sub_by_menu($id_menu)
	{
		$this->db->where('id_menu', $id_menu);
		// $this->db->where('id_role', $level);
		$this->db->order_by('no_urut', 'ASC');
		$query = $this->db->get('t_sub_menu');

		return $query->result();		
	}
}

/* End of file  */
/* Location: ./application/models/ */