<?php
    /*Домашнее задание к занятию «Базовые операторы и функции»
    http://localhost/HWorks_PHP/Hw_3_BaseOperations.php 
    для консоли
    1.  cd C:\localhost\HWorks_PHP 
    2. php Hw_3_BaseOperations.php
    */
?>

<?php
    /*Задание 2: стандартизатор имени. Вариант от 02.12.25
    Замечания: Давайте посмотрим на решение:
    запросите фамилию, имя, отчество - нет механизма ввода данных от пользователя!
    Суть задачи в том, чтобы написать программу которая принимает данные, а не 
    использует заранее заданные.*/
    // Задание 2: стандартизатор имени

    // Ввод данных от пользователя
    echo "Введите фамилию: ";
    $surname = trim(fgets(STDIN));

    echo "Введите имя: ";
    $name = trim(fgets(STDIN));

    echo "Введите отчество: ";
    $patronymic = trim(fgets(STDIN));

    // Полное имя (первая буква заглавная, остальные строчные)
    $fullName = mb_convert_case($surname, MB_CASE_TITLE) . ' ' . 
                mb_convert_case($name, MB_CASE_TITLE) . ' ' . 
                mb_convert_case($patronymic, MB_CASE_TITLE);

    // Фамилия и инициалы  
    $surnameAndInitials = mb_convert_case($surname, MB_CASE_TITLE) . ' ' .
                        mb_substr(mb_convert_case($name, MB_CASE_TITLE), 0, 1) . '.' .
                        mb_substr(mb_convert_case($patronymic, MB_CASE_TITLE), 0, 1) . '.';

    // Аббревиатура
    $fio = mb_substr(mb_convert_case($surname, MB_CASE_TITLE), 0, 1) .
        mb_substr(mb_convert_case($name, MB_CASE_TITLE), 0, 1) .
        mb_substr(mb_convert_case($patronymic, MB_CASE_TITLE), 0, 1);

    echo "Полное имя: '$fullName'\n";
    echo "Фамилия и инициалы: '$surnameAndInitials'\n";
    echo "Аббревиатура: '$fio'\n";
?>


<?php
    /*Задание 2: стандартизатор имени. Вариант от 25.11.25
    В личном кабинете отображается фамилия и инициалы, поэтому вам необходимо 
    из фамилии, имени и отчества получить надпись следующего формата: Фамилия И.О.. 
    На компоненте корзины отображаются только первые буквы ФИО. При отправке заказа 
    нужно указывать полные фамилию, имя и отчество, при этом первая буква должна быть 
    в верхнем регистре. Программа должна корректно работать с кириллицей.

    Пример
    Пользователь ввёл следующие данные:

    Имя: иван
    Фамилия: иванов
    Отчество: иванович
    У вас должны получиться следующие переменные:
    $fullName = 'Иванов Иван Иванович'
    $fio = 'ИИИ'
    $surnameAndInitials = 'Иванов И.И.'
    Их необходимо вывести на экран в следующем формате:

    Полное имя: 'Иванов Иван Иванович'
    Фамилия и инициалы: 'Иванов И.И.'
    Аббревиатура: 'ИИИ' */
    // $name = 'иван';
    // $surname = 'иванов';
    // $patronymic = 'иванович';

    // Полное имя
    // $fullName = mb_convert_case($surname, MB_CASE_TITLE) . ' ' . 
    //             mb_convert_case($name, MB_CASE_TITLE) . ' ' . 
    //             mb_convert_case($patronymic, MB_CASE_TITLE);

    // Фамилия и инициалы  
    // $surnameAndInitials = mb_convert_case($surname, MB_CASE_TITLE) . ' ' .
    //                     mb_substr(mb_convert_case($name, MB_CASE_TITLE), 0, 1) . '.' .
    //                     mb_substr(mb_convert_case($patronymic, MB_CASE_TITLE), 0, 1) . '.';

    // Аббревиатура
    // $fio = mb_substr(mb_convert_case($surname, MB_CASE_TITLE), 0, 1) .
    //     mb_substr(mb_convert_case($name, MB_CASE_TITLE), 0, 1) .
    //     mb_substr(mb_convert_case($patronymic, MB_CASE_TITLE), 0, 1);

    // echo "Полное имя: '$fullName'\n". PHP_EOL;
    // echo "Фамилия и инициалы: '$surnameAndInitials'\n". PHP_EOL;
    // echo "Аббревиатура: '$fio'". PHP_EOL; 

     /*Для саморазвития 
    mb_convert_case() - преобразует регистр строки в UTF-8
    Параметры:
    $str - строка для преобразования
    $mode - режим:

    MB_CASE_UPPER - в ВЕРХНИЙ регистр
    MB_CASE_LOWER - в нижний регистр
    MB_CASE_TITLE - В Первые Буквы Слов Заглавные
    Примеры:*/

    
    // echo mb_convert_case("привет мир", MB_CASE_UPPER)."<br />". PHP_EOL;   // "ПРИВЕТ МИР"
    // echo mb_convert_case("ПРИВЕТ МИР", MB_CASE_LOWER)."<br />". PHP_EOL;   // "привет мир"  
    // echo mb_convert_case("привет мир", MB_CASE_TITLE)."<br />". PHP_EOL;    // "Привет Мир"
    //Важно: Работает с кириллицей, в отличие от обычных функций регистра. 

    // Полная веб-версия с формой:
    // <form method="POST" action="script.php">
    //     Фамилия: <input type="text" name="surname"><br>
    //     Имя: <input type="text" name="name"><br>
    //     Отчество: <input type="text" name="patronymic"><br>
    //     <input type="submit" value="Отправить">
    // </form>


    // $surname = $_POST['surname'] ?? '';
    // $name = $_POST['name'] ?? '';
    // $patronymic = $_POST['patronymic'] ?? '';

    // Дальше ваш код обработки...
?>


?>
