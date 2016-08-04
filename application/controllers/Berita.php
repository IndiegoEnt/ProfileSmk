<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Berita extends CI_Controller {

    function __construct(){
		parent::__construct();
        if(!$this->session->userdata('logged_in')){
            redirect('Auth');
        }else if($this->session->userdata('role') == 'ROLE_ADMIN'){
            redirect('Dashboard');
        }
	}
    
    public function index() {
        $this->load->model('Berita_Model');
        
        $data = array(
            'title' => 'Table Users',
            'tableData' => $this->Berita_Model->list_user()
        );
        
        $this->template->content->view('berita/index', $data);
        
        // Publish the template
        $this->template->publish();
    }

    public function create() {
        $this->load->model('Berita_Model');
        $this->load->model('jurusan_model');
        
        $data = array(
            'title' => 'Create User',
            'userModel' => $this->Berita_Model->create_model(),
            'jurusans' => $this->jurusan_model->list_jurusan(),
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
        $this->load->model('jurusan_model');
        $this->load->model('Kategori_Model');

        $data = array(
            'beritaModel' => $this->Berita_Model->get($id),
            'title' => 'Edit User',
            'jurusans' => $this->jurusan_model->list_jurusan(),
            'kategoris' => $this->Kategori_Model->list_jurusan_by_berita_id($id),
            'role' => $this->session->userdata('role') 
        );

        $this->template->content->view('berita/edit', $data);
        
        // Publish the template
        $this->template->publish();
    }

    public function view($id) {
        $this->load->model('Berita_Model');
        $this->load->model('jurusan_model');
        $this->load->model('Kategori_Model');

        $data = array(
            'beritaModel' => $this->Berita_Model->get($id),
            'title' => 'Edit User',
            'jurusans' => $this->jurusan_model->list_jurusan(),
            'kategoris' => $this->Kategori_Model->list_jurusan_by_berita_id($id)
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