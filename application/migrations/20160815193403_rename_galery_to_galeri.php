<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Rename_galery_to_galeri extends CI_Migration {

        public function up()
        {
            //Up Migration Goes Here
            $this->dbforge->rename_table('galery', 'galeri');
        }

        public function down()
        {
            //Down Migration Goes Here
        }
}