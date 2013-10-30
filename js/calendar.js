function MyObject(dayNum, dayOfWeak) {
	this._dayNum = dayNum;
	this._dayOfWeak = dayOfWeak;
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

	

	//dateObj = new Date("21 Dec 2011");
	dateObj = new Date();
	//получили последний день месяца
	var lastDay = new Date(dateObj.getFullYear(), dateObj.getMonth() + 1, 0);
	lastDay = lastDay.getDate();
	//получили день недели
	var dayOfWeak = dateObj.getDay();
	//получили день месяца
	var firstDateOfdayOfWeak = dateObj.getDate()%7;
	
	var dayOfWeakForCreate = (dayOfWeak - firstDateOfdayOfWeak + 8)%7;
	var myObject = new MyObject(1, dayOfWeakForCreate);

	
	for (var i = 1; i <= lastDay; i++) {
		month[Math.ceil((dayOfWeakForCreate + i-1)/7)][i] = new MyObject(i, (myObject._dayOfWeak+i)%7);
	};

	myObject = month[3][4];


	var s;
	if (myObject._dayOfWeak == 0) {
		s = 'Sun';
	} else if (myObject._dayOfWeak == 1) {
		s = 'Mon';
	} else if (myObject._dayOfWeak == 2) {
		s = 'Tue';
	} else if (myObject._dayOfWeak == 3) {
		s = 'Wen';
	} else if (myObject._dayOfWeak == 4) {
		s = 'The';
	} else if (myObject._dayOfWeak == 5) {
		s = 'Fri';
	} else if (myObject._dayOfWeak == 6) {
		s = 'Sat';
	};




	alert(s);

	return month;

};


$(document).ready(function(){
	var month = infillMonth();
});