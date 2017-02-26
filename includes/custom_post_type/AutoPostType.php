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
        // хук, через который подключается функция
        // регистрирующая новые таксономии  createAutoTaxonomies
        add_action( 'init', array( &$this, 'createAutoTaxonomies' ) );
        // Сообщения при публикации или изменении типа записи auto
        add_filter('post_updated_messages',  array( &$this, 'autoUpdatedMessages' ));
        // Раздел "помощь" типа записи auto
        add_action( 'contextual_help', array( &$this, 'addHelpText' ), 10, 3 );

        // подключаем функцию активации мета блока (my_extra_fields)
        add_action('add_meta_boxes', array( &$this, 'priceExtraFields' ), 1);
        // включаем обновление полей при сохранении
        add_action('save_post', array( &$this, 'priceExtraFieldsUpdate' ), 0);
    }

    function registerAutoPostType()
    {
        register_post_type('auto', array(
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

    public function addHelpText($contextual_help, $screen_id, $screen ){
        //$contextual_help .= print_r($screen); // используйте чтобы помочь определить параметр $screen->id
        if('book' == $screen->id ) {
            $contextual_help = '
		<p>Напоминалка при редактировании записи auto:</p>
		<ul>
			<li>Указать марку автомобиля, например, "Audi", "BMW".</li>
			<li>Указать модель автомобиля.</li>
		</ul>
		<p>Если нужно запланировать публикацию на будущее:</p>
		<ul>
			<li>В блоке с кнопкой "опубликовать" нажмите редактировать дату.</li>
			<li>Измените дату на нужную, будущую и подтвердите изменения кнопкой ниже "ОК".</li>
		</ul>
		<p><strong>За дополнительной информацией обращайтесь:</strong></p>
		<p><a href="/" target="_blank">Блог о WordPress</a></p>
		<p><a href="http://wordpress.org/support/" target="_blank">Форум поддержки</a></p>
		';
        }
        elseif( 'edit-book' == $screen->id ) {
            $contextual_help = '<p>Этот раздел помощи показанный для типа записи Auto ...</p>';
        }
        return $contextual_help;
    }

    public function createAutoTaxonomies(){
        // определяем заголовки для 'марка'
        $labels = array(
            'name' => _x( 'Марки', 'taxonomy general name' ),
            'singular_name' => _x( 'Марка', 'taxonomy singular name' ),
            'search_items' =>  __( 'Поиск марки' ),
            'all_items' => __( 'Все марки' ),
            'parent_item' => __( 'Родитель марка' ),
            'parent_item_colon' => __( 'Родитель марка:' ),
            'edit_item' => __( 'Изменить марку' ),
            'update_item' => __( 'Обновить марку' ),
            'add_new_item' => __( 'Добавить новую марку' ),
            'new_item_name' => __( 'Название новой марки' ),
            'menu_name' => __( 'Марка' ),
        );
        // Добавляем древовидную таксономию 'марка' (как категории) жанр
        register_taxonomy('марка', array('auto'), array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'марка' ),
        ));
        // определяем заголовки для 'модели'
        $labels = array(
            'name' => _x( 'Модели', 'taxonomy general name' ),
            'singular_name' => _x( 'Модель', 'taxonomy singular name' ),
            'search_items' =>  __( 'Найти модель' ),
            'popular_items' => __( 'Популярные модели' ),
            'all_items' => __( 'Все модели' ),
            'parent_item' => null,
            'parent_item_colon' => null,
            'edit_item' => __( 'Редактировать модель' ),
            'update_item' => __( 'Обновить модель' ),
            'add_new_item' => __( 'Добавить новую модель' ),
            'new_item_name' => __( 'Новое имя модели' ),
            'separate_items_with_commas' => __( 'Отдельные модели' ),
            'add_or_remove_items' => __( 'Добавить или удалить модели' ),
            'choose_from_most_used' => __( 'Выберите одну из наиболее используемых моделей' ),
            'menu_name' => __( 'Модели' ),
        );
        // Добавляем НЕ древовидную таксономию 'модель' (как метки)
        register_taxonomy('модель', 'auto',array(
            'hierarchical' => false,
            'labels' => $labels,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'модель' ),
        ));
    }

    // Создадим новый мета блок для постов
    public function priceExtraFields(){
        add_meta_box(
            'price_extra_fields', // id атрибут HTML тега, контейнера блока.
            'Стоимость', // Заголовок/название блока. Виден пользователям.
            array( &$this, 'renderPriceExtraFields' ),  //Функция, которая выводит на экран HTML содержание блока
            'auto', // Название экрана для которого добавляется блок.
            'normal', // Место где должен показываться блок
        'high' // Приоритет блока для показа выше или ниже остальных блоков:
        );
    }
    // Заполним этот блок полями html формы.
    // Делается это через, указанную в add_meta_box() функцию renderPriceExtraFields(). Именно она отвечает за содержание мета блока:
    //Функция, которая выводит на экран HTML содержание блока
    public function renderPriceExtraFields($post){
        ?>
        <p>
            <label>
                <input type="number" name="price_extra[price]" value="<?php echo get_post_meta($post->ID, 'price', 1); ?>" />
                грн.
            </label>
        </p>
        <?php
    }
    /*
      * Сохраняем данные
      * На этом этапе, мы уже создали блок произвольных полей, теперь нужно обработать данные полей при сохранении поста.
      *  Обработать, значит записать их в в базу данных или удалить от туда. Для этого используем хук save_post, который
      * срабатывает в момент сохранения поста. В этот момент мы получим данные из массива price_extra[] и обработаем них:
      */
    public function priceExtraFieldsUpdate($post_id ){
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE  ) return false; // выходим если это автосохранение

        if( !isset($_POST['price_extra']) ) return false; // выходим если данных нет
        // Все ОК! Теперь, нужно сохранить/удалить данные
        $priceExtra = array_map('trim', $_POST['price_extra']); // чистим все данные от пробелов по краям
        foreach( $priceExtra as $key=>$value ){
            if( empty($value) ){
                delete_post_meta($post_id, $key); // удаляем поле если значение пустое
                continue;
            }
            update_post_meta($post_id, $key, $value); // add_post_meta() работает автоматически
        }
        return $post_id;
    }
}