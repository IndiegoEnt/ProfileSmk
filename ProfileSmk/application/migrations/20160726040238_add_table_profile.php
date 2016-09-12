<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_table_profile extends CI_Migration {

        public function up()
        {
            //Up Migration Goes Here
            $this->dbforge->add_field(array(
                    'id' => array(
                            'type' => 'INT',
                            'constraint' => 5,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                    ),
                    'profile_type' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '20',
                            'null' => FALSE
                    ),
                    'jurusan_id' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '32',
                            'null' => TRUE
                    ),
                    'isi' => array(
                            'type' => 'text',
                            'null' => FALSE
                    ),'tanggal_buat' => array(
                            'type' => 'DATE',
                    ),
                    'tanggal_edit' => array(
                            'type' => 'DATE',
                    ),
                    'user_id' => array(
                            'type' => 'INT',
                            'constraint' => 5,
                    )
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('profile');

            
        }

        public function down()
        {
            //Down Migration Goes Here
        }
}