<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jurusan extends CI_Controller {

    function __construct(){
		parent::__construct();
        if(!$this->session->userdata('logged_in')){
            redirect('Auth');
        }else if($this->session->userdata('role') == 'ROLE_ADMIN'){
            redirect('Dashboard');
        }
	}
    
    public function index() {

        //$this->template->content->view('jurusan/index', array('title' => 'Jurusan SMK'));

        
        // Publish the template
        //$this->template->publish();

        $this->load->model('Jurusan_Model');
        
        $data = array(
            'title' => 'Table Jurusan',
            'tableData' => $this->Jurusan_Model->list_jurusan()
        );
        
        $this->template->content->view('jurusan/index', $data);
        
        // Publish the template
        $this->template->publish();
    }

    public function create() {
        $this->load->model('Jurusan_Model');
        
        $data = array(
            'title' => 'Create Jurusan',
            'jurusanModel' => $this->Jurusan_Model->create_jurusan()
        );

        
        $this->template->content->view('jurusan/create', $data);
        
        // Publish the template
        $this->template->publish();
    }

    public function create_save() {
        $this->load->model('Jurusan_Model');

        $this->Jurusan_Model->save($this->input->post());

        redirect('Jurusan');
    }

    public function edit($id) {
        $this->load->model('Jurusan_Model');

        $data = array(
            'jurusanModel' => $this->Jurusan_Model->get($id),
            'title' => 'Edit Jurusan',
        );

        $this->template->content->view('jurusan/edit', $data);
        
        // Publish the template
        $this->template->publish();
    }

    public function edit_save() {
        $this->load->model('Jurusan_Model');

        $this->Jurusan_Model->update($this->input->post());

        redirect('Jurusan');
    }

    public function delete($id) {
        $this->load->model('Jurusan_Model');

        $this->Jurusan_Model->delete($id);

        redirect('Jurusan');
    }
}