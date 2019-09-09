<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access_control extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('menu_model');	
		$this->load->model('access_control_model');
	}

	function index()
	{
		$this->load->model('role_model');
		$this->load->model('controller_method_model');

		$data = array(
			'data' => $this->access_control_model->index(),
			'controller_method' => $this->controller_method_model->index(),
			'role' => $this->role_model->index()
		);

		$this->template->load('templet/index', 'access_control/index', $data);
	}

	function add()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->is_ajax_request()) {
			$controller_method_id = $this->input->post('controller_method_id');
			$role_id = $this->input->post('role_id');

			foreach($controller_method_id as $key => $val){
				foreach($role_id as $k => $value){
					$data[] = array(
						'controller_method_id' => $val,
						'role_id' => $value
					);
				}
			}

			$form_config = array(
				array(
					'field' => 'controller_method_id[]', 
					'label' => 'Controller method', 
					'rules' => 'trim|required',
					'errors' => array(
						'required' => '%s harus dipilih',
					),
				),
				array(
					'field' => 'role_id[]', 
					'label' => 'Role', 
					'rules' => 'trim|required',
					'errors' => array(
						'required' => '%s harus dipilih',
					),
				),				
			);

			$this->form_validation->set_rules($form_config);			

			if($this->form_validation->run() == TRUE){
				if($this->db->insert_batch('t_acl', $data)){
					echo json_encode(array('status' => 1, 'message' => 'Access berhasil disimpan!'));
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
			$controller_method_id = $this->input->post('controller_method_id');
			$role_id = $this->input->post('role_id');

			$data = array(
				'controller_method_id' => $controller_method_id,
				'role_id' => $role_id
			);

			$form_config = array(
				array(
					'field' => 'controller_method_id', 
					'label' => 'Controller method', 
					'rules' => 'trim|required',
					'errors' => array(
						'required' => '%s harus dipilih',
					),
				),
				array(
					'field' => 'role_id', 
					'label' => 'Role', 
					'rules' => 'trim|required',
					'errors' => array(
						'required' => '%s harus dipilih',
					),
				),				
			);

			$this->form_validation->set_rules($form_config);				

			if($this->form_validation->run() == TRUE){
				if($this->access_control_model->update($data, $id)){
					echo json_encode(array('status' => 1, 'message' => 'Data berhasil di update!'));
				}else{
					echo json_encode(array('status'=> 0, 'message' => 'Data gagal di update!'));
				}				
			}else{
				echo json_encode(array('status' => 0, 'message' => validation_errors() ));
			}
		}else{
			$result = $this->access_control_model->get_by_id($id);

			echo json_encode($result);
		}
	}

	function delete()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->is_ajax_request()) {
			$id = $this->input->post('id');
			if ($this->access_control_model->delete($id)) {
				echo json_encode(array('status' => 1, 'message' => 'Data berhasil dihapus!'));
			}else{
				echo json_encode(array('status' => 0, 'message' => 'Data gagal dihapus!'));
			}
		}
	}
}