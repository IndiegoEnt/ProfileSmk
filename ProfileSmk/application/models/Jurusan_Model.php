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
		public function detail_jurusan_home() {
			$data = array('jurusan.active' => '1 ');
			$this->db->select('jurusan.* , profile.isi as isi_profile , profile.logo as logo , ekskul.nama as nama_ekskul_jurusan , ekskul.keterangan as keterangan_ekskul_jurusan , berita.judul as judul , berita.isi as isi , berita.image as image');
			$this->db->join('profile', 'profile.jurusan_id = jurusan.id', 'left');
			$this->db->join('ekskul', 'ekskul.jurusan_id = jurusan.id', 'left');
			$this->db->join('berita', 'berita.jurusan_id = jurusan.id', 'left');
			$query = $this->db->get_where("jurusan" , $data);
			
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
			$this->load->model('Ekskul_Model');
			$this->db->select('jurusan.* , profile.isi as isi_profile , profile.logo as logo ');
			$this->db->join('profile', 'profile.jurusan_id = jurusan.id', 'left');
			$query = $this->db->get_where("jurusan" , array('jurusan.id' => $id , 'jurusan.active' => '1'));
			$data =  $query->row();
			$data->ekskul = $this->Ekskul_Model->list_ekskul_by_jurusan($data->id);
			$data->berita = $this->Berita_Model->list_berita_by_jurusan($data->id);
			return $data;
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