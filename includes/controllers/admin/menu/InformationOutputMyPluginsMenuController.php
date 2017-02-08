<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 09.02.2017
 * Time: 0:02
 */

namespace includes\controllers\admin\menu;


class InformationOutputMyPluginsMenuController extends InformationOutputBaseAdminMenuController
{
    public function action()
    {
        // TODO: Implement action() method.

        $pluginPage = add_plugins_page(
            __('Sub plugins Information Output', INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN),
            __('Sub plugins Information Output', INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN),
            'read',
            'information_output_control_sub_plugins_menu',
            array(&$this, 'render')
        );
    }

    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello this page Plugins", INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN);
    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}