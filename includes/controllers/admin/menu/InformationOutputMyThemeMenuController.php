<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 08.02.2017
 * Time: 23:58
 */

namespace includes\controllers\admin\menu;


class InformationOutputMyThemeMenuController extends InformationOutputBaseAdminMenuController
{
    public function action()
    {
        // TODO: Implement action() method.

        $pluginPage = add_theme_page(
            __('Sub theme Information Output', INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN),
            __('Sub theme Information Output', INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN),
            'read',
            'information_output_control_sub_theme_menu',
            array(&$this, 'render')
        );
    }

    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello this page Theme", INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN);
    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}