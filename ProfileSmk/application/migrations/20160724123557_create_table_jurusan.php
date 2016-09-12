<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_table_jurusan extends CI_Migration {

        public function up()
        {

            $fields = array(
                 'jurusan_id' => array('type' => 'INT',
                                       'constraint' => '5',
                                       'null' => FALSE)
            );
            $this->dbforge->add_column('users', $fields);
            //Up Migration Goes Here
            $this->dbforge->add_field(array(
                    'id' => array(
                            'type' => 'INT',
                            'constraint' => 5,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                    ),
                    'nama' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '20',
                    ),
                    'user_id' => array(
                            'type' => 'INT',
                            'constraint' => '5',
                            'null' => FALSE
                    ),
                    'tanggal_buat' => array(
                            'type' => 'DATE',
                    ),
                    'tanggal_edit' => array(
                            'type' => 'DATE',
                    )
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('jurusan');


        }

        public function down()
        {
            //Down Migration Goes Here
        }
}