<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Access_tool_button extends MY_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->model('access_tool_button_model', 'atb_model');
		
	}

	public function index()
	{
		$this->load->model('access_control_model', 'acl_model');
		$this->load->model('tool_button_model', 'tb_model');
		
		
		$data = array(
			'data' => $this->atb_model->index(),
			'acl' => $this->acl_model->index(),
			'tool_button' => $this->tb_model->index()
		);

		$this->template->load('templet/index', 'atb/index', $data);
	}

	function add()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$id_acl = $this->input->post('acl');
			$id_button = $this->input->post('tool_button');
			$order = $this->input->post('order');

			$form_config = array(
				array(
					'field' => 'acl', 
					'label' => 'Access Control', 
					'rules' => 'required',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
					),
				),
				array(
					'field' => 'tool_button', 
					'label' => 'Tool Buton', 
					'rules' => 'required',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
					),
				),				
			);

			$this->form_validation->set_rules($form_config);

			if ($this->form_validation->run() == TRUE) {
						$data = array(
							'id_acl' => $id_acl,
							'id_button' => $id_button,
							'order' => $order
						);
				if($this->atb_model->insert( $data )){
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
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$id_acl = $this->input->post('acl');
			$id_button = $this->input->post('tool_button');
			$order = $this->input->post('order');

			$data = array(
				'id_acl' => $id_acl,
				'id_button' => $id_button,
				'order' => $order
			);

			$form_config = array(
				array(
					'field' => 'acl', 
					'label' => 'Access Control', 
					'rules' => 'required',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
					),
				),
				array(
					'field' => 'tool_button', 
					'label' => 'Tool Buton', 
					'rules' => 'required',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
					),
				),				
			);

			$this->form_validation->set_rules($form_config);			

			if ($this->form_validation->run() == FALSE) {
				if($this->atb_model->update($data, $id)){
					echo json_encode(array('status' => 1, 'message' => 'Data berhasil di update!'));
				}else{
					echo json_encode(array('status'=> 0, 'message' => 'Data gagal di update!'));
				}
			} else {
				echo json_encode(array('status' => 0, 'message' => validation_errors() ));
			}				
		}else{
			$result = $this->atb_model->get_by_id($id);

			echo json_encode($result);
		}
	}

	function delete()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$id = $this->input->post('id');
			
			if ($this->atb_model->delete($id)) {
				echo json_encode(array('status' => 1, 'message' => 'Data berhasil dihapus!'));
			}else{
				echo json_encode(array('status' => 0, 'message' => 'Data gagal dihapus!'));
			}
		}
	}	
}
