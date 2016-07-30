<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Jurusan_Model extends CI_Model {

		public function list_jurusan() {
			$query = $this->db->query("select * from jurusan where active = '1'");
			return $query->result();
		}

		public function create_jurusan() {
			return array(
				'nama' => '' ,
				'user_id' => '' ,
			);
		}

		public function save($params) {
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
				'user_id ' => $params['user_id'],
			);

			$this->db->where('id', $params['id']);
			$this->db->update('jurusan', $data);
			return $params;
		}

		public function  get($id) {
			$query = $this->db->get_where("Jurusan" , array('id' => $id));
			return $query->row();
		}

		public function  delete($id) {
			$this->db->where('id', $id );
			$this->db->delete('kategori');
			return $params;
		}
	}

	

?>