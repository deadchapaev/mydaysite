/**
 * Обёртка для дня года
 * @param vDate дата
 */
function Day(vDate) {
    //хранит дату на основании которой создалась обёртка
    var date = vDate;
    /**
     * возвращает объект-Date(), для которого создана обёртка
     * @returns {*}
     */
    this.getDateObj = function () {
        return date;
    }
    //-----инфомрация о дне------------------------------------
    /**
     * Возвращает номер дня недели
     * @returns {number}
     */
    this.getDayNum = function () {
        return date.getDay();
    }
    /**
     * возвращает номер дня месяца
     * @returns {number}
     */
    this.getDay = function () {
        return date.getDate();
    }
    /**
     * возвращает номер недели в разрезе текущего месяца
     * @returns {number}
     */
    this.getWeekNum = function () {
        //получили первый день месяца
        var firstDay = this.getFirstDay().getDateObj();
        //получили смещение
        var shiftDay = firstDay.getDay();
        var weak = Math.ceil((date.getDate() + shiftDay) / 7);

        if (firstDay.getDay() == 0) {
            weak = weak + 1;
        }
        return weak;
    }
    //-----вспомогательные методы
    /**
     * проверяет, не текущая ли это дата?
     * @returns {boolean}
     */
    this.isCurDate = function () {
        var curDate = new Date();
        if (date.getYear() == curDate.getYear()) {
            if (date.getMonth() == curDate.getMonth()) {
                if (date.getDate() == curDate.getDate()) {
                    return true;
                }
            }
        }
        return false;
    }
    //-----следующий-предыдущий день месяца-недели и тд
    /**
     * Возвращает объект-Day следующего дня
     * @returns {Day}
     */
    this.getNextDay = function () {

        if (date.getDate() == this.getLastDay().getDay()) {
            return this.getNextMonth().getFirstDay();
        } else {
            return new Day(new Date(date.getFullYear(), date.getMonth(), date.getDate() + 1));
        }
    }
    /**
     * Возвращает объект-Day предыдущего дня
     * @returns {Day}
     */
    this.getPrevDay = function () {
        if (date.getDate() == this.getFirstDay().getDay()) {
            return this.getPrevMonth().getLastDay();
        } else {
            return new Day(new Date(date.getFullYear(), date.getMonth(), date.getDate() - 1));
        }
    }
    /**
     * Возвращает объект-Day первого дня месяца
     * @returns {Day}
     */
    this.getFirstDay = function () {
        return new Day(new Date(date.getFullYear(), date.getMonth(), 1));
    }
    /**
     * Возвращает объект-Day последнего дня месяца
     * @returns {Day}
     */
    this.getLastDay = function () {
        return new Day(new Date(date.getFullYear(), date.getMonth() + 1, 0));
    }
    /**
     * Возвращает объект-Day следующего месяца
     * @returns {Day}
     */
    this.getNextMonth = function () {
        var nextMonthDate;
        if (date.getMonth() == 11) {
            nextMonthDate = new Date(date.getFullYear() + 1, 0, date.getDate());
        } else {
            nextMonthDate = new Date(date.getFullYear(), date.getMonth() + 1, 1);
        }
        return new Day(nextMonthDate);
    }
    /**
     * Возвращает объект-Day предыдущего месяца
     * @returns {Day}
     */
    this.getPrevMonth = function () {
        var prevMonthDate;
        if (date.getMonth() == 0) {
            prevMonthDate = new Date(date.getFullYear() - 1, 11, date.getDate());
        } else {
            prevMonthDate = new Date(date.getFullYear(), date.getMonth() - 1, 1);
        }
        return new Day(prevMonthDate);

    }
    //-----определение имени недели, месяца
    /**
     * Возвращает название месяца
     * @returns название месяца
     */
    this.getMonthName = function () {
        var monthArr = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь']
        return monthArr[date.getMonth()];
    }
    /**
     * Возвращает название дня недели
     * @returns день недели
     */
    this.getDayName = function () {
        var monthArr = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье']
        return monthArr[this.getDayNum()];
    }

};

//-----------------------Наполнители контента----------------------------------------
//заполняет грид
function operation(day) {
    inputDay = day;
    //заполним информационную колонку календаря
    infillRightBar(day);

    day = day.getFirstDay();
    if (day.getDayNum() == 0) {
        day = day.getPrevDay();
    }
    //найдем день, с которого нужно начинать отрисовку
    while (day.getDayNum() != 0) {
        day = day.getPrevDay();
    }
    //заполняет грид
    for (var row = 1; row < 7; row++) {
        for (var col = 0; col < 7; col++) {
            var curDayFlag = (day.getDateObj().getMonth() != inputDay.getDateObj().getMonth());
            var item = $('.calendargrid tr').eq(row).find('td').eq(col);
            item.attr('class', curDayFlag ? 'nocur' : '');
            item.text("").append(day.isCurDate() ? '<b>' + day.getDay() + '</b>' : day.getDay());
            day = day.getNextDay();
        }
    }
}

