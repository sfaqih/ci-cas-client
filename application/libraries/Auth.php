<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');

class Auth {
 // SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
	 	$this->CI =& get_instance();
	}
 // Fungsi login
	public function login($username, $password) {

		$query = $this->CI->db->get_where('t_users',array('username'=>$username))->row();

		if($query) {
			if(password_verify($password, $query->password)){
		 		 $row = $this->CI->db->select('id.t_users')
		 		 					 ->from('t_users')
		 		 					 ->where('username', $username)
		 		 					 ->update('t_users', array('last_login'=>date('Y-m-d H:i:s')));
		 		 					 
				 $id = $query->id;
				 $sess = array('username' => $username, 'id_login' => uniqid(rand()), 'id' => $id, 'level' => $query->level);
				 $this->CI->session->set_userdata($sess);
				echo json_encode(array('msgType' => 'success', 'msgValue' => 'Berhasil Login :)'));
			}else{
				echo json_encode(array('msgType' => 'error', 'msgValue' => 'Password salah!'));
			}
		}else{
				echo json_encode(array('msgType' => 'error', 'msgValue' => 'Username tidak ditemukan!'));
		}
		
	 	return false;
	 }
 // Proteksi halaman
	public function cek_login() {
		 if($this->CI->session->has_userdata('username')) {
		 	return true;
		 }else{
		 	return false;
		 }
	}
	 // Fungsi logout
	public function logout() {
		 $this->CI->session->unset_userdata('username');
		 $this->CI->session->unset_userdata('id_login');
		 $this->CI->session->unset_userdata('id');
		 $this->CI->session->set_flashdata('sukses','Anda berhasil logout');
		 redirect(base_url());
	}

	public function set_session($data)
	{
		$this->CI->session->set_userdata($data);
	}

	public function get_session()
	{
		$id = $this->CI->session->userdata('id');
		$user = $this->CI->session->userdata('username');
		$id_login = $this->CI->session->userdata('id_login');
		$level = $this->CI->session->userdata('level');

		return array('id' => $id, 'username' => $user, 'id_login' => $id_login, 'level' => $level);
	}	

	public function get_role()
	{
		return $this->CI->session->userdata('level');
	}

	public function get_username()
	{
		return $this->CI->session->userdata('username');	
	}
} 

?>