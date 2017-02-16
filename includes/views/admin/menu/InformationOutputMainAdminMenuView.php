
<!--/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 16.02.2017
 * Time: 11:39
 */-->
<form action="options.php" method="POST">
    <?php
        settings_fields( 'InformationOutputMainSettings' );     // скрытые защитные поля
         do_settings_sections( 'information-output-development-plugin' ); // секции с настройками (опциями). У нас она всего одна 'section_id'
         submit_button();
    ?>
</form>