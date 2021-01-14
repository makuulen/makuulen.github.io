$(document).ready(function () {
var formData = new FormData();

formData.append("username", "Groucho");
formData.append("accountnum", 123456);

var request = new XMLHttpRequest();
request.open("POST", "//teatama.hostronavt.ru");
request.send(formData);
});
