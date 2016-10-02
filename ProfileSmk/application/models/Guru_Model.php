<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Guru_Model extends CI_Model {

		
		public function list_guru() {
			$data = array('guru.active' => '1');
			$this->db->select('guru.*');
			$query = $this->db->get_where("guru" , $data);
			return $query->result();
		}
		public function  check_nip($id) {
			$query = $this->db->get_where("guru" , array('nip' => $id));
			return $query->row() ? '1' : '0';
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
			$params['nip'] = ($params['nip']);
			$params['nama'] = ($params['nama']);
			$params['pelajaran'] = ($params['pelajaran']);
			$params['jabatan'] = ($params['jabatan']);
			$this->db->insert('guru', $params);
			return $params;
		}

		public function  update($params) {
			$params['tanggal_edit'] = date('YmdHis');
			$params['active'] = 1;

			$data = array(
				'nip' => $params['nip'],
				'nama' => $params['nama'],
				'pelajaran' =>$params['pelajaran'],
				'jabatan' => $params['jabatan']
			);
			$this->db->where('id', $params['id']);
			$this->db->update('guru', $data);
			return $params;
		}
		
		public function  delete($id) {
			$this->db->set('active', '0', FALSE);
			$this->db->set('tanggal_edit', date('YmdHis'),  FALSE);
			$this->db->where('id', $id );
			$this->db->update('guru');
			return $id;
		}

		public function  get($id) {
			$query = $this->db->get_where("guru" , array('id' => $id));
			return $query->row();
		}

	

	}

?>