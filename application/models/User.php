<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class User extends CI_Model {

		public function cek_user($data) {
			$query = $this->db->get_where('users', $data);
			return $query;
		}
		public function list_user() {
			$data = array();
			$query = $this->db->get_where("users" , $data);
			return $query->result();
		}

		public function  create_model() {
			return array(
				'username' => '' ,
				'nama' => '' ,
				'jurusan' => '' ,
				'role' => '' ,
			);
		}

		public function  save($params) {
			$params['tanggal_buat'] = date('YmdHis');
			$params['tanggal_edit'] = date('YmdHis');
			$params['active'] = 1;
			$params['password'] = md5($params['password']);
			if($params['role'] == 'ROLE_ADMIN'){
				$params['jurusan'] = null;
			}
			$this->db->insert('users', $params);
			return $params;
		}
		public function  delete($params) {
			$this->db->set('active', '0', FALSE);
			$this->db->set('tanggal_edit', date('YmdHis'),  FALSE);
			$this->db->where('id', 2);
			$this->db->update('mytable');
			return $params;
		}

	}

?>