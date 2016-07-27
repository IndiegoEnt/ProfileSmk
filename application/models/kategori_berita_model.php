<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Kategori_Berita_model extends CI_Model {

		
		public function list_kategori_berita() {
			$data = array('id');
			$query = $this->db->get_where("kategori_berita" , $data);
			return $query->result();
		}

		public function  create_model() {
			return array(
				'kategori_id' => '' ,
				'berita_id' => '' ,
			);
		}

		public function  save($params) {
			$params['kategori_id'] = ($params['kategori_id']);
			$params['berita_id'] = ($params['berita_id']);
			$this->db->insert('kategori_berita', $params);
			return $params;
		}
	}
