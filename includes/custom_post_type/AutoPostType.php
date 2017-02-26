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
        /*
        * Регистрируем Custom Post Type
        */
        add_action( 'init', array( &$this, 'registerAutoPostType' ) );
        // Сообщения при публикации или изменении типа записи auto
        add_filter('post_updated_messages',  array( &$this, 'autoUpdatedMessages' ));
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

    public function autoUpdatedMessages(){
        global $post;
        $messages['auto'] = array(
            0 => '', // Не используется. Сообщения используются с индекса 1.
            1 => sprintf( 'Auto обновлено. <a href="%s">Посмотреть запись auto</a>', esc_url( get_permalink($post->ID) ) ),
            2 => 'Произвольное поле обновлено.',
            3 => 'Произвольное поле удалено.',
            4 => 'Запись Auto обновлена.',
            /* %s: дата и время ревизии */
            5 => isset($_GET['revision']) ? sprintf( 'Запись Book восстановлена из ревизии %s', wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
            6 => sprintf( 'Запись Auto опубликована. <a href="%s">Перейти к записи auto</a>', esc_url( get_permalink($post->ID) ) ),
            7 => 'Запись Auto сохранена.',
            8 => sprintf( 'Запись Auto сохранена. <a target="_blank" href="%s">Предпросмотр записи auto</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post->ID) ) ) ),
            9 => sprintf( 'Запись Auto запланирована на: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Предпросмотр записи auto</a>',
                // Как форматировать даты в PHP можно посмотреть тут: http://php.net/date
                date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post->ID) ) ),
            10 => sprintf( 'Черновик записи Auto обновлен. <a target="_blank" href="%s">Предпросмотр записи auto</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post->ID) ) ) ),
        );
        return $messages;
    }
}