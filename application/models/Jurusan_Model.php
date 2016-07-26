<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Jurusan_Model extends CI_Model {

		public function list_jurusan() {
			$query = $this->db->query("select * from jurusan");
			return $query->result();
		}
	}

?>