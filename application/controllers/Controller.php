<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('menu_model');	
		$this->load->model('controller_model');
	}

	function index()
	{
		$data = array(
			'data' => $this->controller_model->index()
		);

		$this->template->load('templet/index', 'controller/index', $data);
	}

	function add()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->is_ajax_request()) {
			$controller_name = $this->input->post('controller_name');
			$description = $this->input->post('description');

			$form_config = array(
				array(
					'field' => 'controller_name', 
					'label' => 'Nama Controller', 
					'rules' => 'trim|required|is_unique[t_controller.controller_name]',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
						'is_unique' => '%s tidak boleh sama'
					),
				),
			);

			$this->form_validation->set_rules($form_config);

			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'controller_name' => $controller_name,
					'description' => $description
				);

				if($this->controller_model->insert($data)){
					create_controller(ucfirst($controller_name));
					echo json_encode(array('status' => 1, 'message' => 'Data berhasil disimpan!'));
				}else{
					echo json_encode(array('status' => 0, 'message' => 'Data Gagal disimpan!'));
				}				
			} else {
				echo json_encode(array('status' => 0, 'message' => validation_errors() ));
			}
		}
	}

	function edit($id)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->is_ajax_request()) {
			$data = array(
				'controller_name' => $this->input->post('controller_name'),
				'description' => $this->input->post('description')
			);

			$form_config = array(
				array(
					'field' => 'controller_name', 
					'label' => 'Nama Controller', 
					'rules' => 'trim|required|is_unique[t_controller.controller_name]',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
						'is_unique' => '%s tidak boleh sama'
					),
				),
			);

			$this->form_validation->set_rules($form_config);			

			if ($this->form_validation->run() == TRUE) {
				if($this->controller_model->update($data, $id)){
					echo json_encode(array('status' => 1, 'message' => 'Data berhasil di update!'));
				}else{
					echo json_encode(array('status'=> 0, 'message' => 'Data gagal di update!'));
				}
			} else {
				echo json_encode(array('status' => 0, 'message' => validation_errors() ));
			}				
		}else{
			$result = $this->controller_model->get_by_id($id);

			echo json_encode($result);
		}
	}

	function delete()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->is_ajax_request()) {
			$id = $this->input->post('id');
			$result = $this->controller_model->get_by_id($id);
			$filename = APPPATH.'controllers/'.ucfirst($result->controller_name).'.php';

			if (file_exists($filename)) {
				unlink($filename);	
			}
			
			if ($this->controller_model->delete($id)) {
				echo json_encode(array('status' => 1, 'message' => 'Controller berhasil dihapus!'));
			}else{
				echo json_encode(array('status' => 0, 'message' => 'Controller gagal dihapus!'));
			}
		}
	}
}