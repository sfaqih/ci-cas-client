<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends MY_Model {

	protected $_table = 't_users';
	protected $_primary = 'id';

	public function __construct()
	{
		parent::__construct();

		$this->_table = 't_users'; 		
	}

	function index()
	{
        $this->db->select('a.*, b.nama_peran');
        $this->db->from($this->_table. ' as a');
        $this->db->join('t_role b', 'a.level = b.id');        
        $this->db->order_by('id', 'ASC');
        
		$query = $this->db->get();

		return $query->result();
	}
}

/* End of file  */
/* Location: ./application/models/ */