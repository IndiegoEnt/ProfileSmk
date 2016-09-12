<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Seed_user extends CI_Migration {

        public function up()
        {
            //Up Migration Goes Here

            $this->db->query("INSERT INTO `users`(
                `username`,
                `password`,
                `nama`,
                `tanggal_buat`,
                `tanggal_edit`,
                `jurusan_id`,
                `active`
            ) VALUES (
                'admin',
                '21232f297a57a5a743894a0e4a801fc3',
                'admin',
                '2001-11-00',
                '2001-11-00',
                1,
                1
            );
            ");   
        }

        public function down()
        {
            //Down Migration Goes Here
        }
}