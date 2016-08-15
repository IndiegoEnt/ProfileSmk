<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_active_in_event extends CI_Migration {

        public function up()
        {
            //Up Migration Goes Here
            $fields = array(
                'event_type' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '20',
                        'null' => FALSE
                ),
                'jurusan_id' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '32',
                        'null' => TRUE
                ),
                'active' => array(
                        'type' => 'INT',
                        'constraint' => 5,
                )
            );
            $this->dbforge->add_column('event', $fields);
        }

        public function down()
        {
            //Down Migration Goes Here
        }
}