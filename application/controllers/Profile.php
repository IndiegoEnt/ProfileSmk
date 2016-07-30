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
}