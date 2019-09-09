<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pemasukan_model extends MY_Model {

	protected $_table = 't_pemasukan';
	protected $_primary = 'id';

	public function __construct()
	{
		parent::__construct();
		$this->_table = 't_pemasukan';
	}

	public function index()
	{
		$this->db->order_by('created_when', 'desc');

		return $this->db->get($this->_table)->result();			
    }
}