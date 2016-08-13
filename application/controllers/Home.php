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
        $this->load->model('Index_Model');
        $this->load->model('Jurusan_Model');
        $template = array(
            'header' =>  $this->load->view('home/layout/header' , false, true) ,
            'nav' =>  $this->load->view('home/layout/nav' , false, true) ,
            'foot' =>  $this->load->view('home/layout/foot' , false, true) ,
            'tableData' => $this->Jurusan_Model->list_jurusan() ,
            'isiData' => $this->Index_Model->profile_sekolah()
        );
        $this->load->view('home/jurusan' , $template);
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