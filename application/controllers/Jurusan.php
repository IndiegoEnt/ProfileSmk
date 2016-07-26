<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jurusan extends CI_Controller {

    function __construct(){
		parent::__construct();
        if(!$this->session->userdata('logged_in')){
            redirect('Auth');
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
}