/**
 * заполняет правую панель
 * @param day объект день
 */
function infillRightBar(day) {
    $('.month-year-header').text(day.getMonthName() + ' ' + day.getDateObj().getFullYear());
    $('.calendar-selecteddate > h1').text(day.getDay());
    $('.calendar-selecteddate > h2').text(day.getMonthName() + ' ' + day.getDateObj().getFullYear());

    //ссылка для текущего дня на инфопанели календаря
    var textDate = getCurrentDateInStr();
    $('.calendar-selecteddate > .curdate > a').text(textDate);
    $('.calendar-selecteddate > .curdate > a').attr("href", "/Event?sdate=" + textDate);
}

/**
 * Переходит к следующему или предыдущему месяцу
 * @param direction 'next' или 'prev'
 */
function infillNeighbourMonth(direction) {
    if (direction === 'next' || direction === 'prev') {
        var day = new Day(extractSelectedDate());
        day = ((direction === 'next') ? day.getNextMonth() : day.getPrevMonth());
        saveSelectedDate(day.getDateObj());
        operation(day);
    }
}

//-----------------------Набор обработчиков событий----------------------------------
//после полной загрузки и отрисовки страницы
$(document).ready(function () {
    //хранит выбранный пользователем день
    var selectedDay;

    //дата, которая пришла от GET-запроса
    var inpStrDate = getParameterByName("sdate");
    if ("" !== inpStrDate && validateDateFormat(inpStrDate)) {
        selectedDay = new Date(inpStrDate);
    } else {
        selectedDay = (isEventPage() ? new Date() : extractSelectedDate());
    }
    saveSelectedDate(selectedDay);
    //заполним грид
    operation(new Day(selectedDay));

});

//на правую стрелочку календаря
$(".forw-arrow").live('click', function () {
    infillNeighbourMonth('next');
});

//на левую стрелочку календаря
$(".back-arrow").live('click', function () {
    infillNeighbourMonth('prev');
});

//на грид
$(".calendargrid td ").live('click', function () {
    if ($(this).attr('class') != 'nocur') {
        var day = extractSelectedDate();
        day = new Date(day.getFullYear(), day.getMonth(), $(this).text());
        saveSelectedDate(day);
        window.location = "/Event?sdate=" + getCurrentDateInStr(day);
    }
});

//-----------------------Набор вспомогательных функций-------------------------------
/**
 * Возвращает значение GET параметра по его имени
 * @param name имя параметра
 * @returns значение параметра
 */
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

/**
 * Проверяет, связана ли страница с событиями - для реакции календаря
 * @returns true/false
 */
function isEventPage() {
    if (window.location.href.toLocaleLowerCase().indexOf("event") > -1
        || window.location.href.toLocaleLowerCase().indexOf("event") > -1) {
        return true;
    }
    return false;
}

/**
 * Возвращает текущую дату в правильном формате строке
 * @returns дата в формате yyyy-MM-dd
 */
function getCurrentDateInStr(date) {
    var curDay = date;
    if (date == null) {
        curDay = new Date();
    }
    var date_day = (curDay.getDate() < 10 ? '0' + curDay.getDate() : curDay.getDate());
    var date_month = (curDay.getMonth() < 9 ? '0' + (curDay.getMonth() + 1) : curDay.getMonth() + 1 );
    var date_year = curDay.getFullYear();

    return date_year + '-' + date_month + '-' + date_day;
}

/**
 * Проверяет, валидная ли строка входящей даты
 * @param date дата в виде строки
 */
function validateDateFormat(date) {
    var dateReg = /^\d{4}[-]\d{2}[-]\d{2}$/;
    return date.match(dateReg);
}

/**
 * Извлекает выбранную пользователем дату из хранилища
 * @returns {*}
 */
function extractSelectedDate() {
    var date = localStorage.getItem('selectedDay');
    if (date === null) {
        date = new Date();
        saveSelectedDate(date);
    } else {
        date = new Date(date);
    }
    return date;
}

/**
 * Сохраняет выбранную пользователем дату в хранилище
 * @param date выбранная дата
 */
function saveSelectedDate(date) {
    localStorage.setItem('selectedDay', date);
}