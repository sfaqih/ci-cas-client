<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('menu_model');		
	}

	public function index()
	{
		$menu = $this->menu_model->index_menu();
		foreach ($menu as $key => $value) {
			$sub_menu[$key] = $this->menu_model->get_sub_by_menu($value->id);
		}
		$data = array(
			'menu' => $menu,
			'sub_menu' => $sub_menu,
		);

		$this->template->load('templet/index','menu/index', $data);
	}

	function get_menu()
	{
		$data = $this->menu_model->index_menu();

		echo json_encode(array('data' => $data));
	}

	function get_submenu()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$id = $this->input->post('id');

			$data = $this->menu_model->get_sub_by_menu(base64_decrypt($id));

			echo json_encode($data);
		}
	}

	function add()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->is_ajax_request()){
			$menu = $this->input->post('menu');
			$urut = $this->input->post('urut');
			$url = $this->input->post('url');
			$icon = $this->input->post('icon');

			$data = array(
				'menu' => $menu,
				'no_urut' => $urut,
				'url' => $url,
				'icon' => $icon
			);

			$form_config = array(
				array(
					'field' => 'menu', 
					'label' => 'Menu', 
					'rules' => 'trim|required|is_unique[t_menu.menu]',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
						'is_unique' => '%s tidak boleh sama'
					),
				),
				array(
					'field' => 'urut', 
					'label' => 'No. Urut', 
					'rules' => 'trim|required|is_unique[t_menu.no_urut]',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
						'is_unique' => '%s tidak boleh sama'
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
			);

			$this->form_validation->set_rules($form_config);

			if($this->form_validation->run() == TRUE){
				if($this->db->insert('t_menu', $data)){
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
			$menu = $this->input->post('menu');
			$urut = $this->input->post('urut');
			$url = $this->input->post('url');
			$icon = $this->input->post('icon');

			$data = array(
				'menu' => $menu,
				'no_urut' => $urut,
				'url' => $url,
				'icon' => $icon
			);

			$form_config = array(
				array(
					'field' => 'menu', 
					'label' => 'Menu', 
					'rules' => 'trim|required',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
						'is_unique' => '%s tidak boleh sama'
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
			);

			$this->form_validation->set_rules($form_config);

			if($this->form_validation->run() == TRUE){
				if($this->menu_model->update($data, $id)){
					echo json_encode(array('status' => 1, 'message' => 'Data berhasil disimpan!'));
				}else{
					echo json_encode(array('status' => 0, 'message' => 'Data gagal disimpan!'));
				}
			}else{
				echo json_encode(array('status' => 0, 'message' => validation_errors() ));
			}
		}else{
			$data = $this->menu_model->get_by_id($id);

			echo json_encode($data);
		}
	}

	function delete()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->is_ajax_request()) {
			$id = $this->input->post('id');
			if ($this->menu_model->delete($id)) {
				echo json_encode(array('status' => 1, 'message' => 'Data berhasil dihapus!'));
			}else{
				echo json_encode(array('status' => 0, 'message' => 'Data gagal dihapus!'));
			}
		}
	}
	
	function submenu_by_menu()
	{
		$this->load->model('sub_menu_model');
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->is_ajax_request()) {
			$id_menu = $this->input->post('menu');

			$data = $this->sub_menu_model->by_menu($id_menu);

			if(count($data) > 0){
				foreach ($data as $key => $value) {
					$select2[$key] = ['id' => $value->id, 'text' => $value->sub_menu];
				}
			}else{
				$select2 = [];
			}

			echo json_encode($select2);
		}else{
			block_access();
		}
	}
}

/* End of file  */
/* Location: ./application/controllers/ */