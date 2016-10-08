<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_event_id_in_galery extends CI_Migration {

        public function up()
        {
            $this->dbforge->drop_column('galeri', 'event_type');

            $fields = array(
                'event_id' => array(
                        'type' => 'int',
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