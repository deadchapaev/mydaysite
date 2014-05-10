$(document).ready(function () {
//Когда вы нажмете на ссылку с классом poplight и HREF начинается с a #
    $('li.poplight[href^=#]').click(function () {
        doSomeWork($(this));
    });

    $('.poplight-event[href^=#]').click(function () {
        doSomeWork($(this));
    });

    /*выпадающий календарь*/
    $("#date").datepicker();

    /*стилизация select*/
    $("select").selectBox();

});


//----так будешь получать группы
/*
 $.post("http://mmd/api/", '{"authorization":"Y2hhcGFldjpjaGFwYWV2","action":"getUserGroups","session":"5mm24192jvvjvoeh75v3sgul07","entity":{"user":"vasiliy"}}',
 function (data) {
 alert(data[0].id);
 }, "json");*/


function doSomeWork(elem) {

    //Получить Popup Имя
    var popID = $(elem).attr('rel');
    //Получить Popup HREF и определить размер
    var popURL = $(elem).attr('href');
    //Запрос и  Переменные от HREF URL
    var query = popURL.split('?');
    var dim = query[1].split('&');
    //Возвращает первое значение строки запроса
    var popWidth = dim[0].split('=')[1];

    // Добавить кнопку "Закрыть" в наше окно, прописываете прямой путь к картинке
    $('#' + popID).fadeIn().css({ 'width': Number(popWidth) });
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
    $('body').append('<div id="fade"></div>');
    //Постепенное исчезание слоя
    $('#fade').css({'filter': 'alpha(opacity=80)'}).fadeIn(1);

    return false;
}