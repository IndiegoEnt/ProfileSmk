<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ekskul extends CI_Controller {

    function __construct(){
		parent::__construct();
        if(!$this->session->userdata('logged_in')){
            redirect('Auth');
        }else if($this->session->userdata('role') == 'ROLE_ADMIN'){
            redirect('Dashboard');
        }
	}
    
    public function index() {
        $this->load->model('Ekskul_Model');
        
        $data = array(
            'title' => 'Table Ekskul',
            'tableData' => $this->Ekskul_Model->list_ekskul()
        );
        
        $this->template->content->view('ekskul/index', $data);
        
        // Publish the template
        $this->template->publish();
    }
}