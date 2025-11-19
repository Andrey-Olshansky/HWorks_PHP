<?php
    /*Домашнее задание к занятию «1.1. Знакомство с PHP»
    http://localhost/HWorks_PHP/Hw_1_WelcomePHP.php 
    для консоли
    1.  cd C:\localhost\HWorks_PHP 
    2. php Hw_1_WelcomePHP.php*/
?>
<?php
/* Variant from date: 18.11.2025 
Задание №2: знакомство с документацией */

    /* 2_1 Выведите на экран при помощи echo() название текущего файла и номер текущей строки, 
    используя предопределённые константы. Другими словами, в коде не должно быть упоминания 
    названия текущего файла и номера строки, но они должны быть отображены на экране. */

    echo "Название файла: " . __FILE__ . "<br>";
    echo "Номер текущей строки: " . __LINE__ . "<br>";

     /* 2_2 Создайте многострочную переменную при помощи heredoc синтаксиса.
     Heredoc - это способ создать строку с переносами в PHP.*/

     $text = <<<TEXT
        Привет
        Это
        Многострочный
        Текст
        TEXT;

    echo "<pre>$text</pre>";

    /*Примечание: В браузере переносы строк не видны - они съедаются HTML.
        Чтобы увидеть переносы, добавь тег <pre>: */

     /* 2_3 Задайте две простые строковые переменные и используйте их для построения 
     конечной фразы. Например, в этом коде надо отобразить конечную фразу "Рыба рыбою 
     сыта, а человек человеком" без прямого использования слов Рыба и человек:*/

     $a='Рыба';
     $b='человек';

     echo "$a рыбою сыта, а $b человеком <br>";

/* Задание №3: определение типа переменной
    3_1 Напишите алгоритм, который определяет тип переменной, используя функции: is_bool,
        is_float, is_int, is_string, is_null. */

    
    $variable = 3.14;
    // $variable = 3;
    // $variable = 'one';
    // $variable = true;
    // $variable = null;
    // $variable = [];

    if (is_bool($variable)) {
        $type = 'bool';
    } elseif (is_float($variable)) {
        $type = 'float';
    } elseif (is_int($variable)) {
        $type = 'int';
    } elseif (is_string($variable)) {
        $type = 'string';
    } elseif (is_null($variable)) {
        $type = 'null';
    } else {
        $type = 'other';
    }

    echo "type is $type". "<br>";

/*Расширение Задания №3 для саморазвития!
    В PHP для ввода данных с консоли используется fgets(STDIN) 
    fgets(STDIN) - это функция в PHP для чтения ввода из командной строки.

    STDIN - специальная константа, означающая стандартный поток ввода (стандартный вход)
    fgets() - функция чтения строки из файла/потока
    trim() - убирает лишние пробелы и переносы строк
    Когда скрипт запускается в консоли, fgets(STDIN) ждет, пока пользователь введет 
    данные и нажмет Enter.*/
    
    // Добавь приглашение для ввода
    echo "Введите значение: ";
    $input = trim(fgets(STDIN));
    $variable = $input;

    // Преобразуем строку в реальный тип
    if ($input === '') {
        $variable = null;
    } elseif ($input === 'true') {
        $variable = true;
    } elseif ($input === 'false') {
        $variable = false;
    } elseif (is_numeric($input)) {
        $variable = strpos($input, '.') !== false ? (float)$input : (int)$input;
    }

    // Проверяем итоговый тип
    if (is_bool($variable)) {
        $type = 'bool';
    } elseif (is_float($variable)) {
        $type = 'float';
    } elseif (is_int($variable)) {
        $type = 'int';
    } elseif (is_string($variable)) {
        $type = 'string';  // ← тут была ошибка: было 'null'
    } elseif (is_null($variable)) {
        $type = 'null';
    } else {
        $type = 'other';
    }

    echo "type is $type <br>";
?><br>

