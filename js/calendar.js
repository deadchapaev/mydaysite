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

	

	//текущая дата
	var currentDay = new Date();	
	//currentDay = new Date("21 Dec 2013");
	//получили первый день месяца
	var firstDay = new Date(currentDay.getFullYear(), currentDay.getMonth(), 1);
	//firstDay = firstDay.getDate();

	//получили последний день месяца
	var lastDay = new Date(currentDay.getFullYear(), currentDay.getMonth() + 1, 0);
	lastDay = lastDay.getDate();
	
	var shiftDay = firstDay.getDay();

	for (var i = 1; i <= lastDay; i++) {
		var nextDay = new MyObject(i, ((i - 1) + shiftDay) % 7);


		var weak = Math.ceil((i + shiftDay) / 7);
		var day = (i+1) % 7;

		month[weak][day] = nextDay;
	};

	return month;
};


$(document).ready(function(){
	var month = infillMonth();
	operation(month);
});

function operation(month){

    var table = document.getElementsByClassName('calendargrid');
    var curTable = table[0];

	for (var row_i = 0;  row_i <= curTable.rows.length;  row_i++) {
		for (var col_j = 0; col_j <= curTable.rows[row_i].cells.length; col_j++) {

				var curDay = month[row_i][col_j];
				if (null != curDay) {
					var rows = curTable.rows;
					var curRow = rows[row_i];
					var cell = curRow.cells[col_j];
					cell.innerHTML = curDay._dayNum;  	
				}
				
		
		}		
	}
}