<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengeluaran_model extends MY_Model {

	protected $_table = 't_pengeluaran';
	protected $_primary = 'id';

	public function __construct()
	{
		parent::__construct();
		$this->_table = 't_pengeluaran';
	}

	public function index()
	{
		$this->db->order_by('created_when', 'desc');

		return $this->db->get($this->_table)->result();			
    }
}