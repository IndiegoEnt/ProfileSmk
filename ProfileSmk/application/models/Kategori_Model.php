<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Kategori_Model extends CI_Model {

		public function cek_user($data) {
			$query = $this->db->get_where('users', $data);
			return $query;
		}

		public function list_kategori() {
			$data = array('id');
			$query = $this->db->get_where("kategori" , $data);
			return $query->result();
		}

		public function  create_model() {
			return array(
				'nama' => '' ,
				'keterangan' => '' ,
			);
		}

		public function  save($params) {
			$params['nama'] = ($params['nama']);
			$params['keterangan'] = ($params['keterangan']);
			$this->db->insert('kategori', $params);
			return $this->db->insert_id();
		}

		public function  update($params) {
			$data = array(
				'nama' => $params['nama'],
				'keterangan' =>$params['keterangan'],
			);
			$this->db->where('id', $params['id']);
			$this->db->update('kategori', $data);
			return $params;
		}

		public function  get($id) {
			$query = $this->db->get_where("kategori" , array('id' => $id));
			return $query->row();
		}

		public function  get_by_name($nama) {
			$query = $this->db->query("select * from kategori where UPPER(nama) = '".$nama."'");
			return $query->row();
		}
		public function list_jurusan_by_berita_id($id){
			$query = $this->db->query("select * from kategori join kategori_berita on kategori.id = kategori_berita.kategori_id where kategori_berita.berita_id = '".$id."'");
			return $query->result();
		}

		public function  delete($id) {
			$this->db->where('id', $id );
			$this->db->delete('kategori');
			return $params;
		}

	}