<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 09.02.2017
 * Time: 0:09
 */

namespace includes\controllers\admin\menu;


class InformationOutputMyToolsMenuController extends InformationOutputBaseAdminMenuController
{
    public function action()
    {
        // TODO: Implement action() method.

        $pluginPage = add_management_page(
            __('Sub tools Information Output', INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN),
            __('Sub tools Information Output', INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN),
            'read',
            'information_output_control_sub_tools_menu',
            array(&$this, 'render')
        );
    }

    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello this page Tools", INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN);
    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}