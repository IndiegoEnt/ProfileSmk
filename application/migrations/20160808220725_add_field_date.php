<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_field_date extends CI_Migration {

        public function up()
        {
            //Up Migration Goes Here
            $fields = array(
                'tanggal_buat' => array(
                        'type' => 'DATE',
                ),
                'tanggal_edit' => array(
                        'type' => 'DATE',
                ),
                'user_id' => array(
                        'type' => 'INT',
                        'constraint' => 5,
                )
            );
            $this->dbforge->modify_column('galery', $fields);
        }

        public function down()
        {
            //Down Migration Goes Here
        }
}