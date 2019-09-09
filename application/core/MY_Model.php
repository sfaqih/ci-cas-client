<?php
class MY_Model extends CI_Model
{
    protected $_table;
    protected $_primary;
    public $_database;

    public function __construct()
    {
        parent::__construct();
    }

    function insert($data)
    {
        $result = $this->db->insert($this->_table, $data);

        if ($result) {
            return true;
        }else{
            return false;
        }
    }

    function update($data, $id)
    {
        $this->db->where($this->_primary, $id);
        $result = $this->db->update($this->_table, $data);

        if($result){
            return true;
        }else{
            return false;
        }
    }

    function delete($id)
    {
        $this->db->where($this->_primary, $id);           
        $result = $this->db->delete($this->_table);

        if ($result) {
            return true;
        }else{
            return false;
        }
    } 

    function insert_batch($data)
    {
        if (is_array($data)) {
            $result = $this->db->insert_batch($this->_table, $data);
            
            if ($result) {
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    function get_by_id($id)
    {
        $this->db->where($this->_primary, $id);
        $result = $this->db->get($this->_table);

        return $result->row();
    }  
}