<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Jurusan_Model extends CI_Model {
		public function isi_jurusan_home() {
			$data = array('profile.active' => '1');
			$this->db->select('jurusan.* , profile.isi as isi , profile.logo as image ');
			$this->db->join('profile', 'profile.jurusan_id = jurusan.id', 'left');
			$query = $this->db->get_where("jurusan" , $data);
			return $query->result();
		}
		public function list_jurusan() {
			$query = $this->db->query("select * from jurusan where active = '1'");
			return $query->result();
		}

		public function create_jurusan() {
			return array(
				'nama' => '' ,
			);
		}

		public function save($params) {
			$params['user_id'] = $this->session->userdata('id');
			$params['tanggal_buat'] = date('YmdHis');
			$params['tanggal_edit'] = date('YmdHis');
			$params['active'] = 1;
			$this->db->insert('jurusan', $params);
			return $params;
		}

		public function  update($params) {
			$params['tanggal_edit'] = date('YmdHis');
			$params['active'] = 1;

			$data = array(
				'nama' => $params['nama'],
				'tanggal_edit' =>$params['tanggal_edit'],
			);

			$this->db->where('id', $params['id']);
			$this->db->update('jurusan', $data);
			return $params;
		}

		public function  get($id) {
			$query = $this->db->get_where("jurusan" , array('id' => $id));
			return $query->row();
		}

		public function  delete($id) {
			$this->db->set('active', '0', FALSE);
			$this->db->set('tanggal_edit', date('YmdHis'),  FALSE);
			$this->db->where('id', $id );
			$this->db->update('jurusan');
			return $id;
		}
	}

	

?>