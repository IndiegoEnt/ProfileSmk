<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
    public function index() {
        // Set the title
        $this->template->title = 'Welcome!';
        
        // Dynamically add a css stylesheet
        $this->template->stylesheet->add('http://twitter.github.com/bootstrap/assets/css/bootstrap.css');
        
        
        // Set a partial's content
        $this->template->footer = 'Made with Twitter Bootstrap';
        
        // Publish the template
        $this->template->publish();
    }
}