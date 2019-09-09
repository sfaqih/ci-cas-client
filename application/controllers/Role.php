<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role extends MY_Controller
{
    public function __construct()
    {
    	parent::__construct();
    	$this->load->model('role_model');
        $this->load->model('menu_model');
    }

    public function index()
    {
    	$data = array(
            'menu' => $this->menu_model->index_menu(),
    		'data' => $this->role_model->index()
    	);

    	$this->template->load('templet/index','role/index', $data);
    }

    function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->is_ajax_request()) {
            $nama_peran = $this->input->post('nama_peran');
            $keterangan = $this->input->post('keterangan');

            $data = array(
                'nama_peran' => $nama_peran,
                'keterangan' => $keterangan
            );

			$form_config = array(
				array(
					'field' => 'nama_peran', 
					'label' => 'Role', 
					'rules' => 'trim|required|is_unique[t_role.nama_peran]',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
						'is_unique' => '%s tidak boleh sama'
					),
				),
			);

            $this->form_validation->set_rules($form_config);
                        
            if($this->form_validation->run() == TRUE){
                if($this->db->insert('t_role', $data)){
                    echo json_encode(array('status' => 1, 'message' => 'Role method berhasil disimpan!'));
                }else{
                    echo json_encode(array('status' => 0, 'message' => 'Gagal disimpan!'));
                }
            }else{
                echo json_encode(array('status' => 0, 'message' => validation_errors() ));
            }
        }
    }

    function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->is_ajax_request()) {
            $data = array(
                'nama_peran' => $this->input->post('nama_peran'),
                'keterangan' => $this->input->post('keterangan')
            );

			$form_config = array(
				array(
					'field' => 'nama_peran', 
					'label' => 'Role', 
					'rules' => 'trim|required|is_unique[t_role.nama_peran]',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
						'is_unique' => '%s tidak boleh sama'
					),
				),
            );
            
            $this->form_validation->set_rules($form_config);

            if($this->form_validation->run() == TRUE){
                if($this->role_model->update($data, $id)){
                    echo json_encode(array('status' => 1, 'message' => 'Data berhasil di update!'));
                }else{
                    echo json_encode(array('status'=> 0, 'message' => 'Data gagal di update!'));
                }
            }else{
                echo json_encode(array('status' => 0, 'message' => validation_errors() ));
            }
        }else{
            $result = $this->role_model->get_by_id($id);

            echo json_encode($result);
        }
    }

    function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->is_ajax_request()) {
            $id = $this->input->post('id');
            if ($this->role_model->delete($id)) {
                echo json_encode(array('status' => 1, 'message' => 'Data berhasil dihapus!'));
            }else{
                echo json_encode(array('status' => 0, 'message' => 'Data gagal dihapus!'));
            }
        }
    }    
}