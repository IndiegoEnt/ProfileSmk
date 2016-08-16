<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends CI_Controller {

    function __construct(){
		parent::__construct();
        if(!$this->session->userdata('logged_in')){
            redirect('Auth');
        }
		$this->load->model('profile_model');
	}
    
    public function index() {
        $data = array(
            'title' => 'Table Profiles',
            'tableData' => $this->profile_model->list_profile()
        );
        
        $this->template->content->view('profile/index', $data);
        
        // Publish the template
        $this->template->publish();
    }
	public function create() {
        $this->load->model('profile_model');
        $this->load->model('jurusan_model');
        
        $data = array(
            'title' => 'Create Profile',
            'userModel' => $this->profile_model->create_model(),
            'jurusans' => $this->jurusan_model->list_jurusan()
        );

        $this->template->content->view('profile/create', $data);    
        // Publish the template
        $this->template->publish();
    }
	
	public function create_save() {
        $this->profile_model->save($this->input->post());
        redirect('Profile');
    }
	public function edit($id) {
        $this->load->model('profile_model');
        $this->load->model('jurusan_model');
        $this->load->model('Kategori_Model');

        $data = array(
            'profileModel' => $this->profile_model->get($id),
            'title' => 'Edit User',
            'jurusans' => $this->jurusan_model->list_jurusan(),
            'role' => $this->session->userdata('role') 
        );

        $this->template->content->view('profile/edit', $data);
        
        // Publish the template
        $this->template->publish();
    }
	public function edit_save() {
        $this->load->model('profile_model');

        $this->profile_model->update($this->input->post() , $this);

        redirect('Profile');
    }
	public function view($id) {
        $this->load->model('profile_model');
        $this->load->model('jurusan_model');
        $this->load->model('Kategori_Model');

        $data = array(
            'profileModel' => $this->profile_model->get($id),
            'title' => 'Profile View',
            'jurusans' => $this->jurusan_model->list_jurusan(),
        );

        $this->template->content->view('home/layout/profile/view_profile', $data);
        
        // Publish the template
        $this->template->publish();
    }
	public function check_profile($jurusan_id) {
        $data = array(
            'status' => $this->profile_model->check_profile($jurusan_id)
        );

        echo json_encode ($data);
    }
	public function check_profile_type($profile_type) {
        $data = array(
            'status' => $this->profile_model->check_profile_type($profile_type)
        );

        echo json_encode ($data);
    }
	public function delete($id) {
        $this->profile_model->delete($id);
        redirect('Profile');
    }
}