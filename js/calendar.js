//Объект день месяца
function Day(vDate) {
	var date = vDate;

 	//Возвращает номер дня недели
 	this.getDayNum = function() {
 		return date.getDay();
 	}
 	//возвращает номер дня месяца
 	this.getDay = function() {
 		return date.getDate();
 	}

 	//возвращает объект-Date() текущего дня
 	this.getDateObj = function() {
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
	this.getWeekNum = function() {
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
	this.getNextDay = function() {

		if (date.getDate() == this.getLastDay().getDay()) {
 			return this.getNextMonth().getFirstDay();
  		} else {
 			return new Day(new Date(date.getFullYear(),  date.getMonth(), date.getDate()+1));
 		}
 	}
	//Возвращает объект-Day предыдущего дня
 	this.getPrevDay = function() {
		if (date.getDate() == this.getFirstDay().getDay()) {
 			return this.getPrevMonth().getLastDay();
  		} else {
 			return new Day(new Date(date.getFullYear(),  date.getMonth(), date.getDate()-1));
 		}		
 	}

 	//Возвращает объект-Day первого дня месяца
 	this.getFirstDay = function() {
 		return new Day(new Date(date.getFullYear(), date.getMonth(), 1));
 	}
 	//Возвращает объект-Day последнего дня месяца
 	this.getLastDay = function() {
 		return new Day(new Date(date.getFullYear(), date.getMonth() + 1, 0));
 	}
 	//Возвращает объект-Day следующего месяца
 	this.getNextMonth = function() {
 		var nextMonthDate;
 		if (date.getMonth() == 11) {
 			nextMonthDate = new Date(date.getFullYear()+1, 0, date.getDate());
 		} else {
 			nextMonthDate = new Date(date.getFullYear(), date.getMonth()+1, 1); 			
 		}
 		return new Day(nextMonthDate);
 	}
 	//Возвращает объект-Day предыдущего месяца
 	this.getPrevMonth = function() {
 		var prevMonthDate;
 		if (date.getMonth() == 0) {
 			prevMonthDate = new Date(date.getFullYear()-1, 11, date.getDate());
 		} else {
 			prevMonthDate = new Date(date.getFullYear(), date.getMonth()-1, 1); 			
 		}
 		return new Day(prevMonthDate);

 	}

 	this.getMonthName = function() {
 		var monthArr = ['Январь', 'Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь']
 		return monthArr[date.getMonth()];
 	}

};

//заполняет грид
function operation(day){

	//TODO:достаточно определить день, с которого начинать отсчет, и сделать 6х7 некстов
	//определяя, текущий ли месяц, и сегодняшняя ли дата?
	var curTable =  document.getElementsByClassName('calendargrid')[0];
	var rows = curTable.rows;
	var maxI = day.getLastDay().getDateObj().getDate();

	var myh =  document.getElementsByClassName('month-year-header')[0] ;
	myh.innerHTML = day.getMonthName() + ' ' + day.getDateObj().getFullYear();

	day = day.getFirstDay();
	for (var i = 1; i <= maxI;  i++) {

		var curRow = rows[day.getWeekNum()];
		var cell = curRow.cells[day.getDayNum()];
		if (day.isCurDate()) {
			cell.innerHTML = "<b>" + day.getDay() + "</b>"; 
		} else {
			cell.innerHTML = day.getDay(); 
		}
		cell.className = "";
		
		day = day.getNextDay(); 
	}
	
	var x = 0;	

	//заполним дни после текущего месяца
	var startWeekNum = day.getPrevDay().getWeekNum();
	if (day.getPrevDay().getDayNum() == 6) {
		startWeekNum = startWeekNum + 1;
	}
	for (var i = startWeekNum ; i <=6; i++) {

		for (var j = day.getDayNum(); j <= 6; j++) {
			var curRow = rows[i];
			var cell = curRow.cells[day.getDayNum()];
			cell.innerHTML = day.getDay(); 
			cell.className = "nocur";
			day = day.getNextDay();
		}			 
	}

	//заполним дни до текущего месяца
	//получили первый день текущего месяца
	day = day.getFirstDay().getPrevMonth().getPrevDay();

	for (var j = day.getDayNum(); j >= 0; j--) {
		var curRow = rows[1];
		var cell = curRow.cells[day.getDayNum()];
		cell.className = "nocur";
		cell.innerHTML = day.getDay(); 
		day = day.getPrevDay();
		
	}			 


}

$(document).ready(function(){
	var currentDay = new Date();	
	//currentDay = new Date("23 Jan 2013");
	localStorage.setItem('currentDay', currentDay);
	//var month = infillMonth(currentDay);
	var day = new Day(currentDay);

	operation(day);

	
	var divTag =  document.getElementsByClassName('forw-arrow')[0];
	divTag.onclick = function () {
		
		var nextMonhtDate = new Date(localStorage.getItem('currentDay'));
		var day = new Day(nextMonhtDate);
		day = day.getNextMonth();
		operation(day);
		localStorage.setItem('currentDay', day.getDateObj());
		
	}

	divTag =  document.getElementsByClassName('back-arrow')[0];
	divTag.onclick = function () {
		
		var prevMonhtDate = new Date(localStorage.getItem('currentDay'));
		var day = new Day(prevMonhtDate);
		day = day.getPrevMonth();
		operation(day);
		localStorage.setItem('currentDay', day.getDateObj());
		
	}	
});