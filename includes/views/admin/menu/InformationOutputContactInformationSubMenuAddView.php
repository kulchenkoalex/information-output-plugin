<!--
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 20.02.2017
 * Time: 19:40
 */-->
<!-- View форма для добавления записи в таблицу. action формы это ссылка на страницу контактной информации с $_GET['action']
параметр &action=insert_data в методе render контроллера мы будем обрабатывать параметр $_GET['action'] -->
<form action="admin.php?page=information_output_control_contact_information_menu&action=insert_data" method="post">
    Имя<input type="text" name="user_name"></br>
    Фамилия<input type="text" name="user_surname"></br>
    Номер тел.:<input type="text" name="phone_number"></br>
    О себе<textarea name="about_myself"></textarea></br></br>
    <input type="submit" name="<?php _e('Add', INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN ); ?>">
</form>
