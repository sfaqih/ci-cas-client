<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Method extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('menu_model');
		$this->load->model('method_model');	
	}

	function index()
	{
		$data = array(
			'menu' => $this->menu_model->index_menu(),
		);

		$data['data'] = $this->method_model->index();

		$this->template->load('templet/index', 'method/index', $data);
	}

	function add()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->is_ajax_request()) {
			$method_name = $this->input->post('method_name');

			$form_config = array(
				array(
					'field' => 'method_name', 
					'label' => 'Nama Method', 
					'rules' => 'trim|required|is_unique[t_method.method_name]',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
						'is_unique' => '%s tidak boleh sama'
					),
				),
			);			

			$data = array(
				'method_name' => $method_name,
			);

			$this->form_validation->set_rules($form_config);

			if($this->form_validation->run() == TRUE){
				if($this->db->insert('t_method', $data)){
					echo json_encode(array('status' => 1, 'message' => 'Method berhasil disimpan!'));
				}else{
					echo json_encode(array('status' => 0, 'message' => 'Gagal disimpan!'));
				}
			}else{
				echo json_encode(array('status' => 0, 'message' => validation_errors() ));
			}
		}
	}

	function edit($id){
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->is_ajax_request()) {
			$data = array(
				'method_name' => $this->input->post('method_name'),
			);

			$form_config = array(
				array(
					'field' => 'method_name', 
					'label' => 'Nama Method', 
					'rules' => 'trim|required|is_unique[t_method.method_name]',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
						'is_unique' => '%s tidak boleh sama'
					),
				),
			);

			$this->form_validation->set_rules($form_config);			

			if($this->form_validation->run() == TRUE){
				if($this->method_model->update($data, $id)){
					echo json_encode(array('status' => 1, 'message' => 'Data berhasil di update!'));
				}else{
					echo json_encode(array('status'=> 0, 'message' => 'Data gagal di update!'));
				}
			}else{
				echo json_encode(array('status' => 0, 'message' => validation_errors() ));
			}
		}else{
			$result = $this->method_model->get_by_id($id);

			echo json_encode($result);
		}
	}

	function delete()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->is_ajax_request()) {
			$id = $this->input->post('id');
			if ($this->method_model->delete($id)) {
				echo json_encode(array('status' => 1, 'message' => 'Method berhasil dihapus!'));
			}else{
				echo json_encode(array('status' => 0, 'message' => 'Method gagal dihapus!'));
			}
		}
	}	
}