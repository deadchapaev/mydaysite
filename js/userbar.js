$(document).ready(function () {
//Когда вы нажмете на ссылку с классом poplight и HREF начинается с a #
    $('li.poplight[href^=#]').click(function () {
        var popID = $(this).attr('rel'); //Получить Popup Имя
        var popURL = $(this).attr('href'); //Получить Popup HREF и определить размер

        //Запрос и  Переменные от HREF URL
        var query = popURL.split('?');
        var dim = query[1].split('&');
        var popWidth = dim[0].split('=')[1]; //Возвращает первое значение строки запроса

        // Добавить кнопку "Закрыть" в наше окно, прописываете прямой путь к картинке
//        $('#' + popID).fadeIn().css({ 'width': Number(popWidth) }).prepend('<a href="#" class="close"><img src="close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>');
        $('#' + popID).fadeIn().css({ 'width': Number(popWidth) });
        //Определяет запас на выравнивание по центру (по вертикали по горизонтали)мы добавим 80px к высоте / ширине, значение полей вокруг содержимого (padding) и ширину границы устанавливаем в CSS
        var popMargTop = ($('#' + popID).height() + 80) / 2;
        var popMargLeft = ($('#' + popID).width() + 80) / 2;

        //Устанавливает величину отступа на Popup
        $('#' + popID).css({
            'margin-top': -popMargTop,
            'margin-left': -popMargLeft
        });

        //Фоновый режим полупрозрачного слоя
        $('body').append('<div id="fade"></div>'); //Add the fade layer to bottom of the body tag.
        $('#fade').css({'filter': 'alpha(opacity=80)'}).fadeIn(); //Постепенное исчезание слоя - .css({'filter' : 'alpha(opacity=80)'}) используется для фиксации в IE , фильтр для устранения бага тупого IE

        return false;
    });

    $('.poplight-event[href^=#]').click(function () {
        var popID = $(this).attr('rel'); //Получить Popup Имя
        var popURL = $(this).attr('href'); //Получить Popup HREF и определить размер

        //Запрос и  Переменные от HREF URL
        var query = popURL.split('?');
        var dim = query[1].split('&');
        var popWidth = dim[0].split('=')[1]; //Возвращает первое значение строки запроса

        // Добавить кнопку "Закрыть" в наше окно, прописываете прямой путь к картинке
//        $('#' + popID).fadeIn().css({ 'width': Number(popWidth) }).prepend('<a href="#" class="close"><img src="close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>');
        $('#' + popID).fadeIn().css({ 'width': Number(popWidth) });
        //Определяет запас на выравнивание по центру (по вертикали по горизонтали)мы добавим 80px к высоте / ширине, значение полей вокруг содержимого (padding) и ширину границы устанавливаем в CSS
        var popMargTop = ($('#' + popID).height() + 80) / 2;
        var popMargLeft = ($('#' + popID).width() + 80) / 2;

        //Устанавливает величину отступа на Popup
        $('#' + popID).css({
            'margin-top': -popMargTop,
            'margin-left': -popMargLeft
        });

        //Фоновый режим полупрозрачного слоя
        $('body').append('<div id="fade"></div>'); //Add the fade layer to bottom of the body tag.
        $('#fade').css({'filter': 'alpha(opacity=80)'}).fadeIn(); //Постепенное исчезание слоя - .css({'filter' : 'alpha(opacity=80)'}) используется для фиксации в IE , фильтр для устранения бага тупого IE

        return false;
    });

    /*выпадающий календарь*/
    $("#date").datepicker();

    /*стилизация select*/
    $("select").selectBox();

//    new nicEditor({
//            fullPanel: true
//        }
//    ).panelInstance("area1");
//    new nicEditor({iconsPath: '/css/images/nicEditorIcons.gif'}).panelInstance('addevent_textarea');

});
