//Объект день месяца
function MyObject(dayNum, dayOfWeak) {
	this._dayNum = dayNum; //дата
	this._dayOfWeak = dayOfWeak; //название дня
};


//Возвращает массив-заготовку под текущий месяц
function getArrayOfDays() {
	var month = new Array();
	for (var i=0; i<6; i++) {
		month[i] = new Array();
	};	
	return month;
};


function infillMonth() {

	var month = getArrayOfDays();

	//currenaDay = new Date("21 Dec 2011");

	//текущая дата
	var currenaDay = new Date();	
	//получили первый день месяца
	var firstDay = new Date(currenaDay.getFullYear(), currenaDay.getMonth(), 1);
	//firstDay = firstDay.getDate();
	//получили последний день месяца
	var lastDay = new Date(currenaDay.getFullYear(), currenaDay.getMonth() + 1, 0);
	lastDay = lastDay.getDate();
	
	var shiftDay = firstDay.getDay();

	for (var i = 1; i <= lastDay; i++) {
		var nextDay = new MyObject(i, (shiftDay + i-1)%7);
		month[Math.ceil((nextDay._dayNum + shiftDay)/7)-1][(i)%7] = nextDay;
	};

	return month;

};


$(document).ready(function(){
	var month = infillMonth();
});