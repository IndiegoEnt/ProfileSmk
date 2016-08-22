<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategori extends CI_Controller {

    function __construct(){
		parent::__construct();
        if(!$this->session->userdata('logged_in')){
            redirect('Auth');
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
    
    public function listJson() {
        $this->load->model('Kategori_Model');
        echo(json_encode($this->Kategori_Model->list_kategori()));
    }

    public function create() {
        $this->load->model('Kategori_model');
        
        $data = array(
            'title' => 'Create Kategori',
            'kategoriModel' => $this->Kategori_model->create_model()
        );

        

        $this->template->content->view('kategori/create', $data);
        
        // Publish the template
        $this->template->publish();
    }

    public function create_save() {
        $this->load->model('Kategori_model');

        $this->Kategori_model->save($this->input->post());

        redirect('Kategori');
    }

    public function edit($id) {
        $this->load->model('Kategori_model');

        $data = array(
            'kategoriModel' => $this->Kategori_model->get($id),
            'title' => 'Edit Kategori',
        );

        $this->template->content->view('kategori/edit', $data);
        
        // Publish the template
        $this->template->publish();
    }

     public function edit_save() {
        $this->load->model('Kategori_model');

        $this->Kategori_model->update($this->input->post());

        redirect('Kategori');
    }

    public function delete($id) {
        $this->load->model('Kategori_Model');

        $this->Kategori_Model->delete($id);

        redirect('Kategori');
    }
}