$(document).ready(function () {

    $("#submitFF").click(function () {
        event.preventDefault();
        var data = $('form input').val();
        $.ajax({
            url: 'class/robo.php',
            data: 'data=' + data,
            //dataType:'json',
            type: 'post',
            success: function (data) {
                console.log(data);

                $("#error").html(data);
                
                
            }

        })
    })
});




/*
заполнение начальных данных js

 $(document).ready(function () {
 var quantity = 1000;
 var str = '';
 var input = document.createElement('input');

 $( "#square_form" ).html("<form method='POST' ><fieldset></fieldset></form>");

 for(var i = 0; i <= quantity; i++) {
 var randomNumber = getRandomArbitary(1, 9999);
 str += '<input value= ' + randomNumber + '>';
 }
 $( "form fieldset" ).html(str);
 $("form").append('<input class="btn-success" value="Изменить" type="submit" id="submitFF">');

 $("#submitFF").click(function () {
 event.preventDefault();
 $.ajax({
 url:'migrate.php',
 data:'sort_id=', // sort_id=name_a
 type:'post',
 success:function (html) {
 alert(html);
 }
 });
 });

 });


*/


/*
 $(document).ready(function () {

 $("#submitFF").click(function () {
 event.preventDefault();
 var data = $('form input').val();
 $.ajax({
 url:'class/robo.php',
 data:'data=' + data,
 //dataType:'json',
 type:'post',

 //получаем данные от сервера и выводим их
 success:function (html) {
 $.ajax({
 type:'POST',
 url:"decor_xls.php",
 data: {},
 dataType:'json'}).done(function(data){
 var $a = $("<a>");
 $a.attr("href",data.file);
 $("body").append($a);
 $a.attr("download","file.xls");
 $a[0].click();
 $a.remove();
 });

 }});
 //});

 });}
*/
