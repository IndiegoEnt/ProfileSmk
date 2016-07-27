<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategori extends CI_Controller {

    function __construct(){
		parent::__construct();
        if(!$this->session->userdata('logged_in')){
            redirect('Auth');
        }else if($this->session->userdata('role') == 'ROLE_ADMIN'){
            redirect('Dashboard');
        }
	}
    
    public function index() {
        $this->load->model('Kategori_Model');
        
        $data = array(
            'title' => 'Table Kategori',
            'tableData' => $this->Kategori_Model->list_kategori()
        );
        
        $this->template->content->view('kategori/index', $data);
        
        // Publish the template
        $this->template->publish();
    }
}