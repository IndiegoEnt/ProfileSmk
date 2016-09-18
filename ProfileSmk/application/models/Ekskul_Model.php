<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Ekskul_Model extends CI_Model {
		public function cek_user($data) {
			$query = $this->db->get_where('users', $data);
			return $query;
		}
		public function list_ekskul_home() {
			$data = array('ekskul');
			$this->db->select('ekskul.* , jurusan.nama as nama_jurusan');
			$this->db->join('jurusan', 'jurusan.id = ekskul.jurusan_id', 'left');
			$query = $this->db->get_where("ekskul" , $data);
			return $query->result();
		}

		public function list_ekskul() {
			$data = array('id');
			$query = $this->db->get_where("ekskul" , $data);
			return $query->result();
		}

		public function create_model() {
			return array(
				'ekskul_type' => '' ,
				'jurusan_id' => '' ,
				'nama' => '' ,
				'keterangan' => '' ,
			);
		}

		public function list_ekskul_by_jurusan ($jurusan_id) {
			$query = $this->db->get_where("ekskul" , array('jurusan_id' =>  $jurusan_id));
			return $query->result();
		}
		public function save($params) {
			//print_r($file);
			//die("here");
			$params['tanggal_buat'] = date('YmdHis');
			$params['tanggal_edit'] = date('YmdHis');
			$params['user_id'] = $this->session->userdata('id');
			//$params['active'] = 1;
			if($params['ekskul_type'] == 'Ekskul Sekolah'){
				$params['jurusan_id'] = null;
			}
            $this->db->insert('ekskul', $params);
			return $params;
		}

		public function  update($params , $ci) {

			
			$currentDate = date('YmdHis');
			$params['tanggal_edit'] = $currentDate;
			
			$data = array(
				'tanggal_edit' =>$params['tanggal_edit'],
				'nama' => $params['nama'],
				'keterangan' => $params['keterangan'],
				'ekskul_type' => $params['ekskul_type'],
				'jurusan_id' => $params['jurusan_id'],
			);
			if($data['ekskul_type'] == 'Ekskul Sekolah'){
				$data['jurusan_id'] = null;
			}
			$data['user_id'] = $this->session->userdata('id');
			
			$this->db->where('id', $params['id']);
			$this->db->update('ekskul', $data);
			return $params;
		}

		public function  delete($id) {
			$this->db->where('id', $id );
			$this->db->delete('ekskul');
			return $id;
		}

		public function  get($id) {
			$query = $this->db->get_where("ekskul" , array('id' => $id));
			return $query->row();
		}
	}