<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
	function __construct(){	
		parent::__construct();
		$this->load->database();
	}
	public function index() {
        $data = array('flash_messages' => isset($_SESSION['flash_messages']) ? $_SESSION['flash_messages'] : '');
		$this->load->view('login', $data);
	}

	public function cek_login() {
		$data = array('username' => $this->input->post('username', TRUE),
					  'password' => md5($this->input->post('password', TRUE)) , 
					  'active' => '1'
			);

		$this->load->model('user'); // load model_user
		$hasil = $this->user->cek_user($data);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['logged_in'] = true;
				$sess_data['id'] = $sess->id;
				$sess_data['nama'] = $sess->nama;
				$sess_data['username'] = $sess->username;
				$sess_data['active'] = $sess->active;
				$sess_data['jurusan_id'] = $sess->jurusan_id;
				$sess_data['role'] = $sess->role;
				$this->session->set_userdata($sess_data);
			}
			if ($this->session->userdata('active')==1) {
				redirect('Admin');
                die("here");
			}
		}

        $_SESSION['flash_messages'] = 'Username / Password Salah.';
        $this->session->mark_as_flash('flash_messages');
        redirect('Auth');
	}
	public function logout () {
		$sess_data['logged_in'] = false;
		$sess_data['id'] = "";
		$sess_data['nama'] = "";
		$sess_data['username'] = "";
		$sess_data['active'] = "";
		$this->session->set_userdata($sess_data);
		
        redirect('Auth');
	}

}

?>