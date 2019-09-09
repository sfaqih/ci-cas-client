<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access_menu extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('access_menu_model');	
	}

	function index()
	{
		$this->load->model('menu_model');
		$this->load->model('role_model');
		$this->load->model('sub_menu_model');
		
		$data = array(
			'data' => $this->access_menu_model->index(),
			'menu' => $this->menu_model->index_menu(),
			'role' => $this->role_model->index(),
			'sub_menu' => $this->sub_menu_model->index()
		);

		$this->template->load('templet/index', 'access_menu/index', $data);
	}

	function add()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->is_ajax_request()) {
			$role = $this->input->post('role');
			$menu = $this->input->post('menu');
			$sub_menu = $this->input->post('submenu');

			$form_config = array(
				array(
					'field' => 'role[]', 
					'label' => 'Role', 
					'rules' => 'trim|required',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
					),
				),
				array(
					'field' => 'menu', 
					'label' => 'Menu', 
					'rules' => 'trim|required',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
					),
				)								
			);

			if (isset($sub_menu) && count($sub_menu) > 0) {
				foreach ($role as $key => $value) {
					foreach ($sub_menu as $k => $val) {
						$data[] = array(
							'id_role' => $value,
							'id_menu' => $menu,
							'id_sub_menu' => $val
						);
					}
				}				
			}else{
				foreach ($role as $key => $value) {
					$data[] = array(
						'id_role' => $value,
						'id_menu' => $menu
					);
				}
			}

			$this->form_validation->set_rules($form_config);

			if ($this->form_validation->run() == TRUE) {
				if($this->access_menu_model->insert_batch($data)){
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
				'id_role' => $this->input->post('role'),
				'id_menu' => $this->input->post('menu'),
				'id_sub_menu' => $this->input->post('submenu')
			);

			$form_config = array(
				array(
					'field' => 'role', 
					'label' => 'Role', 
					'rules' => 'trim|required',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
					),
				),
				array(
					'field' => 'menu', 
					'label' => 'Menu', 
					'rules' => 'trim|required',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
					),
				),
				array(
					'field' => 'submenu', 
					'label' => 'Sub Menu', 
					'rules' => 'trim|required',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
					),
				),								
			);

			$this->form_validation->set_rules($form_config);			

			if ($this->form_validation->run() == TRUE) {
				if($this->access_menu_model->update($data, $id)){
					echo json_encode(array('status' => 1, 'message' => 'Data berhasil di update!'));
				}else{
					echo json_encode(array('status'=> 0, 'message' => 'Data gagal di update!'));
				}
			} else {
				echo json_encode(array('status' => 0, 'message' => validation_errors() ));
			}				
		}else{
			$result = $this->access_menu_model->get_by_id($id);

			echo json_encode($result);
		}
	}

	function delete()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->is_ajax_request()) {
			$id = $this->input->post('id');
			$result = $this->access_menu_model->get_by_id($id);
			$filename = APPPATH.'controllers/'.ucfirst($result->controller_name).'.php';

			if (file_exists($filename)) {
				unlink($filename);	
			}
			
			if ($this->access_menu_model->delete($id)) {
				echo json_encode(array('status' => 1, 'message' => 'Controller berhasil dihapus!'));
			}else{
				echo json_encode(array('status' => 0, 'message' => 'Controller gagal dihapus!'));
			}
		}
	}
}