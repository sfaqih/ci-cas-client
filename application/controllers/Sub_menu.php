<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sub_menu extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('sub_menu_model');		
	}

	public function index()
	{
		$this->load->model('menu_model');

		$data = array(
			'data' => $this->sub_menu_model->index(),
			'menu' => $this->menu_model->index_menu()
		);

		$this->template->load('templet/index','sub_menu/index', $data);
	}

	function add()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->is_ajax_request()){
			$sub_menu = $this->input->post('sub_menu');
			$urut = $this->input->post('urut');
			$url = $this->input->post('url');
			$id_menu = $this->input->post('id_menu');

			$data = array(
				'sub_menu' => $sub_menu,
				'no_urut' => $urut,
				'url' => $url,
				'id_menu' => $id_menu,
			);

			$form_config = array(
				array(
					'field' => 'sub_menu', 
					'label' => 'Sub Menu', 
					'rules' => 'trim|required|is_unique[t_sub_menu.sub_menu]',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
						'is_unique' => '%s tidak boleh sama'
					),
				),
				array(
					'field' => 'urut', 
					'label' => 'No. Urut', 
					'rules' => 'trim|required',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
					),
				),
				array(
					'field' => 'url', 
					'label' => 'Url', 
					'rules' => 'trim|required',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
					),
				),	
				array(
					'field' => 'id_menu', 
					'label' => 'Header Menu', 
					'rules' => 'trim|required',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
					),
				),																	
			);

			$this->form_validation->set_rules($form_config);

			if($this->form_validation->run() == TRUE){
				if($this->db->insert('t_sub_menu', $data)){
					echo json_encode(array('status' => 1, 'message' => 'Data berhasil disimpan!'));
				}else{
					echo json_encode(array('status' => 0, 'message' => 'Data gagal disimpan!'));
				}
			}else{
				echo json_encode(array('status' => 0, 'message' => validation_errors() ));
			}
		}else{
			block_access();
		}
	}

	function edit($id)
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->is_ajax_request()){
			$sub_menu = $this->input->post('sub_menu');
			$urut = $this->input->post('urut');
			$url = $this->input->post('url');
			$id_menu = $this->input->post('id_menu');

			$data = array(
				'sub_menu' => $sub_menu,
				'no_urut' => $urut,
				'url' => $url,
				'id_menu' => $id_menu,
			);

			$form_config = array(
				array(
					'field' => 'sub_menu', 
					'label' => 'Sub Menu', 
					'rules' => 'trim|required',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
					),
				),
				array(
					'field' => 'urut', 
					'label' => 'No. Urut', 
					'rules' => 'trim|required',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
					),
				),
				array(
					'field' => 'url', 
					'label' => 'Url', 
					'rules' => 'trim|required',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
					),
				),	
				array(
					'field' => 'id_menu', 
					'label' => 'Header Menu', 
					'rules' => 'trim|required',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
					),
				),																	
			);

			$this->form_validation->set_rules($form_config);

			if($this->form_validation->run() == TRUE){
				if($this->sub_menu_model->update($data, $id)){
					echo json_encode(array('status' => 1, 'message' => 'Data berhasil disimpan!'));
				}else{
					echo json_encode(array('status' => 0, 'message' => 'Data gagal disimpan!'));
				}
			}else{
				echo json_encode(array('status' => 0, 'message' => validation_errors() ));
			}
		}else{
			$data = $this->sub_menu_model->get_by_id($id);

			echo json_encode($data);
		}
	}

	function delete()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->is_ajax_request()) {
			$id = $this->input->post('id');
			if ($this->sub_menu_model->delete($id)) {
				echo json_encode(array('status' => 1, 'message' => 'Data berhasil dihapus!'));
			}else{
				echo json_encode(array('status' => 0, 'message' => 'Data gagal dihapus!'));
			}
		}
	}	
}

/* End of file  */
/* Location: ./application/controllers/ */