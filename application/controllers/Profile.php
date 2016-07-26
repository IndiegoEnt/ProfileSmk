<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends CI_Controller {

    function __construct(){
		parent::__construct();
        if(!$this->session->userdata('logged_in')){
            redirect('Auth');
        }
	}
    
    public function index() {
        
        $this->template->content->view('profile/index', array('title' => 'Profile SMK'));
        
        // Publish the template
        $this->template->publish();
    }
}