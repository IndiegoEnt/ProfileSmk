<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Guru extends CI_Controller {

    function __construct(){
		parent::__construct();
        if(!$this->session->userdata('logged_in')){
            redirect('Auth');
        }else if($this->session->userdata('role') != 'ROLE_ADMIN'){
            redirect('Dashboard');
        }
	}
    public function check_nip($nip) {
        $this->load->model('Guru_Model');
        
        $data = array(
            'status' => $this->Guru_Model->check_nip($nip)
        );

        echo json_encode ($data);
    }
    
    public function index() {

        //$this->template->content->view('jurusan/index', array('title' => 'Jurusan SMK'));

        
        // Publish the template
        //$this->template->publish();

        $this->load->model('Guru_Model');
        
        $data = array(
            'title' => 'Direktori Guru',
            'tableData' => $this->Guru_Model->list_guru()
        );
        
        $this->template->content->view('guru/index', $data);
        
        // Publish the template
        $this->template->publish();
    }

    public function create() {
        $this->load->model('Guru_Model');
        
        $data = array(
            'title' => 'Tambah Guru',
            'jurusanModel' => $this->Guru_Model->create_model()
        );

        
        $this->template->content->view('guru/create', $data);
        
        // Publish the template
        $this->template->publish();
    }

    public function create_save() {
        $this->load->model('Guru_Model');

        $this->Guru_Model->save($this->input->post());

        redirect('Guru');
    }

    public function edit($id) {
        $this->load->model('Guru_Model');

        $data = array(
            'guruModel' => $this->Guru_Model->get($id),
            'title' => 'Edit Guru',
        );

        $this->template->content->view('guru/edit', $data);
        
        // Publish the template
        $this->template->publish();
    }

    public function edit_save() {
        $this->load->model('Guru_Model');

        $this->Guru_Model->update($this->input->post());

        redirect('guru');
    }

    public function delete($id) {
        $this->load->model('Jurusan_Model');

        $this->Jurusan_Model->delete($id);

        redirect('Jurusan');
    }
}