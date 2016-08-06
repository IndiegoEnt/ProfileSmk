<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_missing_table_column extends CI_Migration {

        public function up()
        {
            //Up Migration Goes Here
            $fields = array(
                 'active' => array('type' => 'INT',
                                       'constraint' => '5',
                                       'null' => FALSE),
                 'image' => array('type' => 'VARCHAR',
                                       'constraint' => '20',
                                       'null' => FALSE)
            );
            $this->dbforge->add_column('berita', $fields); 
            $fields = array(
                 'logo' => array('type' => 'VARCHAR',
                                       'constraint' => '40',
                                       'null' => FALSE)
            );
            $this->dbforge->add_column('profile', $fields);
        }

        public function down()
        {
            //Down Migration Goes Here
        }
}