<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_role_to_user extends CI_Migration {

        public function up()
        {
            //Up Migration Goes Here
            $fields = array(
                 'role' => array('type' => 'VARCHAR',
                                       'constraint' => '20',
                                       'null' => FALSE)
            );
            $this->dbforge->add_column('users', $fields);
        }

        public function down()
        {
            //Down Migration Goes Here
        }
}