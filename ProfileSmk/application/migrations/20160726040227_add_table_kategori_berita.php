<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_table_kategori_berita extends CI_Migration {

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
                            'constraint' => '20',
                            'null' => FALSE
                    ),
                    'keterangan' => array(
                            'type' => 'TEXT',
                            'null' => TRUE
                    )
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('kategori');
        }

        public function down()
        {
            //Down Migration Goes Here
        }
}