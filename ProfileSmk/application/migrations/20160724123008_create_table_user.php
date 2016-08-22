<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_table_user extends CI_Migration {

        public function up()
        {
            $this->dbforge->add_field(array(
                    'id' => array(
                            'type' => 'INT',
                            'constraint' => 5,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                    ),
                    'username' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '20',
                    ),
                    'password' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '32',
                            'null' => FALSE
                    ),
                    'nama' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '100',
                    ),
                    'tanggal_buat' => array(
                            'type' => 'DATE',
                    ),
                    'tanggal_edit' => array(
                            'type' => 'DATE',
                    )
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('users');
        }

        public function down()
        {
            //Down Migration Goes Here
            $this->dbforge->drop_table('users');
        }
}