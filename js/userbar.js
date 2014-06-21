$(document).ready(function () {
//Когда вы нажмете на ссылку с классом poplight и HREF начинается с a #
    $('li.poplight[href^=#]').click(function () {
        doSomeWork($(this));
    });

    $('.poplight-event[href^=#]').click(function () {
        doSomeWork($(this));
        //----так будешь получать группы

        /*$.post("http://mmd/Api/getUserGroups", '',
            function (data) {
                alert(data[0].id);
            }, "json");*/

        /*выпадающий календарь*/
        $("#date").datepicker();

        /*стилизация select*/
        $("select").selectBox();
    });

    $('#close_window_g, #close_window, .button-addevent').click(function () {
        $('#fade').css({'filter': 'alpha(opacity=80)'}).fadeOut(0);
        $('#popup_addgroup').css({'filter': 'alpha(opacity=80)'}).fadeOut(0);
        $('#popup_addevent').css({'filter': 'alpha(opacity=80)'}).fadeOut(0);
        $('body').remove('<div id="fade"></div>')
    });


});


function doSomeWork(elem) {

    //Получить Popup Имя
    var popID = $(elem).attr('rel');
    //Получить Popup HREF и определить размер
    var popURL = $(elem).attr('href');
    //Запрос и  Переменные от HREF URL
    var dim = popURL.split('?')[1].split('&');
    //Возвращает первое значение строки запроса
    var popWidth = dim[0].split('=')[1];

    // Добавить кнопку "Закрыть" в наше окно, прописываете прямой путь к картинке
    $('#' + popID).fadeIn(0).css({ 'width': Number(popWidth) });

    //Определяет запас на выравнивание по центру (по вертикали по горизонтали)мы добавим 80px к высоте / ширине,
    // значение полей вокруг содержимого (padding) и ширину границы устанавливаем в CSS
    var popMargTop = ($('#' + popID).height() + 80) / 2;
    var popMargLeft = ($('#' + popID).width() + 80) / 2;

    //Устанавливает величину отступа на Popup
    $('#' + popID).css({
        'margin-top': -popMargTop,
        'margin-left': -popMargLeft
    });

    //Фоновый режим полупрозрачного слоя
    $('.container').prepend('<div id="fade"></div>');
    //Постепенное исчезание слоя
    $('#fade').css({'filter': 'alpha(opacity=80)'}).fadeIn(0);

    return false;
}

/*
 $.post("http://mmd/Api/getUserGroups", '{"authorization":"Y2hhcGFldjpjaGFwYWV2","action":"getUserGroups","session":"5mm24192jvvjvoeh75v3sgul07","entity":{"user":"vasiliy"}}',
 function (data) {
 alert(data[0].id);
 }, "json");
 */