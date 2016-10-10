<?php

getDirectory();

function getDataFromRobots($url) {
    try { 

        // Подключение класса для работы с robots.txt
        include_once 'RobotsTxt.php';

        // Инициализация объекта для robots.txt сайта http:

        $robotsTxt = new Xbb_RobotsTxt(
            $url
        );
        
        // Выведет: http://
       // echo $robotsTxt->getSite();

        // Покажет массив со структурированными данными о директивах
        // из urlrobots.txt
        $derectives = $robotsTxt->getDirectives();
        return $derectives;
/*
       
*/
    } catch (Exception $e) {
        return $e->getMessage(); // Чтобы знать ошибку
    }
}

function getDirectory() {
    require_once "decor_xls.php";

    $arr_inf = array();
    $arr_full_inf = array();
    $check_host = 'host'; //1
    $cnt_host = 0; //2
    $check_sitemap = 'sitemap';
    $mark_sitemap = false;
    $arr_direct = getDataFromRobots($_POST['data']);
    
    if(gettype($arr_direct) == 'string') {
        echo $arr_direct;die;
        //return false;
    }
    $file = new Xbb_RobotsTxt($_POST['data']);

    $file_size = $file->file_size;
    foreach ($arr_direct as $value) {
        for ($i = 0; $i < count($value); $i++) {
            $directive = strtolower($value[$i][0]);
            switch ($directive) {
                case $check_host:
                    $cnt_host += 1;
                    break;
                case $check_sitemap:
                    $mark_sitemap = true;
                    break;
                }
            }
        }
    $arr_inf['robots'] = 'OK';
    $arr_inf['host'] = $cnt_host ? 'OK' : 'Ошибка';
    $arr_inf['cnt_host'] = $cnt_host ? 'OK' : 'Ошибка';
    $arr_inf['size_file'] = $file_size ? 'OK' : 'Ошибка';
    $arr_inf['check_sitemap'] = $mark_sitemap ? 'OK' : 'Ошибка';
    $arr_inf['code_response'] = 'OK';

    $arr_full_inf['robots'] = 'Файл robots.txt присутствует';
    $arr_full_inf['host'] = $cnt_host ? 'Директива Host указана' : 'В файле robots.txt не указана директива Host';
    $arr_full_inf['cnt_host'] = $cnt_host ? 'В файле есть ' . $cnt_host . ' дирестив Host' : 'в файле нет директив Host';
    $arr_full_inf['size_file'] = $file_size > 32 ? 'Размер файла: ' . $file_size . 'байт больше чем 32 байта' : 'Размер файла: ' . $file_size;
    $arr_full_inf['check_sitemap'] = $mark_sitemap ? 'Директива Sitemap указана' : 'Директива Sitemap не указана';
    $arr_full_inf['code_response'] = 200;
    //var_dump($arr_inf);die;
    //var_dump($arr_inf);die;


    return [$arr_inf, $arr_full_inf];
}
