<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {
    public function index() {
        $this->load->model('Index_Model');
        $isi = $this->Index_Model->profile_sekolah();
        $template = array(
            'header' =>  $this->load->view('home/layout/header' , false, true) ,
            'nav' =>  $this->load->view('home/layout/nav' , false, true) ,
            'foot' =>  $this->load->view('home/layout/foot' , false, true) 

        );
        $this->load->view('home/index' , $template , $isi);
    }
    public function jurusan() {
        $template = array(
            'header' =>  $this->load->view('home/layout/header' , false, true) ,
            'nav' =>  $this->load->view('home/layout/nav' , false, true) ,
            'foot' =>  $this->load->view('home/layout/foot' , false, true) 
        );
        $this->load->view('home/jurusan' , $template);
    }
    public function berita() {
        $template = array(
            'header' =>  $this->load->view('home/layout/header' , false, true) ,
            'nav' =>  $this->load->view('home/layout/nav' , false, true) ,
            'foot' =>  $this->load->view('home/layout/foot' , false, true) 
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