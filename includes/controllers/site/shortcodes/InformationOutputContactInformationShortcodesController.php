<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 22.02.2017
 * Time: 19:46
 */

namespace includes\controllers\site\shortcodes;

use includes\controllers\admin\menu\InformationOutputICreatorInstance;

class InformationOutputContactInformationShortcodesController extends InformationOutputShortcodesController
     implements InformationOutputICreatorInstance
{
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
     * Обработчик для ajax действия guest_book (wp_ajax_guest_book, wp_ajax_nopriv_guest_book)
     */
    public function ajaxHandler(){

        }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }

    /**
     * Функция в которой будем добалять шорткоды через функцию add_shortcode( $tag , $func );
     * @return mixed
     */
    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        //этот шорткод будет добалять форму для добавления данных
         add_shortcode( 'information_output_contact_information', array(&$this, 'action'));
    }

    /**
     * Функция обработки шоткода
     * Функция указанная в параметре $func, получает 3 параметра, каждый из них может быть передан,
     * а может нет:
     * $atts(массив)
     *      Ассоциативный массив атрибутов указанных в шоткоде. По умолчанию пустая строка - атрибуты
     *      не переданы.
     *      По умолчанию: ''
     * $content(строка)
     *      Текст шоткода, когда используется закрывающая конструкция шотркода: [foo]текст шорткода[/foo]
     *      По умолчанию: ''
     * $tag(строка)
     *      Тег шорткода. Может пригодится для передачи в доп. функции. Пр: если шорткод - [foo],
     *      то тег будет - foo.
     *      По умолчанию: текущий тег
     * @param array $atts
     * @param string $content
     * @param string $tag
     * @return mixed
     */
    public function action($atts = array(), $content = '', $tag = '')
    {
        // TODO: Implement action() method.
        return $this->render(array());
    }

    /**
     * Функция отвечающа за вывод обработаной информации шорткодом
     * @param $data
     * @return mixed
     */
    public function render($data)
    {
        // TODO: Implement render() method.
        $pathView = INFORMATIONOUTPUT_PlUGIN_DIR."/includes/views/site/shortcodes/InformationOutputContactInformationShortcodesView.php";
        $this->loadView($pathView);
    }
}