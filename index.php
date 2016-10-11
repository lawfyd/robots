<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<form enctype="multipart/form-data" method='post' action='class/decor_xls.php' id='square_form'>
    <input name="data" value=""><br><br>
    <input class="btn-success" value="Проверить" type="submit" id="submitFF">
</form>
<div id="error"></div>

<?php
//get code response
/*$url = 'http://www.example.com';

#print_r(get_headers($url));

print_r(get_headers($url, 1));*/



/*

try { // Вдруг чего случится

    // Подключение класса для работы с robots.txt
    include_once 'class/RobotsTxt.php';

    // Инициализация объекта для robots.txt сайта http://вася.пупкин/
    $robotsTxt = new Xbb_RobotsTxt(
        'https://www.youtube.com/'
    );

    // Выведет: http://вася.пупкин/
    echo $robotsTxt->getSite();

    // Покажет массив со структурированными данными о директивах
    // из http://вася.пупкин/robots.txt
    var_dump ( $robotsTxt->getDirectives() );

    // Проверяем доступность страницы для заданного бота
    if ( $robotsTxt->allow('https://www.youtube.com/', 'Yandex') ) {
        echo 'Секретная страница Васи Пупкина РАЗРЕШЕНА для индексации Яндексом';
    } else {
        echo 'Секретная страница Васи Пупкина ЗАПРЕЩЕНА для индексации Яндексом';
    }

    // Еще одна проверка
    if ( $robotsTxt->allow('https://www.youtube.com/', 'Google') ) {
        echo 'Продажная страница Васи Пупкина РАЗРЕШЕНА для индексации Гуглом';
    } else {
        echo 'Продажная страница Васи Пупкина ЗАПРЕЩЕНА для индексации Гуглом';
    }

} catch (Exception $e) {
    echo $e->getMessage(); // Чтобы знать ошибку
}*/
?>

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/script.js"></script>

</body>
</html>