<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Profile_model extends CI_Model {

		public function cek_profile($data) {
			$query = $this->db->get_where('profile', $data);
			return $query;
		}
		
		public function list_profile() {
			$this->db->select('profile.* , jurusan.nama as nama_jurusan, users.username');
			$this->db->join('users', 'users.id = profile.user_id');
			$this->db->join('jurusan', 'jurusan.id = profile.jurusan_id','left');
			$this->db->where('profile.active', 1 );
			$query = $this->db->get("profile");
			return $query->result();
		}

		public function  create_model() {
			return array(
				'profile_type' => '' ,
				'jurusan_id' => '' ,
				'isi' => '' ,
				'tanggal_buat' => '' ,
				'tanggal_edit' => '' ,
				'tanggal_user_id' => ''
			);
		}

		public function save($params, $ci) {
			$currentDate = date('YmdHis');
			$params['active'] = 1;
			$params['profile_type'] = $params['profile_type'];
			$params['jurusan_id'] = $params['jurusan_id'];
			$params['isi'] = $params['isi'];
			$params['tanggal_buat'] = date('YmdHis');
			$params['tanggal_edit'] = date('YmdHis');
			$params['user_id'] = 1;
			$params['logo'] =  $this->uploadFile($ci , md5("THUMB_" . $currentDate ));
			if(!$params['logo']){
				$params['logo'] = 'noimage.png';
			}
			
			$this->db->insert('profile', $params);
			return $params;
		}

		public function  update($params , $ci) {

			$currentDate = date('YmdHis');
			$params['tanggal_edit'] = $currentDate;
			$params['active'] = 1;

			$data = array(
				'tanggal_edit' =>$params['tanggal_edit'],
				'isi' => $params['isi'],
			);
			$data['user_id'] = $this->session->userdata('id');
			
			$data['logo'] =  $this->uploadFile($ci , md5("THUMB_" . $currentDate ));
			if(!$data['logo']){
				unset($data['logo']);
			}

			//$this->Kategori_Berita_Model->save_batch($params['kategoris'] , $params['id']);

			$this->db->where('id', $params['id']);
			$this->db->update('profile', $data);
			return $params;
		}
		
		public function  delete($id) {
			$this->db->set('active', '0', FALSE);
			$this->db->set('tanggal_edit', date('YmdHis'),  FALSE);
			$this->db->where('id', $id );
			$this->db->update('profile');
			return $id;
		}

		public function  get($id) {
			$this->db->select('profile.* , jurusan.nama as nama');
			$this->db->join('jurusan', 'jurusan.id = profile.jurusan_id','left');
			$query = $this->db->get_where("profile" , array('profile.id' => $id));
			return $query->row();
		}
		
		public function  check_profile($jurusan_id) {
			$query = $this->db->get_where("profile" , array('jurusan_id' => $jurusan_id));
			return $query->row() ? '1' : '0';
		}
		public function  check_profile_type($profile_type) {
			$query = $this->db->get_where("profile" , array('profile_type' => $profile_type));
			return $query->row() ? '1' : '0';
		}
		public function uploadFile($ci , $currentDate){
			$config['file_name'] = $currentDate;
			$config['upload_path']   = './upload/'; 
			$config['allowed_types'] = 'gif|jpg|png';
			
			$ci->load->library('upload', $config);
			if (!$ci->upload->do_upload('logo')) {
				
			} else { 
				$data = array('upload_data' => $ci->upload->data()); 
				return $data['upload_data']['file_name'];
			}
			return null; 
		}

	}

?>