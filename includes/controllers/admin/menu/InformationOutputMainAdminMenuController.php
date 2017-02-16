<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 08.02.2017
 * Time: 21:42
 */

namespace includes\controllers\admin\menu;


class InformationOutputMainAdminMenuController extends InformationOutputBaseAdminMenuController
{

    public function action()
    {
        // TODO: Implement action() method.
        /**
         * add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
         *
         */
        $pluginPage = add_menu_page(
            _x(
                'Information Output',
                'admin menu page' ,
                INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN
            ),
            _x(
                'Information Output',
                'admin menu page' ,
                INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN
            ),
            'manage_options',
            INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN,
            array(&$this,'render'),
            INFORMATIONOUTPUT_PlUGIN_URL .'assets/images/main-menu.png'
        );
    }

    /**
     * Метод отвечающий за контент страницы
     */
    public function render()
    {
        // TODO: Implement render() method.
        //_e("Hello world", INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN);
        //var_dump($reuestAPI->getNewPosts('', ''));*/
                $pathView = INFORMATIONOUTPUT_PlUGIN_DIR."/includes/views/admin/menu/InformationOutputMainAdminMenuView.php";
                $this->loadView($pathView);
    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }

}