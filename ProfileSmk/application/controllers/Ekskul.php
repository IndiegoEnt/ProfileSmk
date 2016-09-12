<?php   
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ekskul extends CI_Controller {

    function __construct(){
		parent::__construct();
        if(!$this->session->userdata('logged_in')){
            redirect('Auth');
        }else if($this->session->userdata('role') != 'ROLE_ADMIN'){
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

    public function create() {
        $this->load->model('Ekskul_Model');
        $this->load->model('Jurusan_Model');
        
        $data = array(
            'title' => 'Create Ekskul',
            'ekskulModel' => $this->Ekskul_Model->create_model(),
            'jurusans' => $this->Jurusan_Model->list_jurusan()
        );

        

        $this->template->content->view('ekskul/create', $data);
        
        // Publish the template
        $this->template->publish();
    }

    public function create_save() {
        $this->load->model('Ekskul_Model');

        $this->Ekskul_Model->save($this->input->post());

        redirect('Ekskul');
    }

    public function edit($id) {
        $this->load->model('Ekskul_Model');
        $this->load->model('Jurusan_Model');

        $data = array(
            'ekskulModel' => $this->Ekskul_Model->get($id),
            'title' => 'Edit Ekskul',
            'jurusans' => $this->Jurusan_Model->list_jurusan()
        );

        $this->template->content->view('ekskul/edit', $data);
        
        // Publish the template
        $this->template->publish();
    }

    public function edit_save() {
        $this->load->model('Ekskul_Model');

        $this->Ekskul_Model->update($this->input->post() , $this);

        redirect('Ekskul');
    }

    public function delete($id) {
        $this->load->model('Ekskul_Model');

        $this->Ekskul_Model->delete($id);

        redirect('Ekskul');
    }
}