<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Change_nullablle extends CI_Migration {

        public function up()
        {
            //Up Migration Goes Here
            $fields = array(
                'jurusan_id' => array('type' => 'INT',
                    'constraint' => '5',
                    'null' => true)
            );
            $this->dbforge->modify_column('users', $fields);
        }

        public function down()
        {
            //Down Migration Goes Here
        }
}