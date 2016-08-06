<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct(){
		parent::__construct();
        if(!$this->session->userdata('logged_in')){
            redirect('Auth');
        }
	}
    
    public function index() {
        $this->load->model('user');
        
        $data = array(
            'title' => 'Table Users',
            'tableData' => $this->user->list_user()
        );
        
        $this->template->content->view('users/index', $data);
        
        // Publish the template
        $this->template->publish();
    }

    public function create() {
        $this->load->model('user');
        $this->load->model('jurusan_model');
        
        $data = array(
            'title' => 'Create User',
            'userModel' => $this->user->create_model(),
            'jurusans' => $this->jurusan_model->list_jurusan()
        );

        

        $this->template->content->view('users/create', $data);
        
        // Publish the template
        $this->template->publish();
    }

    public function check_username($username) {
        $this->load->model('user');
        
        $data = array(
            'status' => $this->user->check_username($username)
        );

        echo json_encode ($data);
    }

    public function create_save() {
        $this->load->model('user');

        $this->user->save($this->input->post());

        redirect('Users');
    }

    public function edit($id) {
        $this->load->model('user');
        $this->load->model('jurusan_model');

        $data = array(
            'userModel' => $this->user->get($id),
            'title' => 'Edit User',
            'jurusans' => $this->jurusan_model->list_jurusan()
        );

        $this->template->content->view('users/edit', $data);
        
        // Publish the template
        $this->template->publish();
    }

    public function edit_save() {
        $this->load->model('user');

        $this->user->update($this->input->post());

        redirect('Users');
    }

    public function delete($id) {
        $this->load->model('user');

        $this->user->delete($id);

        redirect('Users');
    }
}