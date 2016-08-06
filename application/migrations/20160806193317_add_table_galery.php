<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_table_galery extends CI_Migration {

        public function up()
        {
            //Up Migration Goes Her
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
                    'tampilkan' => array(
                            'type' => 'int',
                            'null' => true
                    ),
                    'active' => array(
                            'type' => 'int',
                            'null' => true
                    ),
                    'image' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '40',
                            'null' => FALSE
                    )
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('galery');
        }

        public function down()
        {
            //Down Migration Goes Here
        }
}