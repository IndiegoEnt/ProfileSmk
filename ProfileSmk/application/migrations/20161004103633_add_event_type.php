<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_event_type extends CI_Migration {

        public function up()
        {
            $fields = array(
                'event_type' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 5,
                )
            );
            $this->dbforge->add_column('galeri', $fields);
            //Up Migration Goes Here
        }

        public function down()
        {
            //Down Migration Goes Here
        }
}