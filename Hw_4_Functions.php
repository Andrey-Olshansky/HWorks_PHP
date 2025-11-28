<?php
    /*Домашнее задание к занятию «1.1. Знакомство с PHP»
    http://localhost/HWorks_PHP/Hw_4_Functions.php 
    для консоли
    1.  cd C:\localhost\HWorks_PHP 
    2. php Hw_4_Functions.php
    */
?>
<?php
/*Задание 2: рефакторинг кода 
Есть файл в котором решена задача для хранения списка покупок. Если запустить этот 
файл то можно будет добавлять новые записи и удалять уже ненужные.

В этом коде есть неприятные моменты:

1. Дублирующийся код. Например, вывод всего списка покупок на экран и запрос 
    данных от пользователя.
2. Два вложенных цикла и вложенные switch-case с вложенными условиями, которые делают 
    код сложным для восприятия.
Необходимо упростить структуру, вынеся дублирующиеся и вложенные конструкции в отдельные функции. 

В отдельных функциях должны оказаться:
1. участок кода, выводящий список покупок на экран и запрашивающий следующее действие;
2. все действия, находящиеся внутри case.

Дополнительно обратите внимание:
1. Постарайтесь, чтобы внутри созданных вами функций не было дублирующихся возможностей, а именно 
    вывода всего списка на экран.
2. Включите строгий режим для этого файла.
3. Аргументы всех функций должны быть типизированы.
4. Результаты всех функций должны быть типизированы.
*/

const OPERATION_EXIT = 0;
const OPERATION_ADD = 1;
const OPERATION_DELETE = 2;
const OPERATION_PRINT = 3;

$operations = [
    OPERATION_EXIT => OPERATION_EXIT . '. Завершить программу.',
    OPERATION_ADD => OPERATION_ADD . '. Добавить товар в список покупок.',
    OPERATION_DELETE => OPERATION_DELETE . '. Удалить товар из списка покупок.',
    OPERATION_PRINT => OPERATION_PRINT . '. Отобразить список покупок.',
];

$items = [];


do {
    //system('clear');
    system('cls'); // windows

    do {
        if (count($items)) {
            echo 'Ваш список покупок: ' . PHP_EOL;
            echo implode("\n", $items) . "\n";
        } else {
            echo 'Ваш список покупок пуст.' . PHP_EOL;
        }


        echo 'Выберите операцию для выполнения: ' . PHP_EOL;
        // Проверить, есть ли товары в списке? Если нет, то не отображать пункт про удаление товаров
        echo implode(PHP_EOL, $operations) . PHP_EOL . '> ';
        $operationNumber = trim(fgets(STDIN));

        if (!array_key_exists($operationNumber, $operations)) {
            system('cls'); // Очистка экрана для Windows
            echo '!!! Неизвестный номер операции, повторите попытку.' . PHP_EOL;
        }

    } while (!array_key_exists($operationNumber, $operations));

    echo 'Выбрана операция: '  . $operations[$operationNumber] . PHP_EOL;

    switch ($operationNumber) {
        case OPERATION_ADD:
            echo "Введение название товара для добавления в список: \n> ";
            $itemName = trim(fgets(STDIN));
            $items[] = $itemName;
            break;

        case OPERATION_DELETE:
            // Проверить, есть ли товары в списке? Если нет, то сказать об этом и попросить ввести другую операцию
            echo 'Текущий список покупок:' . PHP_EOL;
            echo 'Список покупок: ' . PHP_EOL;
            echo implode("\n", $items) . "\n";

            echo 'Введение название товара для удаления из списка:' . PHP_EOL . '> ';
            $itemName = trim(fgets(STDIN));

            if (in_array($itemName, $items, true) !== false) {
                while (($key = array_search($itemName, $items, true)) !== false) {
                    unset($items[$key]);
                }
            }
            break;

        case OPERATION_PRINT:
            echo 'Ваш список покупок: ' . PHP_EOL;
            echo implode(PHP_EOL, $items) . PHP_EOL;
            echo 'Всего ' . count($items) . ' позиций. '. PHP_EOL;
            echo 'Нажмите enter для продолжения';
            fgets(STDIN);
            break;
    }

    echo "\n ----- \n";
} while ($operationNumber > 0);

echo 'Программа завершена' . PHP_EOL;

?>