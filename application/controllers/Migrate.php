<?php

class Migrate extends CI_Controller
{

        public function up()
        {
                $this->load->library('migration');

                if ($this->migration->current() === FALSE)
                {
                        show_error($this->migration->error_string());
                }
        }

        public function make($name)
        {
            try{
                date_default_timezone_set('Asia/Bangkok');
                $timestamp = date("YmdHis");

                $template_file = fopen("application/cli_templates/migrationTemplate", "r") or die("Unable to open file!");
                $template_file_data = fread($template_file,filesize("application/cli_templates/migrationTemplate"));
                $template_file_data = str_replace("{{migration_name}}",ucfirst($name),$template_file_data);
                $content = $template_file_data;
                $fp = fopen('application/migrations/'.$timestamp."_".$name.'.php', "w");
                fwrite($fp,$content);
                fclose($template_file);
                echo ("Migration Created");
                
                $configuration_file = fopen("application/cli_templates/migrationConfigurationTemplate", "r") or die("Unable to open file!");

                $configuration_file_data = fread($configuration_file,filesize("application/cli_templates/migrationConfigurationTemplate"));
                
                
                $configuration_file_data = str_replace("{{migration_version}}" , '$config[\'migration_version\'] = \''.$timestamp.'\'; ' , $configuration_file_data);
                if ($h = fopen("application/config/migration.php", 'w')) {
                    if (fwrite($h, $configuration_file_data)) {
                        $response = 1;
                    }
                    fclose($h);
                }
                



            }catch(Exception $error){
                print_r($error);
            }
        }

        
}