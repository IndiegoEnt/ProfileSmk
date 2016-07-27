<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Ekskul_Model extends CI_Model {

		public function list_ekskul() {
			$data = array('id');
			$query = $this->db->get_where("ekskul" , $data);
			return $query->result();
		}

	}