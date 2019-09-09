<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role_model extends MY_Model {

	protected $_table = 't_role';
	protected $_primary = 'id';

	public function __construct()
	{
		parent::__construct();

		$this->_table = 't_role'; 		
	}

	function index()
	{
		$this->db->order_by('id', 'ASC');
		$query = $this->db->get($this->_table);

		return $query->result();
	}
}

/* End of file  */
/* Location: ./application/models/ */