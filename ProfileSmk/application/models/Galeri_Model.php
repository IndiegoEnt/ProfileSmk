<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Galeri_Model extends CI_Model {
		
		public function list_galeri_home() {
			$data = array('galeri.active' => '1');
			$this->db->select('galeri.* , users.username as username');
			$this->db->join('users', 'users.id = galeri.user_id', 'left');
			$query = $this->db->get_where("galeri" , $data);
			return $query->result();
		}

		public function list_galeri() {
			$data = array('active' => '1');
			$query = $this->db->get_where("galeri" , $data);
			return $query->result();
		}

		public function create_galeri() {
			return array(
				'nama' => '' ,
				'keterangan' => '' ,
				'tampilkan' => '',
			);
		}

		public function  save($params , $ci) {
			$currentDate = date('YmdHis');

			if($params['galery_type'] == 'GALERY_GENERAL'){
				$params['event_id'] = 'null';
			}

			$params['tanggal_buat'] = $currentDate;
			$params['tanggal_edit'] = $currentDate;
			$params['active'] = 1;
			if($params['tampilkan'] == null){
				$params['tampilkan'] = '0';
			}
			$params['image'] =  $this->uploadFile($ci , md5("THUMB_" . $currentDate ));
			if(!$params['image']){
				$params['image'] = 'noimage.png';
			}
			$params['user_id'] = $this->session->userdata('id');
			
			$this->db->insert('galeri', $params);
			return $params;
		}

		public function save_from_event($params, $ci)
		{
			$currentDate = date('YmdHis');

			unset($params['event_type']);
			unset($params['jurusan_id']);


			$params['tanggal_buat'] = $currentDate;
			$params['tanggal_edit'] = $currentDate;
			$params['active'] = 1;
			$params['tampilkan'] = 1;

			$params['image'] =  $this->uploadFile_from_event($ci , md5("THUMB_" . $currentDate ));
			if(!$params['image']){
				$params['image'] = 'noimage.png';
			}
			$params['user_id'] = $this->session->userdata('id');
			$this->db->insert('galeri', $params);
			return $params;
		}

		public function uploadFile_from_event($ci , $currentDate){
			$config['file_name'] = $currentDate;
			$config['upload_path']   = './upload/'; 
			$config['allowed_types'] = 'gif|jpg|png'; 
			$ci->load->library('upload', $config);
			
			if ( ! $ci->upload->do_upload('files')) {
				
			} else { 
				$data = array('upload_data' => $ci->upload->data()); 
				return $data['upload_data']['file_name'];
			}
			return null; 
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

    	public function  get($id) {
			$query = $this->db->get_where("galeri" , array('id' => $id));
			return $query->row();
		}

		public function  update($params , $ci) {
			
			$currentDate = date('YmdHis');
			$params['tanggal_edit'] = $currentDate;
			$params['active'] = 1;


			$data = array(
				'galery_type' =>$params['galery_type'],
				'event_id' => $params['event_id'],
				'tanggal_edit' =>$params['tanggal_edit'],
				'nama' => $params['nama'],
				'keterangan' => $params['keterangan'],
				'tampilkan' => $params['tampilkan'],
			);

			if($data['galery_type'] == 'GALERY_GENERAL'){
				$data['event_id'] = 'null';
			}

			if($data['tampilkan'] == null){
				$data['tampilkan'] = '0';
			}
			$data['user_id'] = $this->session->userdata('id');
			
			$data['image'] =  $this->uploadFile($ci , md5("THUMB_" . $currentDate ));
			if(!$data['image']){
				unset($data['image']);
			}

			
			$this->db->where('id', $params['id']);
			$this->db->update('galeri', $data);
			return $params;
		}

		public function  delete($id) {
			$this->db->set('active', '0', FALSE);
			$this->db->set('tanggal_edit', date('YmdHis'),  FALSE);
			$this->db->where('id', $id );
			$this->db->update('galeri');
			return $id;
		}
	}

?>