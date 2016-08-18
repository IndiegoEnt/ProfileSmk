<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Agenda extends CI_Controller {

    function __construct(){
        parent::__construct();
        if(!$this->session->userdata('logged_in')){
            redirect('Auth');
        }else if($this->session->userdata('role') != 'ROLE_ADMIN'){
            redirect('Admin');
        }
    }
    
    public function index() {
        $this->load->model('Agenda_Model');
        
        $data = array(
            'title' => 'Table Agenda',
            'tableData' => $this->Agenda_Model->list_agenda()
        );
        
        $this->template->content->view('agenda/index', $data);
        
        // Publish the template
        $this->template->publish();
    }
    
    /*
    public function listJson() {
        $this->load->model('Agenda_Model');
        echo(json_encode($this->Agenda_Model->list_agenda()));
    }
    */

    public function create() {
        $this->load->model('Agenda_Model');
        
        $data = array(
            'title' => 'Create Agenda',
            'agendaModel' => $this->Agenda_Model->create_model()
        );

        

        $this->template->content->view('agenda/create', $data);
        
        // Publish the template
        $this->template->publish();
    }

    public function create_save() {
        $this->load->model('Agenda_Model');

        $this->Agenda_Model->save($this->input->post());

        redirect('Agenda');
    }


    public function edit($id) {
        $this->load->model('Agenda_Model');

        $data = array(
            'agendaModel' => $this->Agenda_Model->get($id),
            'title' => 'Edit Agenda',
        );

        $this->template->content->view('agenda/edit', $data);
        
        // Publish the template
        $this->template->publish();
    }


    public function edit_save() {
        $this->load->model('Agenda_Model');

        $this->Agenda_Model->update($this->input->post());

        redirect('Agenda');
    }
    
    public function delete($id) {
        $this->load->model('Agenda_Model');

        $this->Agenda_Model->delete($id);

        redirect('Agenda');
    }
}