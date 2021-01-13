$(document).ready(function () {
alert();
	$.ajax({
		type: "GET",
		url: "http://teatama.hostronavt.ru/counter.php?callback=?",
		dataType: 'jsonp',
		success: function (data){
                        alert(data.counter);
			$('.text .counter').html(data.counter);
		},
                error: function(){
alert("ошибка");
}
	});
});
