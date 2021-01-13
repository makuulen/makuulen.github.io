$(document).ready(function () {
	$.ajax({
		type: "GET",
		url: "http://teatama.hostronavt.ru/counter.php?callback=?",
		dataType: 'jsonp',
		success: function (data){
			$('.text .counter').html(data.counter);
		}
	});
});
