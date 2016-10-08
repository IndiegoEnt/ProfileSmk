<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Event extends CI_Controller {

    function __construct(){
		parent::__construct();
        if(!$this->session->userdata('logged_in')){
            redirect('Auth');
        }
	}
    
    public function index() {
        $this->load->model('Event_Model');
        
        $data = array(
            'title' => 'Table Event',
            'tableData' => $this->Event_Model->list_event()
        );
        
        $this->template->content->view('event/index', $data);
        
        // Publish the template
        $this->template->publish();
    }

    public function create() {

        
        $this->load->model('Event_Model');
        $this->load->model('Jurusan_Model');
        
        $data = array(
            'title' => 'Create User',
            'userModel' => $this->Event_Model->create_model(),
            'jurusans' => $this->Jurusan_Model->list_jurusan(),
            'role' => $this->session->userdata('role') 
        );

        

        $this->template->content->view('event/create', $data);
        
        // Publish the template
        $this->template->publish();
    }


    public function create_save() {
       
        $this->load->model('Event_Model');

        $this->Event_Model->save($this->input->post() , $this);

        // $this->save_to_galery($this->input->post() , $this);


        redirect('Event');
    }

    public function save_to_galery($post, $post2)
    {
        $this->load->model('Galeri_Model');
        //echo $this->input->post('tampilkan');
        $this->Galeri_Model->save($post , $post2);
    }

    public function edit($id) {
        $this->load->model('Event_Model');
        $this->load->model('Jurusan_Model');
        $this->load->model('Kategori_Model');

        $data = array(
            'eventModel' => $this->Event_Model->get($id),
            'title' => 'Edit User',
            'jurusans' => $this->Jurusan_Model->list_jurusan(),
            'event_galery' =>$this->Event_Model->getGaleryFromEvent($id),
            'role' => $this->session->userdata('role') 
        );

        $this->template->content->view('event/edit', $data);
        
        // Publish the template
        $this->template->publish();
    }

    public function view($id) {
        $this->load->model('Event_Model');
        $this->load->model('Jurusan_Model');

        $data = array(
            'eventModel' => $this->Event_Model->get($id),
            'title' => 'Edit User',
            'jurusans' => $this->Jurusan_Model->list_jurusan(),
            'event_galery' =>$this->Event_Model->getGaleryFromEvent($id),
            'eventGaleryModel' => $this->Event_Model->getGaleryFromEvent($id),
            'backUrl' => base_url()."event/",
            'adminView' => true
        );

        $this->template->content->view('home/layout/event/view_event', $data);
        
        // Publish the template
        $this->template->publish();
    }

    public function edit_save() {
        $this->load->model('Event_Model');

        $this->Event_Model->update($this->input->post() , $this);

        redirect('Event');
    }

    public function delete($id) {
        $this->load->model('Event_Model');

        $this->Event_Model->delete($id);

        redirect('Event');
    }
}