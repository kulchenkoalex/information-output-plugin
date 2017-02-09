<?php
/**
 * Created by PhpStorm.
 * User: Сервис
 * Date: 09.02.2017
 * Time: 10:13
 */

namespace includes\common;


class InformationOutputLoaderScript
{
    private static $instance = null;

    private function __construct(){
            // Проверяем в админке мы или нет
            if ( is_admin() ) {
                    add_action('admin_enqueue_scripts', array(&$this, 'loadScriptAdmin' ) );
                    add_action('admin_head', array(&$this, 'loadHeadScriptAdmin'));
                } else {
                    add_action( 'wp_enqueue_scripts', array(&$this, 'loadScriptSite' ) );
                    add_action('wp_head', array(&$this, 'loadHeadScriptSite'));
                    add_action( 'wp_footer', array(&$this, 'loadFooterScriptSite'));
                }

     }

    public static function getInstance(){
            if ( null == self::$instance ) {
                    self::$instance = new self;
                }
         return self::$instance;
     }

    public function loadScriptAdmin($hook){}
    public function loadHeadScriptAdmin(){}
    public function loadScriptSite($hook){}
    public function loadHeadScriptSite(){}
    public function loadFooterScriptSite(){}
}