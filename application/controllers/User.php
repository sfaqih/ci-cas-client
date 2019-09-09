<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		
	}

	public function index()
	{
		$this->load->model('role_model');
		
		$data = array(
			'data' => $this->user_model->index(),
			'role' => $this->role_model->index()
		);

		$this->template->load('templet/index', 'user/index', $data);
	}

	public function login()
	{
		$uname = $this->input->post('email');
		$pw = $this->input->post('password');


		$this->form_validation->set_rules('email', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$this->auth->login($uname, $pw);
		} else {
			echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
		}
	}

    public function logout()
    {
        $this->cas->logout('https://localhost/phpcas/ci-cas/');
        redirect(site_url());
	}
	
	function add()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->is_ajax_request()) {
			
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$name = $this->input->post('name');
			$role = $this->input->post('role');
			$password = $this->input->post('password');

			$form_config = array(
				array(
					'field' => 'nama', 
					'label' => 'Nama Lengkap', 
					'rules' => 'trim|required',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
					),
				),
				array(
					'field' => 'email', 
					'label' => 'Email', 
					'rules' => 'trim|required|is_unique[t_users.email]',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
						'is_unique' => '%s tidak boleh sama'
					),
				),	
				array(
					'field' => 'name', 
					'label' => 'Username', 
					'rules' => 'trim|required|is_unique[t_users.username]',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
						'is_unique' => '%s tidak boleh sama'
					),
				),	
				array(
					'field' => 'role', 
					'label' => 'Role', 
					'rules' => 'trim|required',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
					),
				),	
				array(
					'field' => 'password', 
					'label' => 'Password', 
					'rules' => 'trim|required|min_length[5]',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
					),
				),												
			);

			$this->form_validation->set_rules($form_config);

			if ($this->form_validation->run() == TRUE) {
				
				$data = array(
					'nama' => $nama,
					'email' => $email,
					'username' => $name,
					'level' => $role,
					'password' => password_hash($password, PASSWORD_BCRYPT)
				);

				if($this->user_model->insert($data)){
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
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$name = $this->input->post('name');
			$role = $this->input->post('role');
			$password = $this->input->post('password');

			$form_config = array(
				array(
					'field' => 'nama', 
					'label' => 'Nama Lengkap', 
					'rules' => 'trim|required',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
					),
				),
				array(
					'field' => 'email', 
					'label' => 'Email', 
					'rules' => 'trim|required',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
					),
				),	
				array(
					'field' => 'name', 
					'label' => 'Username', 
					'rules' => 'trim|required',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
					),
				),	
				array(
					'field' => 'role', 
					'label' => 'Role', 
					'rules' => 'trim|required',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
					),
				),	
				array(
					'field' => 'password', 
					'label' => 'Password', 
					'rules' => 'trim|required|min_length[5]',
					'errors' => array(
						'required' => '%s tidak boleh kosong',
					),
				),												
			);

			$this->form_validation->set_rules($form_config);		

			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'nama' => $nama,
					'email' => $email,
					'username' => $name,
					'level' => $role,
					'password' => password_hash($password, PASSWORD_BCRYPT)
				);

				if($this->user_model->update($data, $id)){
					echo json_encode(array('status' => 1, 'message' => 'Data berhasil di update!'));
				}else{
					echo json_encode(array('status'=> 0, 'message' => 'Data gagal di update!'));
				}
			} else {
				echo json_encode(array('status' => 0, 'message' => validation_errors() ));
			}				
		}else{
			$result = $this->user_model->get_by_id($id);

			echo json_encode($result);
		}
	}

	function delete()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->is_ajax_request()) {
			$id = $this->input->post('id');

			if ($this->user_model->delete($id)) {
				echo json_encode(array('status' => 1, 'message' => 'User berhasil dihapus!'));
			}else{
				echo json_encode(array('status' => 0, 'message' => 'User gagal dihapus!'));
			}
		}
	}	
}
