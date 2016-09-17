<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Berita_Model extends CI_Model {
		public function list_berita_home() {
			$data = array('berita.active' => '1' );
			$this->db->select('berita.* , users.username as username');
			$this->db->join('users', 'users.id = berita.user_id', 'left');
			$this->db->order_by('tanggal_buat' , 'desc');
			$query = $this->db->get_where("berita" , $data);
			
			return $query->result();
		}
		public function list_berita() {
			$data = array('berita.active' => '1');
			
			if($this->session->userdata('role') == "ROLE_KAJUR"){
				$data ['jurusan.id'] = $this->session->userdata('jurusan_id');
			}

			$this->db->select('berita.* , jurusan.nama as nama_jurusan');
			$this->db->join('jurusan', 'jurusan.id = berita.jurusan_id', 'left');
			$this->db->order_by('tanggal_buat' , 'desc');
			$query = $this->db->get_where("berita" , $data);
			return $query->result();
		}
		public function list_berita_by_jurusan ($jurusan_id) {
			$query = $this->db->get_where("berita" , array('jurusan_id' =>  $jurusan_id , 'active' => '1'));
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
			$this->load->model('Kategori_Berita_Model');
			$currentDate = date('YmdHis');
			$params['tanggal_buat'] = $currentDate;
			$params['tanggal_edit'] = $currentDate;
			$params['active'] = 1;
			if($this->session->userdata('role') == "ROLE_KAJUR"){
				$params['berita_type'] = 'BERITA_JURUSAN';
				$params['jurusan_id'] = $this->session->userdata('jurusan_id');
			}
			if($params['berita_type'] == 'BERITA_SEKOLAH'){
				$params['jurusan_id'] = null;
			}
			$params['image'] =  $this->uploadFile($ci , md5("THUMB_" . $currentDate ));
			if(!$params['image']){
				$params['image'] = 'noimage.png';
			}
			$params['user_id'] = $this->session->userdata('id');
            $kategoris = $params['kategoris'];
			unset($params['kategoris']);
			
			$this->db->insert('berita', $params);
			$this->Kategori_Berita_Model->save_batch($kategoris , $this->db->insert_id());
			return $params;
		}

		public function  update($params , $ci) {

			$this->load->model('Kategori_Berita_Model');
			
			$currentDate = date('YmdHis');
			$params['tanggal_edit'] = $currentDate;
			$params['active'] = 1;

			$data = array(
				'tanggal_edit' =>$params['tanggal_edit'],
				'judul' => $params['judul'],
				'isi' => $params['isi'],
				'berita_type' => $params['berita_type'],
				'jurusan_id' => $params['jurusan_id'],
			);
			if($data['berita_type'] == 'BERITA_SEKOLAH'){
				$data['jurusan_id'] = null;
			}
			if($this->session->userdata('role') == "ROLE_KAJUR"){
				$data['berita_type'] = 'BERITA_JURUSAN';
				$data['jurusan_id'] = $this->session->userdata('jurusan_id');
			}
			$data['user_id'] = $this->session->userdata('id');
			
			$data['image'] =  $this->uploadFile($ci , md5("THUMB_" . $currentDate ));
			if(!$data['image']){
				unset($data['image']);
			}

			$this->Kategori_Berita_Model->save_batch($params['kategoris'] , $params['id']);

			$this->db->where('id', $params['id']);
			$this->db->update('berita', $data);
			return $params;
		}
		
		public function  delete($id) {
			$this->db->set('active', '0', FALSE);
			$this->db->set('tanggal_edit', date('YmdHis'),  FALSE);
			$this->db->where('id', $id );
			$this->db->update('berita');
			return $id;
		}

		public function  get($id) {

			$data = array('berita.active' => '1');
			$this->db->select('berita.* , jurusan.nama as nama_jurusan, users.nama as nama_user');
			$this->db->join('jurusan', 'jurusan.id = berita.jurusan_id', 'left');
			$this->db->join('users', 'users.id = berita.user_id', 'left');
			$query = $this->db->get_where("berita" , array('berita.id' => $id));
			return $query->row();
		}

		public function uploadFile($ci , $currentDate){
			$config['file_name'] = $currentDate;
			$config['upload_path']   = './upload/'; 
			$config['allowed_types'] = 'gif|jpg|png'; 
			$ci->load->library('upload', $config);
			
			if ( ! $ci->upload->do_upload('image')) {
				
			} else { 
				$data = array('upload_data' => $ci->upload->data()); 
				return $data['upload_data']['file_name'];
			}
			return null; 
		}


	}

?>