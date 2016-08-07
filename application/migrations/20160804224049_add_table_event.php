<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_table_event extends CI_Migration {

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
                    'nama' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '32',
                            'null' => FALSE
                    ),
                    'keterangan' => array(
                            'type' => 'text',
                            'null' => FALSE
                    ),
                    'tanggal_buat' => array(
                            'type' => 'DATE',
                    ),
                    'tanggal_edit' => array(
                            'type' => 'DATE',
                    ),
                    'user_id' => array(
                            'type' => 'INT',
                            'constraint' => 5,
                    ),
                    'image' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '40',
                            'null' => FALSE
                    )
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('event');

            $this->dbforge->add_field(array(
                    'id' => array(
                            'type' => 'INT',
                            'constraint' => 5,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                    ),
                    'event_id' => array(
                            'type' => 'int',
                            'constraint' => 5,
                            'null' => FALSE
                    ),
                    'image' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '40',
                            'null' => FALSE
                    )
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('event_galery');
        }

        public function down()
        {
            //Down Migration Goes Here
        }
}