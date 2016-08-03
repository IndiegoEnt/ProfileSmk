<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Berita_Model extends CI_Model {

		public function cek_user($data) {
			$query = $this->db->get_where('users', $data);
			return $query;
		}
		
		public function list_user() {
			$data = array('berita.active' => '1');
			$this->db->select('berita.* , jurusan.nama as nama_jurusan');
			$this->db->join('jurusan', 'jurusan.id = berita.jurusan_id', 'left');
			$query = $this->db->get_where("berita" , $data);
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

		public function  save($params , $file) {
			print_r($file);
			die("here");
			$params['tanggal_buat'] = date('YmdHis');
			$params['tanggal_edit'] = date('YmdHis');
			$params['active'] = 1;
			if($params['berita_type'] == 'BERITA_SEKOLAH '){
				$params['jurusan_id'] = null;
			}
            $this->db->insert('berita', $params);
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
			if($data['role'] == 'ROLE_ADMIN'){
				$data['jurusan_id'] = null;
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
			$query = $this->db->get_where("users" , array('id' => $id));
			return $query->row();
		}

		public function  check_username($id) {
			$query = $this->db->get_where("users" , array('username' => $id));
			return $query->row() ? '1' : '0';
		}

	}

?>