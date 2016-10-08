<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_galery_type_in_galery extends CI_Migration {

        public function up()
        {
            
            $fields = array(
                'galery_type' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 20,
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