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
        $this->load->model('kategori_berita_model');
        
        $data = array(
            'title' => 'Kategori Berita',
            'tableData' => $this->kategori_berita_model->list_kategori_berita()
        );
        $this->template->content->view('kategori_berita/index', $data);
        
        // Publish the template
        $this->template->publish();
    }
     public function create() {
        $this->load->model('kategori_berita_model');
        
        $data = array(
            'title' => 'Create Kategori Berita',
            'userModel' => $this->kategori_berita_model->create_model()
        );

        
        $this->template->content->view('kategori_berita/create', $data);
        
        // Publish the template
        $this->template->publish();
    }
}