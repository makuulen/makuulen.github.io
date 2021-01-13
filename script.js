$(document).ready(function () {
	$.ajax({
		type: "GET",
		url: "http://site2.ru/counter.php?callback=?",
		dataType: 'jsonp',
		success: function (data){
			$('.text .counter').html(data.counter);
		}
	});
});