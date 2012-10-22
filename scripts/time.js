	 var current_date = new Date( );
     var gmt_offset = current_date.getTimezoneOffset( ) / 60;
	var dst;
	var timeZoneImInFromGMT = 0;


daylight();
getTime(dst);


function stdTimezoneOffset () {
	var jan = new Date(new Date().getFullYear(), 0, 1);
	var jul = new Date(new Date().getFullYear(), 6, 1);
	return Math.max(jan.getTimezoneOffset(), jul.getTimezoneOffset());
}

function daylight() {
	dst = gmt_offset < stdTimezoneOffset();
	console.log(gmt_offset < stdTimezoneOffset());
}


function getTime(dst){

	var currentDate = new Date();
	var seconds = currentDate.getSeconds();
	var minute = currentDate.getMinutes();

if(dst == true){	
	var hours = currentDate.getHours();
	hours = hours + 1;
	hours += gmt_offset;
	hours += timeZoneImInFromGMT;
	};

if(dst == false){	
	var hours = currentDate.getHours();
	hours += gmt_offset;
	hours += timeZoneImInFromGMT;
	};
	
	var day = currentDate.getDate();
	var month = currentDate.getMonth() + 1;
	var year = currentDate.getFullYear();

if(hours < 0){
	hours += 24;
}	
	if(hours < 10){
		hours = "0" + hours;
	}
	
	if (minute < 10) {
		minute = "0" + minute;
	}
	
	if (seconds < 10) {
		seconds = "0" + seconds;
	}

document.getElementById("clock").innerHTML = "Time where I am; " + hours+":"+minute+":"+seconds ;	
window.setTimeout("getTime(dst)", 1000);

}


