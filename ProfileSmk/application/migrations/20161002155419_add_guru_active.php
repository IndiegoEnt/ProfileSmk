<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_guru_active extends CI_Migration {

        public function up()
        {
            $fields = array(
                'active' => array(
                        'type' => 'INT',
                        'constraint' => 5,
                )
            );
            $this->dbforge->add_column('guru', $fields);
        }

        public function down()
        {
            //Down Migration Goes Here
        }
}