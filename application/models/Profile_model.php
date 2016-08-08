<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Profile_model extends CI_Model {

		public function cek_profile($data) {
			$query = $this->db->get_where('profile', $data);
			return $query;
		}
		
		public function list_profile() {
			$this->db->join('users', 'users.id = profile.user_id');
			$query = $this->db->get("profile");
			return $query->result();
		}

		public function  create_model() {
			return array(
				'profile_type' => '' ,
				'jurusan_id' => '' ,
				'isi' => '' ,
				'tanggal_buat' => '' ,
				'tanggal_edit' => '' ,
				'tanggal_user_id' => ''
			);
		}

		public function save($params) {
			$params['profile_type'] = $params['profile_type'];
			$params['jurusan_id'] = $params['jurusan_id'];
			$params['isi'] = $params['isi'];
			$params['tanggal_buat'] = date('YmdHis');
			$params['tanggal_edit'] = date('YmdHis');
			$params['user_id'] = 1;

			$this->db->insert('profile', $params);
			return $params;
		}

		public function  update($params) {
			$params['tanggal_edit'] = date('YmdHis');
			$params['active'] = 1;

			$data = array(
				'username' => $params['username'],
				'tanggal_edit' =>$params['tanggal_edit'],
				'nama ' => $params['nama'],
				'role' => $params['role'],
				'jurusan_id' => $params['jurusan_id'],
			);
			if($params['role'] == 'ROLE_ADMIN'){
				$params['jurusan_id'] = null;
			}

			$this->db->where('id', $params['id']);
			$this->db->update('users', $data);
			return $params;
		}
		
		public function  delete($id) {
			$this->db->set('active', '0', FALSE);
			$this->db->set('tanggal_edit', date('YmdHis'),  FALSE);
			$this->db->where('id', $id );
			$this->db->update('users');
			return $params;
		}

		public function  get($id) {
			$query = $this->db->get_where("profile" , array('id' => $id));
			return $query->row();
		}


	}

?>