<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {
    public function index() {
        $this->load->model('Index_Model');
        
        $template = array(
            'header' =>  $this->load->view('home/layout/header' , false, true) ,
            'nav' =>  $this->load->view('home/layout/nav' , false, true) ,
            'foot' =>  $this->load->view('home/layout/foot' , false, true) ,
            'tableData' => $this->Index_Model->profile_sekolah() ,
            'beritaData' => $this->Index_Model->berita()

        );
        $this->load->view('home/index' , $template);
    }
    public function jurusan() {
        $this->load->model('Jurusan_Model');
        $template = array(
            'header' =>  $this->load->view('home/layout/header' , false, true) ,
            'nav' =>  $this->load->view('home/layout/nav' , false, true) ,
            'foot' =>  $this->load->view('home/layout/foot' , false, true) ,
            'tableData' => $this->Jurusan_Model->isi_jurusan_home()
        );
        $this->load->view('home/jurusan' , $template);
    }
    public function ekskul() {
        $this->load->model('Ekskul_Model');
        $template = array(
            'header' =>  $this->load->view('home/layout/header' , false, true) ,
            'nav' =>  $this->load->view('home/layout/nav' , false, true) ,
            'foot' =>  $this->load->view('home/layout/foot' , false, true) ,
            'tableData' => $this->Ekskul_Model->list_ekskul_home() 
        );
        $this->load->view('home/ekskul' , $template);
    }
    public function berita() {
        $this->load->model('Berita_Model');
        $template = array(
            'header' =>  $this->load->view('home/layout/header' , false, true) ,
            'nav' =>  $this->load->view('home/layout/nav' , false, true) ,
            'foot' =>  $this->load->view('home/layout/foot' , false, true) ,
            'tableData' => $this->Berita_Model->list_berita_home() 
        );
        $this->load->view('home/berita' , $template);
    }
    public function view_berita_home($id) {
        $this->load->model('Berita_Model');
        $this->load->model('jurusan_model');
        $this->load->model('Kategori_Model');
        $template = array(
            'header' =>  $this->load->view('home/layout/header' , false, true) ,
            'nav' =>  $this->load->view('home/layout/nav' , false, true) ,
            'foot' =>  $this->load->view('home/layout/foot' , false, true) ,
            'title' => 'Edit User',
            'jurusans' => $this->jurusan_model->list_jurusan(),
            'kategoris' => $this->Kategori_Model->list_jurusan_by_berita_id($id),
            'template' => $this->template->content->view('home/layout/berita/view_berita', array(
                    'backUrl' => base_url()."home/berita",
                    'beritaModel' => $this->Berita_Model->get($id)
            ) , true)
        );

        $this->load->view('home/view_berita_home', $template);
       
    }
    public function view_event_home($id) {
        $this->load->model('Event_Model');
        $template = array(
            'header' =>  $this->load->view('home/layout/header' , false, true) ,
            'nav' =>  $this->load->view('home/layout/nav' , false, true) ,
            'foot' =>  $this->load->view('home/layout/foot' , false, true) ,
            'title' => 'Event',
            'template' => $this->template->content->view('home/layout/event/view_event', array(
                    'backUrl' => base_url()."home/event",
                    'eventModel' => $this->Event_Model->get($id)
            ) , true)
        );

        $this->load->view('home/view_event_home', $template);
       
    }
    public function galery() {
        $this->load->model('Galeri_Model');
        $template = array(
            'header' =>  $this->load->view('home/layout/header' , false, true) ,
            'nav' =>  $this->load->view('home/layout/nav' , false, true) ,
            'foot' =>  $this->load->view('home/layout/foot' , false, true) ,
            'galeriModel' => $this->Galeri_Model->list_galeri_home(),
        );
        $this->load->view('home/galery' , $template);
    }
     public function event() {
        $this->load->model('Event_Model');
        $template = array(
            'header' =>  $this->load->view('home/layout/header' , false, true) ,
            'nav' =>  $this->load->view('home/layout/nav' , false, true) ,
            'foot' =>  $this->load->view('home/layout/foot' , false, true) ,
            'tableData' => $this->Event_Model->list_event()
        );
        $this->load->view('home/event' , $template);
    }
    public function sarana() {
        $template = array(
            'header' =>  $this->load->view('home/layout/header' , false, true) ,
            'nav' =>  $this->load->view('home/layout/nav' , false, true) ,
            'foot' =>  $this->load->view('home/layout/foot' , false, true) 
        );
        $this->load->view('home/sarana' , $template);
    }
    public function kontak() {
        $template = array(
            'header' =>  $this->load->view('home/layout/header' , false, true) ,
            'nav' =>  $this->load->view('home/layout/nav' , false, true) ,
            'foot' =>  $this->load->view('home/layout/foot' , false, true) 
        );
        $this->load->view('home/kontak' , $template);
    }
   
    
}