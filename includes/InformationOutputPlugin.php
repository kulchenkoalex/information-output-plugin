<?php
namespace includes;

use includes\common\InformationOutputDefaultOption;
use includes\common\InformationOutputLoader;

class InformationOutputPlugin
{
 private static $instance = null;
    private function __construct() {
        InformationOutputLoader::getInstance();
        add_action('plugins_loaded', array(&$this, 'setDefaultOptions'));
    }
    public static function getInstance() {

        if ( null == self::$instance ) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
    +     * Если не созданные настройки установить по умолчанию
    +     */
    public function setDefaultOptions(){
            if( ! get_option(INFORMATIONOUTPUT_PlUGIN_OPTION_NAME) ){
                    update_option(INFORMATIONOUTPUT_PlUGIN_OPTION_NAME, InformationOutputDefaultOption::getDefaultOptions() );
                }
         if( ! get_option(INFORMATIONOUTPUT_PlUGIN_OPTION_VERSION) ){
                    update_option(INFORMATIONOUTPUT_PlUGIN_OPTION_VERSION, INFORMATIONOUTPUT_PlUGIN_VERSION);
                }
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
