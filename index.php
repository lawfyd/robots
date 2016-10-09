<?php
//get code response
/*$url = 'http://www.example.com';

#print_r(get_headers($url));

print_r(get_headers($url, 1));*/


$btn = '<input class="btn-success" value="Проверить" type="submit" id="submitFF">';
$str = '<input name="data_input" value="">';

echo "<form enctype=\"multipart/form-data\" method='post' action='class/decor_xls.php' id='square_form'> <fieldset> $str </fieldset> $btn </form>";
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