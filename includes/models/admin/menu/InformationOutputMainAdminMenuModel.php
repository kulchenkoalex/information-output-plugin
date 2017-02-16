<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 16.02.2017
 * Time: 11:51
 */

namespace includes\models\admin\menu;

use includes\controllers\admin\menu\InformationOutputICreatorInstance;


class InformationOutputMainAdminMenuModel implements InformationOutputICreatorInstance
{
    public function __construct(){
                add_action( 'admin_init', array( &$this, 'createOption' ) );

            }

    /**
     * Регистрировать опции
     * Добавлять поля опции
     * Добавлять секции опции

     */
    public function createOption()
     {
         // register_setting( $option_group, $option_name, $sanitize_callback );
         // Регистрирует новую опцию
         register_setting('InformationOutputMainSettings', INFORMATIONOUTPUT_PlUGIN_OPTION_NAME, array(&$this, 'saveOption'));
        // add_settings_section( $id, $title, $callback, $page );
        // Добавление секции опций
        add_settings_section( 'information_output_account_id', __('Account', INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN), '', 'information_output_main' );
     }

    /**
     * Сохранение опции
     * @param $input
     */
    public function saveOption($input)
     {
         return $input;

     }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
                return $instance;
    }
}