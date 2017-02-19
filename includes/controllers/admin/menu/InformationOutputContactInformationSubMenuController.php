<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 19.02.2017
 * Time: 22:35
 */

namespace includes\controllers\admin\menu;


class InformationOutputContactInformationSubMenuController extends InformationOutputBaseAdminMenuController
{
    public function action()
    {
        // TODO: Implement action() method.
        //Добавление пункта меню
        $pluginPage = add_submenu_page(
            INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN,
            _x(
                'Contact information',
                'admin menu page' ,
                INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN
            ),
            _x(
                'Contact information',
                'admin menu page' ,
                INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN
            ),
            'manage_options',
            information_output_control_contact_information_menu,
            array(&$this, 'render'));
    }

    public function render()
    {
        // TODO: Implement render() method.
    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}