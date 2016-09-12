<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Kategori_Berita_Model extends CI_Model {

		
		public function list_kategori_berita() {
			$data = array('id');
			$query = $this->db->get_where("kategori_berita" , $data);
			return $query->result();
		}

		public function  create_model() {
			return array(
				'kategori_id' => '' ,
				'berita_id' => '' ,
			);
		}

		public function  save($params) {
			$params['kategori_id'] = ($params['kategori_id']);
			$params['berita_id'] = ($params['berita_id']);
			$this->db->insert('kategori_berita', $params);
			return $params;
		}

		public function save_batch($batch , $berita_id){
			$batch = explode(',', $batch);
			$this->load->model('Kategori_Model');
			
			$this->db->where('berita_id', $berita_id );
			$this->db->delete('kategori_berita');
			foreach ($batch as $key => $value) {
				$id = "";
				$kategori = $this->Kategori_Model->get_by_name($value);
				if($kategori){
					$id = $kategori->id;
				}else{
					$id = $this->Kategori_Model->save(array('nama' => $value , 'keterangan'=> ''));
				}
				if($id){
					$this->save(array('kategori_id' => $id , 'berita_id'=> $berita_id));
				}
			}
		}
	}
