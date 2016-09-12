<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Agenda_Model extends CI_Model {

		public function cek_user($data) {
			$query = $this->db->get_where('users', $data);
			return $query;
		}

		public function list_agenda() {
			$data = array('active' => '1');
			$query = $this->db->get_where("agenda" , $data);
			return $query->result();
		}

		
		public function  create_model() {
			return array(
				'nama' => '' ,
				'keterangan' => '' ,
				'tanggal' => '' ,
			);
		}

		public function  save($params) {
			$params['nama'] = ($params['nama']);
			$params['keterangan'] = ($params['keterangan']);
			$params['tanggal'] = ($params['tanggal']);
			$params['active'] = '1';
			$this->db->insert('agenda', $params);
			return $this->db->insert_id();
		}

		
		public function  update($params) {
			$data = array(
				'nama' => $params['nama'],
				'keterangan' =>$params['keterangan'],
				'tanggal' =>$params['tanggal'],
			);
			$this->db->where('id', $params['id']);
			$this->db->update('agenda', $data);
			return $params;
		}

		

		/*
		public function  get_by_name($nama) {
			$query = $this->db->query("select * from agenda where UPPER(nama) = '".$nama."'");
			return $query->row();
		}
		public function list_jurusan_by_berita_id($id){
			$query = $this->db->query("select * from kategori join kategori_berita on kategori.id = kategori_berita.kategori_id where kategori_berita.berita_id = '".$id."'");
			return $query->result();
		}
		*/

		public function  get($id) {
			$query = $this->db->get_where("agenda" , array('id' => $id));
			return $query->row();
		}

		public function  delete($id) {
			$this->db->set('active', '0', FALSE);
			$this->db->where('id', $id );
			$this->db->update('agenda');
			return $id;
		}
		
	}