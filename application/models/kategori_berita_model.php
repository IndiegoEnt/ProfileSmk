<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class kategori_berita_model extends CI_Model {

		public function  get($id) {
			$query = $this->db->get_where("kategori_berita" , array('id' => $id));
			return $query->row();
		}

		
		public function list_kategori_berita() {
			$data = array('id' => $id);
			$query = $this->db->get_where("kategori_berita" , $data);
			return $query->result();
		}
	}
