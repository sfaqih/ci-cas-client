<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tool_button_model extends MY_Model {

	protected $_table = 't_tool_button';
	protected $_primary = 'id';	

	public function __construct()
	{
		parent::__construct();
		$this->_table = 't_tool_button';
	}

	public function index()
	{
		$this->db->order_by('nama', 'ASC');

		return $this->db->get($this->_table)->result();			
	}
}

/* End of file  */
/* Location: ./application/models/ */