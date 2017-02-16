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
        add_settings_section( 'information_output_account_section_id', __('Account', INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN), '', 'information_output_main' );
         // add_settings_field( $id, $title, $callback, $page, $section, $args );
         // Добавление полей опций
         add_settings_field(
             'information_output_token_field_id',
             __('Token', INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN),
             array(&$this, 'tokenField'),
             'information_output_main',
             'information_output_account_section_id'
                 );
         add_settings_field(
             'information_output_marker_field_id',
             __('Marker', INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN),
             array(&$this, 'tokenMarker'),
             'information_output_main',
             'information_output_account_section_id'
         );
     }

    public function tokenField(){
        $option = get_option(INFORMATIONOUTPUT_PlUGIN_OPTION_NAME);
        ?>
        <input type="text"
               name="<?php echo INFORMATIONOUTPUT_PlUGIN_OPTION_NAME; ?>[account][token]"
               value="<?php echo esc_attr( $option['account']['token'] ) ?>" />
        <?php
     }
    public function markerField(){
        $option = get_option(INFORMATIONOUTPUT_PlUGIN_OPTION_NAME);
        ?>
        <input type="text"
               name="<?php echo INFORMATIONOUTPUT_PlUGIN_OPTION_NAME; ?>[account][marker]"
               value="<?php echo esc_attr( $option['account']['marker'] ) ?>" />
        <?php
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