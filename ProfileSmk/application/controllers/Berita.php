<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Berita extends CI_Controller {

    function __construct(){
		parent::__construct();
        if(!$this->session->userdata('logged_in')){
            redirect('Auth');
        }
	}
    
    public function index() {
        $this->load->model('Berita_Model');
        
        $data = array(
            'title' => 'Table Berita',
            'tableData' => $this->Berita_Model->list_berita()
        );
        
        $this->template->content->view('berita/index', $data);
        
        // Publish the template
        $this->template->publish();
    }

    public function create() {
        $this->load->model('Berita_Model');
        $this->load->model('Jurusan_Model');
        
        $data = array(
            'title' => 'Create User',
            'userModel' => $this->Berita_Model->create_model(),
            'jurusans' => $this->Jurusan_Model->list_jurusan(),
            'role' => $this->session->userdata('role') 
        );

        

        $this->template->content->view('berita/create', $data);
        
        // Publish the template
        $this->template->publish();
    }


    public function create_save() {
        $this->load->model('Berita_Model');

        $this->Berita_Model->save($this->input->post() , $this);

        redirect('Berita');
    }

    public function edit($id) {
        $this->load->model('Berita_Model');
        $this->load->model('Jurusan_Model');
        $this->load->model('Kategori_Model');

        $data = array(
            'beritaModel' => $this->Berita_Model->get($id),
            'title' => 'Edit User',
            'jurusans' => $this->Jurusan_Model->list_jurusan(),
            'kategoris' => $this->Kategori_Model->list_jurusan_by_berita_id($id),
            'role' => $this->session->userdata('role') 
        );

        $this->template->content->view('berita/edit', $data);
        
        // Publish the template
        $this->template->publish();
    }

    public function view($id) {
        $this->load->model('Berita_Model');
        $this->load->model('Jurusan_Model');
        $this->load->model('Kategori_Model');

        $data = array(
            'beritaModel' => $this->Berita_Model->get($id),
            'title' => 'Edit User',
            'jurusans' => $this->Jurusan_Model->list_jurusan(),
            'kategoris' => $this->Kategori_Model->list_jurusan_by_berita_id($id),
            'backUrl' => base_url()."berita/"
        );

        $this->template->content->view('home/layout/berita/view_berita', $data);
        
        // Publish the template
        $this->template->publish();
    }  

    public function edit_save() {
        $this->load->model('Berita_Model');

        $this->Berita_Model->update($this->input->post() , $this);

        redirect('Berita');
    }

    public function delete($id) {
        $this->load->model('Berita_Model');

        $this->Berita_Model->delete($id);

        redirect('Berita');
    }
}