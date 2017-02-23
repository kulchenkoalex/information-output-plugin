<?php

/**
 * Created by PhpStorm.
 * User: Сервис
 * Date: 23.02.2017
 * Time: 11:07
 */

namespace includes\widgets;

class InformationOutputContactInformationWidget extends \WP_Widget
{
    public function __construct() {
        /**
         * https://developer.wordpress.org/reference/classes/wp_widget/__construct/
         * WP_Widget::__construct(
         *      string $id_base, //Base ID для виджета, в нижнем регистре и уникальным. Если оставить пустым,
         *                          то часть имени класса виджета будет использоваться Должно быть уникальным.
         *      string $name, //Имя виджета отображается на странице конфигурации.
         *      array $widget_options = array(),
                *      array $control_options = array()
         * )
         *
         */
        parent::__construct(
            "information_output_contact_information",
            "Information Output Contact Information Widget",
            array("description" => "Contact information")
        );
    }
}