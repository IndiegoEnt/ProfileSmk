<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Index_Model extends CI_Model {


		public function profile_sekolah() {
					$data = array('id');
					$query = $this->db->get_where("profile" , $data);
					return $query->result();
				}
	}