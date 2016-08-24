<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Galeri extends CI_Controller {

    function __construct(){
		parent::__construct();
        if(!$this->session->userdata('logged_in')){
            redirect('Auth');
        }
	}
    
    public function index() {
        $this->load->model('Galeri_Model');
        
        $data = array(
            'title' => 'Table Galeri',
            'tableData' => $this->Galeri_Model->list_galeri()
        );
        
        $this->template->content->view('galeri/index', $data);
        
        // Publish the template
        $this->template->publish();
    }

    public function create() {
        $this->load->model('Galeri_Model');
        
        $data = array(
            'title' => 'Create Galeri',
            'galeriModel' => $this->Galeri_Model->create_galeri()
        );

        
        $this->template->content->view('galeri/create', $data);
        
        // Publish the template
        $this->template->publish();
    }


    public function create_save() {
        $this->load->model('Galeri_Model');
        //echo $this->input->post('tampilkan');
        $this->Galeri_Model->save($this->input->post() , $this);

        redirect('Galeri');
    }


    public function edit($id) {
        $this->load->model('Galeri_Model');

        $data = array(
            'galeriModel' => $this->Galeri_Model->get($id),
            'title' => 'Edit Galeri',
        );

        $this->template->content->view('galeri/edit', $data);
        
        // Publish the template
        $this->template->publish();
        }

    public function edit_save() {
        $this->load->model('Galeri_Model');

        $this->Galeri_Model->update($this->input->post() , $this);

        redirect('Galeri');
    }

    public function delete($id) {
        $this->load->model('Galeri_Model');

        $this->Galeri_Model->delete($id);

        redirect('Galeri');
    }

}