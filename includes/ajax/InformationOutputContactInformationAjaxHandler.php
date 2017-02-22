<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 22.02.2017
 * Time: 22:58
 */

namespace includes\ajax;


use includes\controllers\admin\menu\InformationOutputICreatorInstance;

class InformationOutputContactInformationAjaxHandler implements InformationOutputICreatorInstance
{

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }

    // Переопределим конструктор
    public function __construct(){
        // Вызов конструктора класса InformationOutputShortcodesController
        // Чтобы прикрепить функцию к действию add_action( 'wp_loaded',  array( &$this, 'initShortcode') );
        parent::__construct();

        // подключаем AJAX обработчики, только когда в этом есть смысл
        if( defined('DOING_AJAX') && DOING_AJAX ){
            add_action('wp_ajax_contact_information', array( &$this, 'ajaxHandler'));
            add_action('wp_ajax_nopriv_contact_information',  array( &$this, 'ajaxHandler'));
        }
        // Переменная ajaxurl
    }
    /**
     * Обработчик для ajax действия guest_book (wp_ajax_contact_information, wp_ajax_nopriv_contact_information)
     */
    public function ajaxHandler(){

    }

}