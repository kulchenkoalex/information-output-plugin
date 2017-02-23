/**
 * Created by Сервис on 09.02.2017.
 */

jQuery(function($) {
    $(document).ready(function(){
    });
    // Отслежываем нажатие  на кнопку Add (<button class="step-by-steb-btn-add" >'.__('Add', STEPBYSTEP_PlUGIN_TEXTDOMAIN ).'</button> )
    $(document).find('.information-output-btn-add').click(function (e) {
        var userName, userSurname, userPhoneNumber, userAboutMyself, data;
        // Получаем данные формы
        userName = $(this).parent().find('.inf-user-name').val();
        userSurname = $(this).parent().find('.inf-user-surnamename').val();
        userPhoneNumber = $(this).parent().find('.inf-phone-number').val();
        userAboutMyself = $(this).parent().find('.inf-about-myself').val();
        // Формируем обьект данных который получит AJAX  обработчик
        data = {
            action: 'contact_information',
            user_name: userName,
            user_surname: userSurname,
            phone_number: userPhoneNumber,
            about_myself: userAboutMyself
        }
        // Вывод данных в консоль браузера
        console.log(data);
        console.log(ajaxurl+ '?action=contact_information');

        // Отправка данных ajax обработчику (wp_ajax_contact_information, wp_ajax_nopriv_contact_information)
        $.post( ajaxurl, data, function(response) {
            alert('Получено с сервера: ' + response.data.message);
            console.log(response);
        });

        // Запрещаем отправление формы что бы страница не перезагружалась
        return false;
    });
});