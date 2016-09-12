<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Event_Model extends CI_Model {
		public function list_event_home() {
			$data = array('event.active' => '1' );
			$this->db->select('event.* , users.username as username , jurusan.nama as nama_jurusan');
			$this->db->join('users', 'users.id = event.user_id', 'left');
			$this->db->join('jurusan', 'jurusan.id = event.jurusan_id', 'left');
			$this->db->order_by('tanggal_buat' , 'desc');
			$query = $this->db->get_where("event" , $data);
			return $query->result();
		}

		public function list_event() {
			$data = array('event.active' => '1');
			$this->db->select('event.* , jurusan.nama as nama_jurusan');
			$this->db->join('jurusan', 'jurusan.id = event.jurusan_id', 'left');
			$this->db->order_by('tanggal_buat' , 'desc');
			$query = $this->db->get_where("event" , $data);
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
			
			$currentDate = date('YmdHis');
			$this->load->model('kategori_berita_model');
			$params['tanggal_buat'] = $currentDate;
			$params['tanggal_edit'] = $currentDate;
			$params['active'] = 1;
			if($params['event_type'] == 'EVENT_SEKOLAH'){
				$params['jurusan_id'] = null;
			}
			if($this->session->userdata('role') == "ROLE_KAJUR"){
				$params['event_type'] = 'EVENT_JURUSAN';
				$params['jurusan_id'] = $this->session->userdata('jurusan_id');
			}
			
			$params['user_id'] = $this->session->userdata('id');
			
			$this->db->insert('event', $params);
			$this->uploadFile($ci , $this->db->insert_id());
			return $params;
		}

		public function  update($params , $ci) {

			$this->load->model('kategori_berita_model');
			
			$currentDate = date('YmdHis');
			$params['tanggal_edit'] = $currentDate;
			$params['active'] = 1;

			$data = array(
				'tanggal_edit' =>$params['tanggal_edit'],
				'nama' => $params['nama'],
				'keterangan' => $params['keterangan'],
				'event_type' => $params['event_type'],
				'jurusan_id' => $params['jurusan_id'],
			);
			if($data['event_type'] == 'EVENT_SEKOLAH'){
				$data['jurusan_id'] = null;
			}
			if($this->session->userdata('role') == "ROLE_KAJUR"){
				$data['event_type'] = 'EVENT_JURUSAN';
				$data['jurusan_id'] = $this->session->userdata('jurusan_id');
			}
			$data['user_id'] = $this->session->userdata('id');
			

			$this->db->where('id', $params['id']);
			$this->db->update('event', $data);
			$this->uploadFile($ci , $params['id']);
			return $params;
		}
		
		public function  delete($id) {
			$this->db->set('active', '0', FALSE);
			$this->db->set('tanggal_edit', date('YmdHis'),  FALSE);
			$this->db->where('id', $id );
			$this->db->update('event');
			return $params;
		}

		public function  get($id) {

			$this->db->select('event.* , jurusan.nama as nama_jurusan, users.nama as nama_user');
			$this->db->join('jurusan', 'jurusan.id = event.jurusan_id', 'left');
			$this->db->join('users', 'users.id = event.user_id', 'left');
			$query = $this->db->get_where("event" , array('event.id' => $id));
			return $query->row();
		}
		public function getGaleryFromEvent($id){
			$data = array('event_galery.event_id' => $id);
			$query = $this->db->get_where("event_galery" , $data);
			return $query->result();
		}

		
		public function uploadFile($ci  , $event_id){
			
			$ci->load->library('upload');
			$returnData = array();

			$files = $_FILES;
			$cpt = count($_FILES['files']['name']);
			for($i=0; $i<$cpt; $i++)
			{   
				if($files['files']['name'][$i]){
					$_FILES['files']['name']= $files['files']['name'][$i];
					$_FILES['files']['type']= $files['files']['type'][$i];
					$_FILES['files']['tmp_name']= $files['files']['tmp_name'][$i];
					$_FILES['files']['error']= $files['files']['error'][$i];
					$_FILES['files']['size']= $files['files']['size'][$i]; 
					$config['upload_path']   = './upload/'; 
					$config['allowed_types'] = 'gif|jpg|png'; 
					$config['file_name'] = md5("THUMB_" .  date('YmdHis') )  ;
					$this->upload->initialize($config); //must reinitialize to get rid of your bug ( i had it as well)   
					if ( ! $ci->upload->do_upload('files')) {
						$returnData[$i] = $ci->upload->data();
					} else { 
						$data = array('upload_data' => $ci->upload->data()); 
						$params = array('image' => $data['upload_data']['file_name'], 'event_id' => $event_id );
						$this->db->insert('event_galery', $params);
					}
				}

			}
			return true; 
		}


	}

?>