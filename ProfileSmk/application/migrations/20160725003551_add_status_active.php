<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_status_active extends CI_Migration {

        public function up()
        {
            //Up Migration Goes Here
            $fields = array(
                 'active' => array('type' => 'INT',
                                       'constraint' => '5',
                                       'null' => FALSE)
            );
            $this->dbforge->add_column('users', $fields);
            $fields = array(
                 'active' => array('type' => 'INT',
                                       'constraint' => '5',
                                       'null' => FALSE)
            );
            $this->dbforge->add_column('jurusan', $fields);
            
        }

        public function down()
        {
            //Down Migration Goes Here
        }
}