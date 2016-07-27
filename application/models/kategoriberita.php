<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Kategori_Berita extends CI_Model {

		
		public function list_kategori_berita() {
			$data = array('active' => '1');
			$query = $this->db->get_where("kategori_berita" , $data);
			return $query->result();
		}
	}
