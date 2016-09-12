<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategori_berita extends CI_Controller {

   function __construct(){
        parent::__construct();
        if(!$this->session->userdata('logged_in')){
            redirect('Auth');
        }
    }
    
    public function index() {
        $this->load->model('Kategori_Berita_Model');
        
        $data = array(
            'title' => 'Kategori Berita',
            'tableData' => $this->Kategori_Berita_Model->list_kategori_berita()
        );
        $this->template->content->view('kategori_berita/index', $data);
        
        // Publish the template
        $this->template->publish();
    }
     public function create() {
        $this->load->model('Kategori_Berita_Model');
        
        $data = array(
            'title' => 'Create Kategori Berita',
            'userModel' => $this->Kategori_Berita_Model->create_model()
        );

        
        $this->template->content->view('kategori_berita/create', $data);
        
        // Publish the template
        $this->template->publish();
    }
}