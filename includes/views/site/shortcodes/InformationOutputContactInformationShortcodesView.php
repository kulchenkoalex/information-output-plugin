<!--/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 22.02.2017
 * Time: 22:11
 */-->
<form method="post">
    <label>'.__('User name', INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN ).'</label>
    <input type="text" name="inf_user_name" class="inf-user-name">
    <label>'.__('User surname', INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN ).'</label>
    <input type="text" name="inf_user_surname" class="inf-user-surname">
    <label>'.__('Phone number', INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN ).'</label>
    <input type="text" name="inf_phone_number" class="inf-phone-number">
    <label>'.__('About myself', INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN ).'</label>
    <textarea name="inf_about_myself" class="inf-about-myself"></textarea>
    <button class="information_output-btn-add" >'.__('Add', INFORMATIONOUTPUT_PlUGIN_TEXTDOMAIN ).'</button>
</form>
