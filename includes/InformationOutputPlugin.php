<?php
namespace includes;

use includes\common\InformationOutputDefaultOption;
use includes\common\InformationOutputLoader;
use includes\custom_post_type\AutoPostType;
use includes\models\admin\menu\InformationOutputContactInformationSubMenuModel;

class InformationOutputPlugin
{
 private static $instance = null;
    private function __construct() {
        InformationOutputLoader::getInstance();
        add_action('plugins_loaded', array(&$this, 'setDefaultOptions'));

        // Создаем Custom Post Type Book
        new AutoPostType();
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
            if( !get_option(INFORMATIONOUTPUT_PlUGIN_OPTION_NAME) ){
                    update_option(INFORMATIONOUTPUT_PlUGIN_OPTION_NAME, InformationOutputDefaultOption::getDefaultOptions() );
                }
         if( !get_option(INFORMATIONOUTPUT_PlUGIN_OPTION_VERSION) ){
                    update_option(INFORMATIONOUTPUT_PlUGIN_OPTION_VERSION, INFORMATIONOUTPUT_PlUGIN_VERSION);
                }
     }

	
	   static public function activation()
    {
        // debug.log
        error_log('plugin '.INFORMATIONOUTPUT_PlUGIN_NAME.' activation');
        InformationOutputContactInformationSubMenuModel::createTable();
    }
	
	static public function deactivation()
     {
         // debug.log
         error_log('plugin '.INFORMATIONOUTPUT_PlUGIN_NAME.' deactivation');
         delete_option(INFORMATIONOUTPUT_PlUGIN_OPTION_NAME);
                 delete_option(INFORMATIONOUTPUT_PlUGIN_OPTION_VERSION);
     }
 
}
InformationOutputPlugin::getInstance();
