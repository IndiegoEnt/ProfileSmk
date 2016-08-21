<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Change_tanggal_di_agenda_jadi_date extends CI_Migration {

        public function up()
        {
            //Up Migration Goes Here
            $fields = array(
                'tanggal' => array(
                            'type' => 'date',
                            'null' => true
                    ),
                
            );
            $this->dbforge->modify_column('agenda', $fields); 
            
        }

        public function down()
        {
            //Down Migration Goes Here
        }
}