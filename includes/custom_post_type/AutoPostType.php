<?php

/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 26.02.2017
 * Time: 20:17
 */
namespace includes\custom_post_type;

class AutoPostType
{
    public function __construct()
    {
        add_action('init', 'register_post_types');
    }

    function register_post_types()
    {
        register_post_type('post_type_name', array(
            'label' => null,
            'labels' => array(
                'name' => 'Автомобили', // основное название для типа записи
                'singular_name' => 'Автомобиль', // название для одной записи этого типа
                'add_new' => 'Добавить автомобиль', // для добавления новой записи
                'add_new_item' => 'Добавление автомобиля', // заголовка у вновь создаваемой записи в админ-панели.
                'edit_item' => 'Редактирование автомобиля', // для редактирования типа записи
                'new_item' => 'Новый автомобиль', // текст новой записи
                'view_item' => 'Смотреть автомобиль', // для просмотра записи этого типа.
                'search_items' => 'Искать автомобиль', // для поиска по этим типам записи
                'not_found' => 'Не найдено', // если в результате поиска ничего не было найдено
                'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
                'parent_item_colon' => '', // для родителей (у древовидных типов)
                'menu_name' => 'Автомобили', // название меню
            ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => true,
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array('title','editor','author','thumbnail','excerpt','comments')
        ));
    }
}