<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_table_guru extends CI_Migration {

        public function up()
        {
           $this->dbforge->add_field(array(
                    'id' => array(
                            'type' => 'INT',
                            'constraint' => 5,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                    ),
                    'nip' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '30',
                            'null' => FALSE
                    ),
                    'nama' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '40',
                            'null' => TRUE
                    ),
                    'pelajaran' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '32',
                            'null' => FALSE
                    ),
                    'jabatan' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '32',
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
            $this->dbforge->create_table('guru');
        }

        public function down()
        {
            //Down Migration Goes Here
        }
}