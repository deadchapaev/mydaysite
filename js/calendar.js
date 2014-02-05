//Объект день месяца
function Day(vDate) {
    var date = vDate;

    //Возвращает номер дня недели
    this.getDayNum = function () {
        return date.getDay();
    }
    //возвращает номер дня месяца
    this.getDay = function () {
        return date.getDate();
    }

    //возвращает объект-Date() текущего дня
    this.getDateObj = function () {
        return date;
    }

    //проверяет, не текущая ли это дата?
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

    //возвращает номер недели в разрезе текущего месяца
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


    //Возвращает объект-Day следующего дня
    this.getNextDay = function () {

        if (date.getDate() == this.getLastDay().getDay()) {
            return this.getNextMonth().getFirstDay();
        } else {
            return new Day(new Date(date.getFullYear(), date.getMonth(), date.getDate() + 1));
        }
    }
    //Возвращает объект-Day предыдущего дня
    this.getPrevDay = function () {
        if (date.getDate() == this.getFirstDay().getDay()) {
            return this.getPrevMonth().getLastDay();
        } else {
            return new Day(new Date(date.getFullYear(), date.getMonth(), date.getDate() - 1));
        }
    }


    //Возвращает объект-Day первого дня месяца
    this.getFirstDay = function () {
        return new Day(new Date(date.getFullYear(), date.getMonth(), 1));
    }
    //Возвращает объект-Day последнего дня месяца
    this.getLastDay = function () {
        return new Day(new Date(date.getFullYear(), date.getMonth() + 1, 0));
    }
    //Возвращает объект-Day следующего месяца
    this.getNextMonth = function () {
        var nextMonthDate;
        if (date.getMonth() == 11) {
            nextMonthDate = new Date(date.getFullYear() + 1, 0, date.getDate());
        } else {
            nextMonthDate = new Date(date.getFullYear(), date.getMonth() + 1, 1);
        }
        return new Day(nextMonthDate);
    }
    //Возвращает объект-Day предыдущего месяца
    this.getPrevMonth = function () {
        var prevMonthDate;
        if (date.getMonth() == 0) {
            prevMonthDate = new Date(date.getFullYear() - 1, 11, date.getDate());
        } else {
            prevMonthDate = new Date(date.getFullYear(), date.getMonth() - 1, 1);
        }
        return new Day(prevMonthDate);

    }

    this.getMonthName = function () {
        var monthArr = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь']
        return monthArr[date.getMonth()];
    }
    this.getDayName = function () {
        var monthArr = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье']
        return monthArr[this.getDayNum()];
    }

};

//заполняет грид
function operation(day) {

    inputDay = day;

    //определяя, текущий ли месяц, и сегодняшняя ли дата?
    var curTable = document.getElementsByClassName('calendargrid')[0];
    var rows = curTable.rows;
    var maxI = day.getLastDay().getDateObj().getDate();

    infillRightBar(day);

    day = day.getFirstDay();
    if (day.getDayNum() == 0) {
        day = day.getPrevDay();
    }
    while (day.getDayNum() != 0) {
        day = day.getPrevDay();
    }

    for (var i = 1; i < 7; i++) {
        for (var j = 0; j < 7; j++) {
            var cell = rows[i].cells[j];
            if (day.getDateObj().getMonth() != inputDay.getDateObj().getMonth()) {
                cell.className = "nocur";
            } else {
                cell.className = "";
            }
            if (day.isCurDate()) {
                cell.innerHTML = "<b>" + day.getDay() + "</b>";
            } else {
                cell.innerHTML = day.getDay();
            }
            day = day.getNextDay();
        }
    }

}

$(document).ready(function () {
    var currentDay = new Date();
    //currentDay = new Date("23 Jan 2013");
    localStorage.setItem('currentDay', currentDay);
    localStorage.setItem('selectedDay', currentDay);
    //var month = infillMonth(currentDay);
    var day = new Day(currentDay);

    operation(day);
});


$(".forw-arrow").live('click', function () {

    var nextMonhtDate = new Date(localStorage.getItem('selectedDay'));
    var day = new Day(nextMonhtDate);
    day = day.getNextMonth();
    localStorage.setItem('selectedDay', day.getDateObj());
    operation(day);
});


$(".back-arrow").live('click', function () {

    var prevMonhtDate = new Date(localStorage.getItem('selectedDay'));
    var day = new Day(prevMonhtDate);
    day = day.getPrevMonth();
    localStorage.setItem('selectedDay', day.getDateObj());
    operation(day);
//localStorage.setItem('currentDay', day.getDateObj());
});


//вешаем обработчик на грид
$(".calendargrid td ").live('click', function () {
    if ($(this).attr('class') != 'nocur') {
        var day = new Date(localStorage.getItem('selectedDay'));
        if (null == day) {
            day = new Date(localStorage.getItem('currentDay'));
        }
        day = new Date(day.getFullYear(), day.getMonth(), $(this).text());
        localStorage.setItem('selectedDay', day);
        infillRightBar(new Day(day));
    }


});
//заполняет правую панель
function infillRightBar(day) {
    $('.month-year-header').text(day.getMonthName() + ' ' + day.getDateObj().getFullYear());
    $('.calendar-selecteddate > h1').text(day.getDay());
    $('.calendar-selecteddate > h2').text(day.getMonthName() + ' ' + day.getDateObj().getFullYear());

}