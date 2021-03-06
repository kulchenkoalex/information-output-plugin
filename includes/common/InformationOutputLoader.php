<?php

namespace includes\common;

use includes\controllers\admin\menu\InformationOutputMainAdminMenuController;
use includes\controllers\admin\menu\InformationOutputMainAdminSubMenuController;
use includes\controllers\admin\menu\InformationOutputMyDashboardMenuController;
use includes\controllers\admin\menu\InformationOutputMyPostsMenuController;
use includes\controllers\admin\menu\InformationOutputMyMediaMenuController;
use includes\controllers\admin\menu\InformationOutputMyPagesMenuController;
use includes\controllers\admin\menu\InformationOutputMyCommentsMenuController;
use includes\controllers\admin\menu\InformationOutputMyThemeMenuController;
use includes\controllers\admin\menu\InformationOutputMyPluginsMenuController;
use includes\controllers\admin\menu\InformationOutputMyUsersMenuController;
use includes\controllers\admin\menu\InformationOutputMyToolsMenuController;
use includes\controllers\admin\menu\InformationOutputMyOptionsMenuController;
use includes\controllers\site\shortcodes\InformationOutputPostsShortcodeController;
use includes\example\InformationOutputExampleAction;
use includes\controllers\admin\menu\InformationOutputContactInformationSubMenuController;
use includes\controllers\site\shortcodes\InformationOutputContactInformationShortcodesController;
use includes\ajax\InformationOutputContactInformationAjaxHandler;
use includes\widgets\InformationOutputContactInformationDashboardWidget;

class InformationOutputLoader
{
	private static $instance = null;
    private function __construct(){
        // is_admin() Условный тег. Срабатывает когда показывается админ панель сайта (консоль или любая
        // другая страница админки).
        // Проверяем в админке мы или нет
        if ( is_admin() ) {
            // Когда в админке вызываем метод admin()
            $this->admin();
        } else {
            // Когда на сайте вызываем метод site()
            $this->site();
        }
        $this->all();
    }
    public static function getInstance(){
        if ( null == self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    /**
     * Метод будет срабатывать когда вы находитесь в Админ панеле. Загрузка классов для Админ панели
     */
    public function admin(){
        InformationOutputMainAdminMenuController::newInstance();
        InformationOutputMainAdminSubMenuController::newInstance();
        InformationOutputMyDashboardMenuController::newInstance();
        InformationOutputMyPostsMenuController::newInstance();
        InformationOutputMyMediaMenuController::newInstance();
        InformationOutputMyPagesMenuController::newInstance();
        InformationOutputMyCommentsMenuController::newInstance();
        InformationOutputMyThemeMenuController::newInstance();
        InformationOutputMyPluginsMenuController::newInstance();
        InformationOutputMyUsersMenuController::newInstance();
        InformationOutputMyToolsMenuController::newInstance();
        InformationOutputMyOptionsMenuController::newInstance();
        InformationOutputContactInformationSubMenuController::newInstance();
        InformationOutputContactInformationDashboardWidget::newInstance();
    }
    /**
     * Метод будет срабатывать когда вы находитесь Сайте. Загрузка классов для Сайта
     */
    public function site(){
        InformationOutputPostsShortcodeController::newInstance();
        InformationOutputContactInformationShortcodesController::newInstance();
    }
    /**
     * Метод будет срабатывать везде. Загрузка классов для Админ панеле и Сайта
     */
    public function all(){
        InformationOutputLocalization::getInstance();
        InformationOutputLoaderScript::getInstance();
		InformationOutputExampleAction::newInstance();
        InformationOutputContactInformationAjaxHandler::newInstance();
    }

}