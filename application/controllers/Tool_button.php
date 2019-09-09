
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tool_button extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('tool_button_model');
	}

	public function index()
	{
		$data = array(
			'data' => $this->tool_button_model->index(),
		);

		$this->template->load('templet/index', 'tool_button/index', $data);
	}

	function add()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$nama = $this->input->post('nama');
			$icon = $this->input->post('icon');

			$form_config = array(
				array(
					'field' => 'nama', 
					'label' => 'Nama Tool Button', 
					'rules' => 'trim|required|is_unique[t_tool_button.nama]',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
						'is_unique' => '%s tidak boleh sama'
					),
				),
			);

			$this->form_validation->set_rules($form_config);

			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'nama' => $nama,
					'icon' => $icon
				);

				if($this->tool_button_model->insert($data)){
					echo json_encode(array('status' => 1, 'message' => 'Berhasil disimpan!'));
				}else{
					echo json_encode(array('status' => 0, 'message' => 'Gagal disimpan!'));
				}				
			} else {
				echo json_encode(array('status' => 0, 'message' => validation_errors() ));
			}
		}
	}

	function edit($id)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$data = array(
				'nama' => $this->input->post('nama'),
				'icon' => $this->input->post('icon'),
				'attribut' => $this->input->post('attribut')
			);

			$form_config = array(
				array(
					'field' => 'nama', 
					'label' => 'Nama Tool Button', 
					'rules' => 'trim|required',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
					),
				),
			);

			$this->form_validation->set_rules($form_config);			

			if ($this->form_validation->run() == TRUE) {
				if($this->tool_button_model->update($data, $id)){
					echo json_encode(array('status' => 1, 'message' => 'Data berhasil di update!'));
				}else{
					echo json_encode(array('status'=> 0, 'message' => 'Data gagal di update!'));
				}
			} else {
				echo json_encode(array('status' => 0, 'message' => validation_errors() ));
			}				
		}else{
			$result = $this->tool_button_model->get_by_id($id);

			echo json_encode($result);
		}
	}

	function delete()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$id = $this->input->post('id');

			$result = $this->tool_button_model->get_by_id($id);

			if ($this->tool_button_model->delete($id)) {
				echo json_encode(array('status' => 1, 'message' => 'Controller berhasil dihapus!'));
			}else{
				echo json_encode(array('status' => 0, 'message' => 'Controller gagal dihapus!'));
			}
		}
	}	
}
		