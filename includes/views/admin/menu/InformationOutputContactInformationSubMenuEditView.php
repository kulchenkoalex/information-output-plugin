 <!--* Created by PhpStorm.
 * User: Алексей
 * Date: 20.02.2017
 * Time: 19:45
 */-->
 <!-- View форма для редактирования записи в таблицу. action формы это ссылка на страницу контактной информации с $_GET['action']
параметр &action=update_data в методе render контроллера мы будем обрабатывать параметр $_GET['action']  update_data.
Эта форма похожая на форму InformationOutputContactInformationSubMenuAddView.php только у ее полей ввода есть атрибут value со значением
записи в таблицы которую мы будем редактировать. И еще есть одно скрытое поле id по котором будем обновлять запись в таблице.
-->
 <form action="admin.php?page=information_output_control_contact_information_menu&action=update_data" method="post">
     Имя<input type="text" name="user_name" value="<?php echo $data['user_name']; ?>"></br>
     Фамилия<input type="text" name="user_surname" value="<?php echo $data['user_surname']; ?>"></br>
     Номер тел.:<input type="text" name="phone_number" value="<?php echo $data['phone_number']; ?>"></br>
     О себе<textarea name="about_myself">
         <?php echo $data['about_myself']; ?>
     </textarea></br></br>
     <!-- Поле id по котором будем обновлять запись в таблице -->
     <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

     <input type="submit" name="<?php _e('Add', INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN ); ?>">
 </form>
