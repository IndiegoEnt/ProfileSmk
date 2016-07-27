<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Kategori_Model extends CI_Model {

		public function list_kategori() {
			$data = array('id');
			$query = $this->db->get_where("kategori" , $data);
			return $query->result();
		}

	}