<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Index_Model extends CI_Model {


		public function profile_sekolah() {
					$data = array('profile.profile_type' => 'PROFILE_SEKOLAH');
					$query = $this->db->get_where("profile" , $data);
					return $query->result();
		}
		public function berita() {
					$query = $this->db->query("select * from berita where active=1 order by tanggal_buat asc limit 2");
					return $query->result();
		}
	}