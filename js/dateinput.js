//-----------------------Набор обработчиков событий----------------------------------
//после полной загрузки и отрисовки страницы
$(document).ready(function () {
    infillYearCb();
    infillMonthCb();
    infillDayCb();
    infillHourCb();
    infillMinuteCb();


});

//на смену месяца
$('.month').live('change', function () {
    infillDayCb();

});
//на смену года
$('.year').live('change', function () {
    infillDayCb();

});

//----------------Наполнители контента-------------------------------------------------
/**
 * Заполняет выпадающий список годов
 */
function infillYearCb() {
    var year = new Array();
    for (var i = 1970; i <= 2030; i++) {
        year.push(i);
    }

    $('.year').empty().append(
        $(year).map(function (i) {
            return $('<option/>').attr('value', $(this)[0]).text($(this)[0].toString())[0];
        }).get()
    );
}

/**
 * Заполняет выпадающий список месяцев
 */
function infillMonthCb() {
    var month = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];
    $('.month').empty().append(
        $(month).map(function (i) {
            return $('<option/>').attr('value', i + 1).text(month[i])[0];
        }).get()

    );
}

/**
 * Заполняет выпадающий список дней
 */
function infillDayCb() {
    var dayCnt;
    var day31 = [1, 3, 5, 7, 8, 10, 12];
    var day30 = [4, 6, 9, 11];

    if (day31.indexOf(parseInt($('.month').val())) != -1) {
        dayCnt = 31;
    } else if (day30.indexOf(parseInt($('.month').val())) != -1) {
        dayCnt = 30;
    } else if (parseInt(parseInt($('.month').val())) === 2) {
        if ($('.year').val() % 4 == 0) {
            dayCnt = 29;
        } else {
            dayCnt = 28;
        }
    }

    $('.day').empty().append(
        $(new Array(dayCnt)).map(function (i) {
            return $('<option/>').attr('value', ++i).text(i)[0];
        }).get()
    );
}

/**
 * Заполняет выпадающий список часов
 */
function infillHourCb() {
    $('.hour').empty().append(
        $(new Array(24)).map(function (i) {
            return $('<option/>').attr('value', i).text(i++)[0];
        }).get()
    );
}

/**
 * Заполняет выпадающий список минут
 */
function infillMinuteCb() {
    $('.minute').empty().append(
        $(new Array(60)).map(function (i) {
            return $('<option/>').attr('value', i).text(i++)[0];
        }).get()
    );
}

