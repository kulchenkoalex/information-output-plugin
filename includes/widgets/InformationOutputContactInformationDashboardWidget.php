<?php
/**
 * Created by PhpStorm.
 * User: Сервис
 * Date: 23.02.2017
 * Time: 11:56
 */

namespace includes\widgets;

use includes\controllers\admin\menu\InformationOutputICreatorInstance;
use includes\models\admin\menu\InformationOutputContactInformationSubMenuModel;

class InformationOutputContactInformationDashboardWidget implements InformationOutputICreatorInstance
{
    public function __construct() {
        // Регистрация виджета консоли
        add_action( 'wp_dashboard_setup', array( &$this, 'addDashboardWidgets' ) );
        add_action( 'wp_dashboard_setup', array( &$this, 'removeDashboardWidgets' ) );
    }
    // Удаление виджета консоли
    public function removeDashboardWidgets(){
        /**
         * Удаляет Блоки на страницах редактирования/создания постов, постоянных страниц и произвольных типов записей.
         * remove_meta_box( $id, $screen, $context );
         */
        remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    }
    // Используется в хуке
    public function addDashboardWidgets(){
        // Продвинутое использование: добавление виджета в боковой столбец
        /*add_meta_box(
            'step_by_step_guest_book_dashboard_widget_new',
            __('Guest book new', INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN),
            array( &$this, 'renderDashboardWidget' ),
            'dashboard',
            'side',
            'high'
        );*/
        wp_add_dashboard_widget(
            'information_output_contact_information_dashboard_widget',         // Идентификатор виджета.
            __('Contact information', INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN),           // Заголовок виджета.
            array( &$this, 'renderDashboardWidget'  ) // Функция отображения.
        );
        // Объявляем глобальный массив метабоксов, содержащий все виджеты административной понели WordPress
        global $wp_meta_boxes;
        // Получаем нормальный массив виджетов консоли
        // (который уже содержит наш виджет в самом конце)
        $normal_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
        // Сохраняем старую версию массива и удаляем наш виджет из конца массива
        $example_widget_backup = array('information_output_contact_information_dashboard_widget' => $normal_dashboard['information_output_contact_information_dashboard_widget']);
        unset($normal_dashboard['information_output_contact_information_dashboard_widget']);
        // Объединяем два массива вместе таким образом, что наш виджет оказывается в начале
        $sorted_dashboard = array_merge($example_widget_backup, $normal_dashboard);
        // Сохраняем отсортированный массив обратно в метабокс
        $wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
    }
    // Выводит контент
    public function renderDashboardWidget(){
        // Запрашиваем данные из таблицы
$data = InformationOutputContactInformationSubMenuModel::getAll();
?>
<table  border="1">
    <thead>
    <tr>
        <td>
            <?php _e('Имя пользователя', INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN ); ?>
        </td>
        <td>
            <?php _e('Фамилия', INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN ); ?>
        </td>
        <td>
            <?php _e('Номер телефона', INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN ); ?>
        </td>

    </tr>
    </thead>
    <tbody>
    <?php if(count($data) > 0 && $data !== false){  ?>
        <?php foreach($data as $value): ?>
            <tr class="row table_box">

                <td>
                    <?php echo $value['user_name']; ?>
                </td>
                <td>
                    <?php echo $value['user_surname']; ?>
                </td>
                <td>
                    <?php echo $value['phone_number']; ?>
                </td>

            </tr>
        <?php endforeach ?>
    <?php }else{ ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<?php
    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}