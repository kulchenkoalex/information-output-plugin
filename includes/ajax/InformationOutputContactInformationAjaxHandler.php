<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 22.02.2017
 * Time: 22:58
 */

namespace includes\ajax;


use includes\controllers\admin\menu\InformationOutputICreatorInstance;
use includes\models\admin\menu\InformationOutputContactInformationSubMenuModel;

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
        //parent::__construct();

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
        error_log('ajaxHandler');
        // Проверка наличия данных
        if ($_POST){
            //Добавляем данные
            $id = InformationOutputConatctInformationSubMenuModel::insert(array(
                'user_name' => $_POST['user_name'],
                'user_surname' => $_POST['user_surname'],
                'phone_number' => $_POST['phone_number'],
                'date_add' => time(), // time() стандартная php функция получения времени
                'about_myself' => $_POST['about_myself']
            ));
            $return = array(
                'message'   => 'Сохранено',
                'ID'        => $id
            );
            // Возвращаем ответ
            wp_send_json_success( $return );
        }
        wp_send_json_error();
        wp_die();
    }

}