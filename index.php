<?php
		if(isset($_COOKIE["good"])) {
		} else {
			header("Location:acount.php");
		}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=320, initial-scale=1">
    <meta charset="utf-8">
    <script type="text/javascript" src="jQuery.js"></script>
    <script src="2.0.0.clipboard.min.js"></script>
    <style>
      #futer {
        background-color: #00ea00;
        width: 100%;
        height: 30px;
      }
      body {
        background-color: #8b9aea;
      }
      #kol {
        position: relative;
        float: left;
        color: #ff91cb;
        display: block;
        padding: 5px;
      }
      #obsize {
      	display: inline-block;
      	padding: 5px;
      	color: #ed1c00;
      }
      #imgdiv {
        position: relative;
        float: right;
        display: block;
      } 
      #fbody {
        display: none;
      }
      #plusf {
          cursor: pointer;
        width: 20px;
        padding: 5px;
      }
      #div {
          display: none;
      }
      #filego {
          display: none;
          width: 100%;
          background-color: #d4a459;
          margin-bottom: 5px;
      }
      .fileok{
          margin: 5px;
        width: 120px;
        display: inline-block;
        background-color: #00d900;
        text-align: center;
        vertical-align: top;
        min-height: 130px;
      }
      .dop {
        border: 2px solid red;
        background-color: #ffddcb;
        font-size: 13px;
        cursor: pointer;
      }
      .dopf {
        display: none;
      }
      .dop01 {
        padding-left: 43px;
        padding-right: 43px;
        margin--bottom: 2px;
      }
      .dop02 {
        padding-left: 32px;
        padding-right: 32px;
        display: none;
      }
      .dop1 {
        padding-left: 31px;
        padding-right: 31px;
      }
      .dop2 {
        padding-left: 26px;
        padding-right: 26px;
      }
      .namefile {
        font-size: 13px;
        margin-bottom: 10px;
      }
      .inpdiv {
          display: none;
        width: 80px;
      }
      .dop3 {
        padding-left: 8px;
        padding-right: 8px;
      }
      .dop4 {
        padding-left: 33px;
        padding-right: 33px;
      }
      .dop5 {
        display: none;
        padding-left: 37px;
        padding-right: 37px;
      }
      .dop6 {
        padding-left: 10px;
        padding-right: 10px;
      }
      .dop7 {
        padding-left: 3px;
        padding-right: 3px;
      }
      #infomail{
        font-size: 17px;
      }
      .textform {
        font-size: 15px;
      }
      #emailform {
          display: none;
  width: 300px;
  height: 250px;
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
        }
        .error {
            display: none;
            color: red;
            font-size: 13px;
        }
        #closeemail {
            cursor: pointer;
        }
        #center {
            
        }
        #nameopen {
        position: relative;
        float: left;
      }
      #inp {
        position: relative;
        float: right;
      }
      #cont {
        text-align: center;
        width: 100%;
        height: 100%;
      }
      #img0 {
          max-width: 90%;
        max-height: 60%;
        position: absolute;
    margin: auto;
    left: 0;
    top: 0;
    bottom: 0;
    right: 0;
      }
      .but {
        border: 2px solid red;
        background-color: #ffddcb;
        padding: 2px;
        cursor: pointer;
      }
      #openfile {
          display: none;
      }
      #opdiv {
          display: none;
      }
      #opinp {
          display: none;
      }
      #op0 {
          display: none;
      }
      #bret {
      	border: 2px solid red;
        background-color: #edb42e;
        padding: 2px;
        cursor: pointer;
      }
      .mediacon {
      	 max-width: 90%;
      	 margin-top: 3px;
      }
      .urlop {
      	display: none;
      }
      #cloud {
        display: none;
        width: 110px;
        height: 200px;
        position: absolute;
    margin: auto;
    left: 0;
    top: 0;
    bottom: 0;
    right: 0;
        text-align: center;
        font-family: Verdana;
        font-size: 12px;
        cursor: pointer;
      }
    </style>
    <script>
      $(document).ready(function() {
        $.ajax({
          url: "form.php",
          type: "POST",
          dataType: "html",
          data: ({type: "read"}),
          success: function (data) {
              var obs = 0;
            if (data != ""){
                var reg1 = /jpg|jpeg|raw|psd|bmp|gif|png|tiff|jp2|JPG|JPEG|RAW|PSD|BMP|GIF|PNG|TIFF|JP2/i;
                var reg2 = /mp4|ogv|webm|mov|MP4|OGV|WEBM|MOV/i;
                var reg3 = /mp3|ogg|wav|MP3|OGG|WAV/i;
                var reg4 = /zip|gzl|tar|rar|7z|ZIP|GZL|TAR|RAR|7Z/i;
                var regs1 = /\d/;
                var regs2 = /[А-Я]/
              var i = 0;
              while(data != "") {
                var url = data.substring(0, data.indexOf("~") + 1);
                var src = url.substring(0, url.indexOf("["));
                var info = url.substring(url.indexOf("[") + 1, url.indexOf("]"));
                var size = info.substring(0, info.indexOf(";"));
                var propen = info.substring(info.indexOf(";") + 1, info.length);
                var name = url.substring(url.indexOf("`") + 1, url.indexOf("~"));
                var type = src.substring(src.lastIndexOf(".") + 1, src.length);
                var nums = parseFloat(size.match(regs1));
                if (size.match(regs2) == "Г") {
                    obs += nums;
                } else if (size.match(regs2) == "М") {
                    obs += nums / 1000;
                } else if (size.match(regs2) == "К") {
                    obs += nums / 1000000;
                } else if (size.match(regs2) == "") {
                    obs += nums / 1000000000;
                }
                var div = $("#div").clone();
                $(div).attr("id", "div" + i);
                $("#center").append(div);
                $("#div" + i + " .retname").text(name);
                $("#div" + i + " .size").text(size);
                url = src.replace(/\s/g, "%");
                url = "url.php?url=" + url;
                var href = document.location.href;
                  href = href.substring(0, href.lastIndexOf("/") + 1);
                $("#div" + i + " .urlop").text(href + url);
                $("#div" + i + " .dop6").replaceWith("<span class='dop6 dop dopcopy' data-clipboard-text='" + href + url + "'>" + $("#div" + i + " .dop6").html() + "</span>");
                $("#div" + i + " .dop8").replaceWith("<span class='dop8 dop dopcopy' data-clipboard-text='" + href + url + "'>" + $("#div" + i + " .dop8").html() + "</span>");
                if(reg1.test(type)) {
                  $("#div" + i + " .imgvid").html("<img class='mediacon' height='60px' src='" + src + "'/>");
                } else if (reg2.test(type)){
                    $("#div" + i + " .imgvid").html("<video class='mediacon' controls src='" + src + "' height='60px'></video>");
                    $.ajax ({
          url: "form.php",
          type: "POST",
          dataType: "html",
          async: false,
          data: ({type: "prmail"}),
          success: function (e) {
              if(e == "h") {
                  $("#div" + i + " .imgvid").html("<video class='mediacon' controls src='" + src + "' height='60px'></video>");
              } else if (e == "s") {
                  $("#div" + i + " .imgvid").html("<img class='mediacon' height='60px' src='" + src + "'/>");
              }
            }
            });
                } else if (reg3.test(type)) {
                    $("#div" + i + " .imgvid").html("<audio class='mediacon' style='width:100px;height:20px;padding-top:30px' controls src='" + src + "'></audio>");
                } else if (reg4.test(type)) {
                    $("#div" + i + " .dop1").text("Разархивировать");
                    $("#div" + i + " .dop1").css("padding-left", "7px");
                    $("#div" + i + " .dop1").css("padding-right", "7px");
                    $("#div" + i + " .imgvid").html("<img class='mediacon' longdesc='" + src + "' src='media/zip.png height='60px'/>");
                } else {
                    $("#div" + i + " .imgvid").html("<img class='mediacon' longdesc='" + src + "' src='media/file.jpg' height='60px'/>");
                }
                if(propen == "n") {
                    $("#div" + i + " .dop7").hide();
                    $("#div" + i + " .dop8").hide();
                } else if(propen == "y") {
                    $("#div" + i + " .dop6").hide();
                    $("#div" + i + " .dop8").show();
                } 
                i++;
                data = data.substring(data.indexOf("~") + 1, data.length);
              }
              var ost = i % 10;
              if(ost == 1) {
                $("#kol").html(i + " файл");
              } else if (ost < 5 && ost != 1) {
                $("#kol").html(i + " файла");
              } else {
                $("#kol").html(i + " файлов");
              }
              $(".dop01").click(function() {
          var id = $(".fileok:hover").attr("id");
          $("#" + id + " .retname").show();
            $("#" + id + " .inpdiv").hide();
          $("#" + id + " .dopf").show();
          $("#" + id + " .dop01").hide();
          $("#" + id + " .dop02").show();
        });
        $(".dop02").click(function() {
          var id = $(".fileok:hover").attr("id");
          $("#" + id + " .retname").show();
            $("#" + id + " .inpdiv").hide();
          $("#" + id + " .dopf").hide();
          $("#" + id + " .dop01").show();
          $("#" + id + " .dop02").hide();
        });
        $(".dop3").click(function() {
          var id = $(".fileok:hover").attr("id");
          var val = $("#" + id + " .retname").text();
          $("#" + id + " .retname").hide();
          $("#" + id + " .inpdiv").show();
          $("#" + id + " .inpdiv").val(val);
          $("#" + id + " .dop5").show();
            $("#" + id + " .dop3").hide();
        });
        $(".dop5").click(function() {
          var id = $(".fileok:hover").attr("id");
          var name = $("#" + id + " .retname").text();
          var val = $("#" + id + " .inpdiv").val();
          $("#" + id + " .retname").show();
          $("#" + id + " .inpdiv").hide();
          $("#" + id + " .inpdiv").val("");
          $("#" + id + " .dop3").show();
            $("#" + id + " .dop5").hide();
          if (name != val) {
            $("#" + id + " .retname").text(val);
            var src = $("#" + id + " .mediacon").attr("longdesc");
                     if (src == undefined) {
                         var src = $("#" + id + " .mediacon").attr("src");
                     }
            $.ajax ({
          url: "form.php",
          type: "POST",
          dataType: "html",
          data: ({type: "newname", name: val, src: src})
          });
          }
        });
        $(".dop4").click(function() {
          var id = $(".fileok:hover").attr("id");
            var src = $("#" + id + " .mediacon").attr("longdesc");
                     if (src == undefined) {
                         var src = $("#" + id + " .mediacon").attr("src");
                     }
            $.ajax ({
          url: "form.php",
          type: "POST",
          dataType: "html",
          data: ({type: "str", src: src})
          });
          $("#" + id).remove();
          var reg = /\d/g;
          var t = $("#kol").text();
          var i = parseInt(t.match(reg));
          i--;
          var ost = i % 10;
          if(ost == 0) {
          	$("#cloud").show();
          }
              if(ost == 1) {
                $("#kol").html(i + " файл");
              } else if (ost < 5 && ost != 1) {
                $("#kol").html(i + " файла");
              } else {
                $("#kol").html(i + " файлов");
              }
        });
        $(".dop2").click(function() {
            var id = $(".fileok:hover").attr("id");
            var src = $("#" + id + " .mediacon").attr("longdesc");
                     if (src == undefined) {
                         var src = $("#" + id + " .mediacon").attr("src");
                     }
            var name = $("#" + id + " .retname").text();
                  $.ajax ({
          url: "form.php",
          type: "POST",
          dataType: "html",
          data: ({type: "prmail"}),
          success: function (data) {
              if(data == "h") {
                  var href = document.location.href;
                  href = href.substring(0, href.lastIndexOf("/") + 1);
                  var a = document.createElement("a");
                  a.download = name;
                  a.href = href + src;
                  a.click();
              } else if(data == "s") {
                  $("#emailform").show();
                  $("#futer").hide();
                  $("#center").hide();
                  $("#nfile").val(name);
                  $("#subemail").click(function (){
                      $(".error").hide();
                      var pol = $("#npol").val();
                      var file = $("#nfile").val();
                      var email = $("#neml").val();
                      file = file + src.substring(src.lastIndexOf("."), src.length);
                      var reg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i;
                      if (pol == "") {
                           $("#epol").show();
                      } else if (email == "") {
                           $("#nem").show();
                      } else if (file == "") {
                           $("#efile").show();
                      } else if (reg.test(email) == false) {
                           $("#eem").show();
                      } else {
                          $.ajax ({
          url: "form.php",
          type: "POST",
          dataType: "html",
          data: ({type: "email", np: pol, nf: file, src: src, email: email}),
          beforeSend: function (data) {
          	$("#emailform").hide();
                  $("#futer").show();
                  $("#center").show();
                  $("#filego").show();
                  $("#filego").text("Файл отправляется");
          },
          success: function (data) {
          	alert(data);
                  if (data == "t") {
                      $("#filego").text("Файл отправлен");
                  } else {
                      $("#filego").text("Не удалось отправить файл");
                  }
                  setTimeout(function() {
                      $("#filego").hide();
                  }, 3000);
          }
          });
                      }
                  });
              }
              $("#closeemail").click(function() {
                  $("#emailform").hide();
                  $("#futer").show();
                  $("#center").show();
              });
          }
        });
              });
              $(".dop1").click(function() {
                    var id = $(".fileok:hover").attr("id");
                     var src = $("#" + id + " .mediacon").attr("longdesc");
                     if (src == undefined) {
                         var src = $("#" + id + " .mediacon").attr("src");
                     }
                     var type = src.substring(src.lastIndexOf(".") + 1, src.length);
                      var reg1 = /jpg|jpeg|raw|psd|bmp|gif|png|tiff|jp2|JPG|JPEG|RAW|PSD|BMP|GIF|PNG|TIFF|JP2|mp4|ogv|webm|mov|MP4|OGV|WEBM|MOV|mp3|ogg|wav|MP3|OGG|WAV/i;
                      var reg2 = /zip|gzl|tar|rar|7z|ZIP|GZL|TAR|RAR|7Z/i;
                      if(reg1.test(type)) {
                          var con = $("#" + id + " .mediacon").clone();
                          var siz = $("#" + id + " .size").text();
                          var url = $("#" + id + " .urlop").text();
                        $("#op2").replaceWith("<span class='but dopcopy' id='op2' data-clipboard-text='" + url + "'>" + $("#op2").html() + "</span>");
                $("#op4").replaceWith("<span class='but dopcopy' id='op4' data-clipboard-text='" + url + "'>" + $("#op4").html() + "</span>");
                          var none = $("#" + id + " .dop7").css("display");
                          if (none == "none") {
                              $("#op3").hide();
                              $("#op4").hide();
                          } else {
                              $("#op2").hide();
                          }
                          $("#op0").hide();
                          $(con).removeAttr("class style height width");
                          $(con).attr("id", "img0");
                           var name = $("#" + id + " .retname").text();
                          $("#openfile").show();
                  $("#futer").hide();
                  $("#center").hide();
                  $("#opname").text(name);
                  $("#opdiv").text(id);
                  $("#cont").html(con);
                            $("#opsize").text(siz);
                      } else if(reg2.test(type)) {
                          
                      } else {
                          var href = document.location.href;
                  href = href.substring(0, href.lastIndexOf("/") + 1);
                  var a = document.createElement("a");
                  a.target = "_blank";
                  a.href = href + src;
                  a.click();
                      }
            });
            $(".dop6").click(function () {
                var id = $(".fileok:hover").attr("id");
                var src = $("#" + id + " .mediacon").attr("longdesc");
                     if (src == undefined) {
                         var src = $("#" + id + " .mediacon").attr("src");
                     }
                $("#" + id + " .dop6").hide();
                $("#" + id + " .dop7").show();
    $.ajax ({
          url: "form.php",
          type: "POST",
          dataType: "html",
          data: ({type: "open", src: src}),
          success: function (data) {
    				$("#" + id + " .dop8").show();
          	  $("#filego").show();
                $("#filego").text("Ссылка скопирована в буфер обмена");
                setTimeout(function() {
                      $("#filego").hide();
                  }, 3000);
          }
    });
            });
              var clipboard = new ClipboardJS('.dopcopy');
clipboard.on('success', function(e) {
e.clearSelection();
});
clipboard.on('error', function(e) {});
            $(".dop7").click(function () {
                var id = $(".fileok:hover").attr("id");
                var src = $("#" + id + " .mediacon").attr("longdesc");
                     if (src == undefined) {
                         var src = $("#" + id + " .mediacon").attr("src");
                     }
                $("#" + id + " .dop7").hide();
                $("#" + id + " .dop6").show();
                $("#" + id + " .dop8").hide();
    $.ajax ({
          url: "form.php",
          type: "POST",
          dataType: "html",
          data: ({type: "close", src: src})
    });
            });
            $(".dop8").click(function () {
                $("#filego").show();
                $("#filego").text("Ссылка скопирована в буфер обмена");
                setTimeout(function() {
                      $("#filego").hide();
                  }, 3000);
            });
            $("#op1").click(function() {
            var src = $("#img0").attr("src");
            var name = $("#opname").text();
                  $.ajax ({
          url: "form.php",
          type: "POST",
          dataType: "html",
          data: ({type: "prmail"}),
          success: function (data) {
              if(data == "h") {
                  var href = document.location.href;
                  href = href.substring(0, href.lastIndexOf("/") + 1);
                  var a = document.createElement("a");
                  a.download = name;
                  a.href = href + src;
                  a.click();
              } else if(data == "s") {
                  $("#emailform").show();
                  $("#openfile").hide();
                  $("#nfile").val(name);
                  $("#subemail").click(function (){
                      $(".error").hide();
                      var pol = $("#npol").val();
                      var file = $("#nfile").val();
                      var email = $("#neml").val();
                      file = file + src.substring(src.lastIndexOf("."), src.length);
                      var reg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i;
                      if (pol == "") {
                           $("#epol").show();
                      } else if (email == "") {
                           $("#nem").show();
                      } else if (file == "") {
                           $("#efile").show();
                      } else if (reg.test(email) == false) {
                           $("#eem").show();
                      } else {
                          $.ajax ({
          url: "form.php",
          type: "POST",
          dataType: "html",
          data: ({type: "email", np: pol, nf: file, src: src, email: email}),
          beforeSend: function (data) {
          	$("#emailform").hide();
                  $("#futer").show();
                  $("#center").show();
                  $("#filego").show();
                  $("#filego").text("Файл отправляется");
          },
          success: function (data) {
                  if (data == "t") {
                      $("#filego").text("Файл отправлен");
                  } else {
                      $("#filego").text("Не удалось отправить файл");
                  }
                  setTimeout(function() {
                      $("#filego").hide();
                  }, 3000);
          }
          });
                      }
                  });
              }
              $("#closeemail").click(function() {
                  $("#emailform").hide();
                  $("#openfile").show();
              });
          }
        });
              });
            $(document).on("click", "#op2", function () {
                var src = $("#img0").attr("src");
                var id = $("#opdiv").text();
                $("#" + id + " .dop6").hide();
                $("#" + id + " .dop7").show();
                $("#op2").hide();
                $("#op3").show();
    $.ajax ({
          url: "form.php",
          type: "POST",
          dataType: "html",
          data: ({type: "open", src: src}),
          success: function (data) {
            $("#filego").show();
                $("#filego").text("Ссылка скопирована в буфер обмена");
                setTimeout(function() {
                      $("#filego").hide();
                  }, 3000);
    $("#" + id + " .dop8").show();
    $("#op4").show();
          }
    });
            });
            $("#op3").click(function () {
                var id = $("#opdiv").text();
                var src = $("#img0").attr("src");
                $("#" + id + " .dop7").hide();
                $("#" + id + " .dop6").show();
                $("#" + id + " .dop8").hide();
                $("#op3").hide();
                $("#op2").show();
                $("#op4").hide();
    $.ajax ({
          url: "form.php",
          type: "POST",
          dataType: "html",
          data: ({type: "close", src: src})
    });
            });
            $(document).on("click", "#op4", function () {
                $("#filego").show();
                $("#filego").text("Ссылка скопирована в буфер обмена");
                setTimeout(function() {
                      $("#filego").hide();
                  }, 3000);
            });
            $("#op5").click(function() {
          var val = $("#opname").text();
          $("#opname").hide();
          $("#opinp").show();
          $("#opinp").val(val);
          $("#op0").show();
            $("#op5").hide();
        });
            $("#op0").click(function() {
          var id = $("#opdiv").text();
          var name = $("#opname").text();
          var val = $("#opinp").val();
          $("#opname").show();
          $("#opinp").hide();
          $("#opinp").val("");
          $("#op5").show();
            $("#op0").hide();
          if (name != val) {
            $("#" + id + " .retname").text(val);
            $("#opname").text(val);
            var src = $("#img0").attr("src");
            $.ajax ({
          url: "form.php",
          type: "POST",
          dataType: "html",
          data: ({type: "newname", name: val, src: src}),
          });
          }
        });
        $("#op6").click(function() {
          var id = $("#opdiv").text();
            var src = $("#img0").attr("src");
            $.ajax ({
          url: "form.php",
          type: "POST",
          dataType: "html",
          data: ({type: "str", src: src})
          });
          $("#" + id).remove();
          $("#openfile").hide();
                  $("#futer").show();
                  $("#center").show();
          var reg = /\d/g;
          var t = $("#kol").text();
          var i = parseInt(t.match(reg));
          i--;
          var ost = i % 10;
              if(ost == 1) {
                $("#kol").html(i + " файл");
              } else if (ost < 5 && ost != 1) {
                $("#kol").html(i + " файла");
              } else {
                $("#kol").html(i + " файлов");
              }
        });
        		$("#bret").click(function() {
        			$("#openfile").hide();
                  $("#futer").show();
                  $("#center").show();
        		});
            } else {
            	$("#cloud").show();
              $("#kol").html("0 файлов");
            }
            obs = 10 - obs;
            var sv = obs.toFixed(2);
            $("#obsize").text(sv + " Гб свободно из 10 Гб");
            $("#maxfile").val(obs * 1000000000);
          }
      });
      $("#file").on("change", function () {
        var maxsize = $("#maxfile").val();
        if (maxsize > this.files[0].size) {
            var name = prompt("Введите имя файла");
            if(name != null) {
        $("#name").val(name);
        var sub = document.getElementById("sub");
        sub.click();
        }
        }
      });
          });
    </script>
  </head>
  <body>
    <div id="filego"></div>
    <div id="fbody">
     <form id="form" action="form.php" method="post" enctype="multipart/form-data">
       <input type="text" name="name" id="name"/>
       <input type="text" name="maxfile" id="maxfile"/>
       <input type="file" name="upfile" id="file"/>
       <input type="submit" name="click" id="sub"/>
    </form>
    </div>
     <div id="futer">
       <span id="kol"></span>
       <span id="obsize"></span>
       <span id="imgdiv"><label for="file"><img src="media/plus.jpeg" id="plusf"/></label></span>
    </div>
    <div id="center">
    <div class="fileok" id="div">
      <div class="imgvid"></div>
      <div class="namefile">
      <span class="retname"></span>
      <input type="text" class="inpdiv" placeholder="Введите имя файла"/><br/>
      <span class="size"></span><span class="urlop"></span></div>
      <div class="dopf">
        <span class="dop5 dop">Готово</span>
        <span class="dop1 dop">Открыть</span>
        <span class="dop2 dop">Сохранить</span>
        <span class="dop6 dop">Открыть ссылку</span>
        <span class="dop7 dop">Закрыть ссылку</span>
        <span class="dop8 dop"><img class="copyimg" src="media/copybut.jpeg" width="10px"/></span>
        <span class="dop3 dop">Переимененовать</span>
        <span class="dop4 dop">Удалить</span>
      </div>
      <span class="dop dop01">Ещё</span>
      <span class="dop dop02">Закрыть</span>
    </div>
    </div>
    <div id="emailform">
        <img src="media/krest.jpeg" id="closeemail" width="15px"/><br/>
      <span id="infomail">В мобильных браузерах не возможно скачивание файлов.<br/>
        Файл будет отправлен на вашу почту. Заполните пожалуйста форму.
      </span><br/><br/>
      <span class="textform">Ваше имя </span><br/>
      <input type="text" placeholder="Василий" id="npol"/><br/>
      <span class="error" id="epol">Введите ваше имя</span><br/>
      <span class="textform">Ваш email </span><br/>
      <input type="email" placeholder="name@email.com" id="neml"/><br/>
      <span class="error" id="nem">Введите ваш email</span>
      <span class="error" id="eem">Email введен не верно</span><br/>
      <span class="textform">Имя вашего файла</span><br/>
      <input type="text" placeholder="Картинка.jpg" id="nfile"/><br/>
      <span class="error" id="efile">Введите имя вашего файла</span><br/>
      <input type="button" id="subemail" value="Отправить"/>
    </div>
    <div id="openfile">
    <div id="inp">
        <span class="but" id="op0">Готово</span>
      <span class="but" id="op1">Скачать</span>
      <span class="but" id="op2">Открыть ссылку</span>
        <span class="but" id="op3">Закрыть ссылку</span>
        <span class="but" id="op4"><img id="opcopy" src="media/copybut.jpeg" width="10px"/></span><br/><br/>
        <span class="but" id="op5">Переимененовать</span>
        <span class="but" id="op6">Удалить</span>
    </div>
    <div id="infoopen">
      <span id="bret"><< Назад</span><br/><br/>
      <span id="opname"></span>
      <input type="text" id="opinp" placeholder="Введите имя файла"/><br/>
      <span id="opsize"></span>
      <span id="opdiv"></span>
    </div>
    <div id="cont"></div>
    </div>
    <label for="file"><div id="cloud">
      <img src="media/cloud.jpg" width="100px"/><br/>
      Облако пусто<br/>
      Загрузите файл
    </div></label>
  </body>
</html>