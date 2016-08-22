<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Update_lengh_image extends CI_Migration {

        public function up()
        {
            //Up Migration Goes Here
            $fields = array(
                'image' => array('type' => 'VARCHAR',
                                       'constraint' => '40',
                                       'null' => FALSE)
            );
            $this->dbforge->modify_column('berita', $fields);
            $fields = array(
                'logo' => array('type' => 'VARCHAR',
                                       'constraint' => '40',
                                       'null' => FALSE)
            );
            $this->dbforge->modify_column('profile', $fields);
        }

        public function down()
        {
            //Down Migration Goes Here
        }
}