<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_method extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('menu_model');	
		$this->load->model('controller_method_model');
	}

	function index()
	{
		$data = array(
			'data' => $this->controller_method_model->index(),
			'controller' => $this->db->get('t_controller')->result(),
			'method' => $this->db->get('t_method')->result()
		);

		$this->template->load('templet/index', 'controller_method/index', $data);
	}

	function add()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->is_ajax_request()) {
			$controller_id = $this->input->post('controller_id');
			$method_id = $this->input->post('method_id');

			foreach($controller_id as $key => $val){
				foreach($method_id as $k => $value){
					$data[] = array(
						'controller_id' => $val,
						'method_id' => $value
					);
				}
			}

			$form_config = array(
				array(
					'field' => 'controller_id[]', 
					'label' => 'Controller', 
					'rules' => 'trim|required',
					'errors' => array(
						'required' => '%s harus dipilih',
					),
				),
				array(
					'field' => 'method_id[]', 
					'label' => 'Method', 
					'rules' => 'trim|required',
					'errors' => array(
						'required' => '%s harus dipilih',
					),
				),				
			);
			
			$this->form_validation->set_rules($form_config);			
			if($this->form_validation->run() == TRUE){
				if($this->db->insert_batch('t_controller_method', $data)){
					echo json_encode(array('status' => 1, 'message' => 'Controller method berhasil disimpan!'));
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
				'controller_id' => $this->input->post('controller_id'),
				'method_id' => $this->input->post('method_id')
			);

			$form_config = array(
				array(
					'field' => 'controller_id', 
					'label' => 'Controller', 
					'rules' => 'trim|required',
					'errors' => array(
						'required' => '%s harus dipilih',
					),
				),
				array(
					'field' => 'method_id', 
					'label' => 'Method', 
					'rules' => 'trim|required',
					'errors' => array(
						'required' => '%s harus dipilih',
					),
				),				
			);
			
			$this->form_validation->set_rules($form_config);	

			if($this->form_validation->run() == TRUE){
				if($this->controller_method_model->update($data, $id)){
					echo json_encode(array('status' => 1, 'message' => 'Data berhasil di update!'));
				}else{
					echo json_encode(array('status'=> 0, 'message' => 'Data gagal di update!'));
				}
			}else{
				echo json_encode(array('status' => 0, 'message' => validation_errors() ));
			}
		}else{
			$result = $this->controller_method_model->get_by_id($id);

			echo json_encode($result);
		}
	}

	function delete()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->is_ajax_request()) {
			$id = $this->input->post('id');
			if ($this->controller_method_model->delete($id)) {
				echo json_encode(array('status' => 1, 'message' => 'Data berhasil dihapus!'));
			}else{
				echo json_encode(array('status' => 0, 'message' => 'Data gagal dihapus!'));
			}
		}
	}
}