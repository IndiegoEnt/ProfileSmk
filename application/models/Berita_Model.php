<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Berita_Model extends CI_Model {

		public function cek_user($data) {
			$query = $this->db->get_where('users', $data);
			return $query;
		}
		
		public function list_user() {
			$data = array('berita.active' => '1');
			$this->db->select('berita.* , jurusan.nama as nama_jurusan');
			$this->db->join('jurusan', 'jurusan.id = berita.jurusan_id', 'left');
			$query = $this->db->get_where("berita" , $data);
			return $query->result();
		}

		public function  create_model() {
			return array(
				'username' => '' ,
				'nama' => '' ,
				'jurusan' => '' ,
				'role' => '' ,
			);
		}

		public function  save($params , $ci) {
			$this->load->model('kategori_berita_model');
			$currentDate = date('YmdHis');
			$params['tanggal_buat'] = $currentDate;
			$params['tanggal_edit'] = $currentDate;
			$params['active'] = 1;
			if($params['berita_type'] == 'BERITA_SEKOLAH '){
				$params['jurusan_id'] = null;
			}
			$params['image'] =  $this->uploadFile($ci , md5("THUMB_" . $currentDate ));

            $kategoris = $params['kategoris'];
			unset($params['kategoris']);
			
			$this->db->insert('berita', $params);
			$this->kategori_berita_model->save_batch($kategoris , $this->db->insert_id());
			return $params;
		}

		public function uploadFile($ci , $currentDate){
			$config['file_name'] = $currentDate;
			$config['upload_path']   = './upload/'; 
			$config['allowed_types'] = 'gif|jpg|png'; 
			$ci->load->library('upload', $config);
			
			if ( ! $ci->upload->do_upload('image')) {
				$error = array('error' => $ci->upload->display_errors()); 
				var_dump($error);
				die('HERE');
			} else { 
				$data = array('upload_data' => $ci->upload->data()); 
				return $data['upload_data']['file_name'];
			}
			return "FILEERRROR"; 
		}
		public function  update($params) {
			$params['tanggal_edit'] = date('YmdHis');
			$params['active'] = 1;

			$data = array(
				'username' => $params['username'],
				'tanggal_edit' =>$params['tanggal_edit'],
				'nama ' => $params['nama'],
				'role' => $params['role'],
				'jurusan_id' => $params['jurusan_id'],
			);
			if($data['role'] == 'ROLE_ADMIN'){
				$data['jurusan_id'] = null;
			}

			$this->db->where('id', $params['id']);
			$this->db->update('users', $data);
			return $params;
		}
		
		public function  delete($id) {
			$this->db->set('active', '0', FALSE);
			$this->db->set('tanggal_edit', date('YmdHis'),  FALSE);
			$this->db->where('id', $id );
			$this->db->update('users');
			return $params;
		}

		public function  get($id) {
			$query = $this->db->get_where("users" , array('id' => $id));
			return $query->row();
		}


	}

?>