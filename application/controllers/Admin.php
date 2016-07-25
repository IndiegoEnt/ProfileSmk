<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function index() {
        
        $this->template->content->view('dashboard/index', array('title' => 'Hello, world!'));
        
        // Publish the template
        $this->template->publish();
    }
}