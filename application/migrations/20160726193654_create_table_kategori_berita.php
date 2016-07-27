<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_table_kategori_berita extends CI_Migration {

         public function up()
        {
            $this->dbforge->add_field(array(
                    'id' => array(
                            'type' => 'INT',
                            'constraint' => 5,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                    ),
                    'kategori_nama' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '20',
                    ),
                    'kategori_keterangan' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '100',
                            'null' => FALSE
                    )
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('kategori_berita');
        }

        public function down()
        {
            //Down Migration Goes Here
            $this->dbforge->drop_table('kategori_berita');
        }
}