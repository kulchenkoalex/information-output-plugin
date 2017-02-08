<?php
namespace includes;

use includes\common\InformationOutputLoader;

class InformationOutputPlugin
{
 private static $instance = null;
    private function __construct() {
        InformationOutputLoader::getInstance();
    }
    public static function getInstance() {

        if ( null == self::$instance ) {
            self::$instance = new self;
        }

        return self::$instance;

    }
	
	   static public function activation()
    {
        // debug.log
        error_log('plugin '.INFORMATIONOUTPUT_PlUGIN_NAME.' activation');
    }
	
	static public function deactivation()
     {
         // debug.log
         error_log('plugin '.INFORMATIONOUTPUT_PlUGIN_NAME.' deactivation');
     }
 
}
InformationOutputPlugin::getInstance();
