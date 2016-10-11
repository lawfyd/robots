<?php

require_once('../PHPExcel/Classes/PHPExcel.php');
// Подключаем класс для вывода данных в формате excel
require_once('../PHPExcel/Classes/PHPExcel/Writer/Excel5.php');
//Подключаем проверку robots.txt
require_once ('robo.php');


$rob = getDirectory();

if(gettype($rob) == 'string') {
    if($rob == 'Файл не существует или не может быть загружен.') {
        echo '<table>
                <tr><th>Название проверки</th><th>Статус</th><th>Текущее состояние</th></tr>
                <tr><td>Проверка наличия файла robots.txt</td><td>Ошибка</td><td>Файл robots.txt не существует</td></tr>
              </table>';die;
        printNotAll();die;
    }

}
else {
    echo printTable($rob);
    printAll($rob);die;
}

function printNotAll() {
    $xls = new PHPExcel();
    $xls->setActiveSheetIndex(0);
    // Получаем активный лист
    $sheet = $xls->getActiveSheet();
    // Подписываем лист
    $sheet->setTitle('Лист 2');

    // Вставляем текст в ячейку A1
    $sheet->setCellValue("A1", '№');
    $sheet->setCellValue("B1", 'Название проверки');
    $sheet->setCellValue("C1", 'Статус');
    $sheet->setCellValue("B3", 'Проверка наличия файла robots.txt');
    $sheet->setCellValue("C3", 'Ошибка');

    $xls->getActiveSheet()->getColumnDimension('B')->setWidth(55);


    // Объединяем ячейки
    //$sheet->mergeCells('A1:H1');

    // Выравнивание текста
    $sheet->getStyle('B1')->getAlignment()->setHorizontal(
        PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    //заполняем таблицу

    for($i = 3; $i < 9; $i++) {
        $sheet->setCellValue("A$i", $i - 2);
    }
    header_remove();
    header ( "Expires: Mon, 1 Apr 1974 05:00:00 GMT" );
    header ( "Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT" );
    header ( "Cache-Control: no-cache, must-revalidate" );
    header ( "Pragma: no-cache" );
    header ( "Content-type: application/vnd.ms-excel" );
    header ( "Content-Disposition: attachment; filename=matrix.xls" );

    // Выводим содержимое файла
    $objWriter = new PHPExcel_Writer_Excel5($xls);
    $objWriter->save('php://output');
    //var_dump(1);die;
}
//$rob = getDirectory();
/*if(gettype($rob) == 'string') {
    if($rob == 'Файл не существует или не может быть загружен.') {*/
        
//}else {

function printAll($rob) {

    //var_dump($rob);die;
    $xls = new PHPExcel();
    $xls->setActiveSheetIndex(0);
    // Получаем активный лист
    $sheet = $xls->getActiveSheet();
    // Подписываем лист
    $sheet->setTitle('Лист 2');
    $xls->getActiveSheet()->getColumnDimension('B')->setWidth(55);
    $xls->getActiveSheet()->getColumnDimension('E')->setWidth(70);

    for($i = 3; $i < 9; $i++) {
        $sheet->setCellValue("A$i", $i - 2);
    }
    // Вставляем текст в ячейку A1
    $sheet->setCellValue("A1", '№');
    $sheet->setCellValue("B1", 'Название проверки');
    $sheet->setCellValue("C1", 'Статус');
    $arr_q = ['Проверка наличия файла robots.txt', 'Проверка указания директивы Host',  'Проверка количества директив Host, прописанных в файле',
            'Проверка размера файла robots.txt', 'Проверка указания директивы Sitemap', 'Проверка кода ответа сервера для файла robots.txt'];


    for($i = 3; $i < 9; $i++) {
        $sheet->setCellValue("B$i", $arr_q[$i-3]);
    }

    $keys = ['robots', 'host', 'cnt_host','size_file','check_sitemap','code_response'];

    $arr1 = $rob[0];
    $arr2 = $rob[1];
    for($i = 3; $i < 9; $i++) {
        $sheet->setCellValue("C$i", $arr1[$keys[$i-3]]);
        $sheet->setCellValue("E$i", $arr2[$keys[$i-3]]);
        $sheet->getStyle("C$i")->getAlignment()->setHorizontal(
            PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("E$i")->getAlignment()->setHorizontal(
            PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    }



    // Объединяем ячейки
    //$sheet->mergeCells('A1:H1');

    // Выравнивание текста
    $sheet->getStyle('B1')->getAlignment()->setHorizontal(
        PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    //заполняем таблицу



    header ( "Expires: Mon, 1 Apr 1974 05:00:00 GMT" );
    header ( "Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT" );
    header ( "Cache-Control: no-cache, must-revalidate" );
    header ( "Pragma: no-cache" );
    header ( "Content-type: application/vnd.ms-excel" );
    header ( "Content-Disposition: attachment; filename=matrix.xls" );

    // Выводим содержимое файла
    $objWriter = new PHPExcel_Writer_Excel5($xls);
    $objWriter->save('php://output');

}

function printTable($rob) {
    $arr0['robots'] = 'Проверка наличия файла robots.txt';
    $arr0['host'] = 'Проверка указания директивы Host';
    $arr0['cnt_host'] = 'Проверка количества директив Host, прописанных в файле';
    $arr0['size_file'] = 'Проверка размера файла robots.txt';
    $arr0['check_sitemap'] = 'Проверка указания директивы Sitemap';
    $arr0['code_response'] = 'Проверка кода ответа сервера для файла robots.txt';

    $str = "<table>
            <tr><th>Название проверки</th><th>Статус</th><th>Текущее состояние</th></tr>
            
            ";
    $arr1 = $rob[0];
    $arr2 = $rob[1];
    $tr1 = '<tr>';
    $tr2 = '<tr>';
    $keys = ['robots', 'host', 'cnt_host','size_file','check_sitemap','code_response'];
    foreach ($keys as $key) {
        $tr1 .= "<tr><td>" . $arr0[$key] . "</td>";
        $tr1 .= "<td>" . $arr1[$key] . "</td>";
        $tr1 .= "<td>" . $arr2[$key] . "</td></tr>";
    }
    $str .= $tr1;
    $str .= "</table>";
    echo $str;die;
    
}





