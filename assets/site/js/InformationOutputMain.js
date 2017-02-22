/**
 * Created by Алексей on 22.02.2017.
 */
jQuery(function($) {
    $(document).ready(function(){
        alert("I am developer");
    });
    (document).find('.information_output-btn-add').click(function (e) {
        var userName, userSurName, phoneNumber, about_Myself, data;
        // Получаем данные формы
        userName = $(this).parent().find('.inf-user-name').val();
        userSurName = $(this).parent().find('.inf-user-surname').val();
        phoneNumber = $(this).parent().find('.inf-phone-number').val();
        about_Myself = $(this).parent().find('.inf-about-myself').val();
        // Формируем обьект данных который получит AJAX  обработчик
        data = {
                action: 'contact_information',
                user_name: userName,
                user_surname: userSurName,
                phone_number: phoneNumber,
                about_myself: about_Myself
            }
            // Вывод данных в консоль браузера
        console.log(data);
        console.log(ajaxurl+ '?action=contact_information');
        // Отправка данных ajax обработчику (wp_ajax_contact_information, wp_ajax_nopriv_contact_information)
        $.post( ajaxurl, data, function(response) {
            alert('Получено с сервера: ' + response);
        });
        // Запрещаем отправление формы что бы страница не перезагружалась
        return false;
    });
});