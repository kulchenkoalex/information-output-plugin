<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 08.02.2017
 * Time: 22:51
 */

namespace includes\controllers\admin\menu;


class InformationOutputMainAdminSubMenuController extends InformationOutputBaseAdminMenuController
{

    public function action()
    {
        // TODO: Implement action() method.
        $plugin_page = add_submenu_page(
            INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN,
            _x(
                'Sub Information Output',
                'admin menu page' ,
                INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN
            ),
            _x(
                'Sub Information Output',
                'admin menu page' ,
                INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN
            ),
            'manage_options',
            'information_output_control_sub_menu',
            array(&$this, 'render'));
    }

    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello world sub menu", INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN);
    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}