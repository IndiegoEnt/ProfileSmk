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
}