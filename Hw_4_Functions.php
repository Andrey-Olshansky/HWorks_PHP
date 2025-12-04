<?php
declare(strict_types=1);
    /*Домашнее задание к занятию «1.1. Знакомство с PHP»
    http://localhost/HWorks_PHP/Hw_4_Functions.php 
    для консоли
    1.  cd C:\localhost\HWorks_PHP 
    2. php Hw_4_Functions.php
    */
?>

<?php
/*
Вариант от 30.11.2025.

Задание 2: рефакторинг кода 
Есть файл в котором решена задача для хранения списка покупок. Если запустить этот 
файл то можно будет добавлять новые записи и удалять уже ненужные.

В этом коде есть неприятные моменты:

1. Дублирующийся код. Например, вывод всего списка покупок на экран и запрос 
    данных от пользователя.
2. Два вложенных цикла и вложенные switch-case с вложенными условиями, которые делают 
    код сложным для восприятия.
Необходимо упростить структуру, вынеся дублирующиеся и вложенные конструкции в отдельные 
функции. 

В отдельных функциях должны оказаться:
1. участок кода, выводящий список покупок на экран и запрашивающий следующее действие;
2. все действия, находящиеся внутри case.

Дополнительно обратите внимание:
1. Постарайтесь, чтобы внутри созданных вами функций не было дублирующихся возможностей, 
а именно вывода всего списка на экран.
2. Включите строгий режим для этого файла.
3. Аргументы всех функций должны быть типизированы.
4. Результаты всех функций должны быть типизированы.
*/

const OPERATION_EXIT = 0;
const OPERATION_ADD = 1;
const OPERATION_DELETE = 2;
const OPERATION_PRINT = 3;

$operations = [
    OPERATION_EXIT => 'Завершить программу.',
    OPERATION_ADD => 'Добавить товар в список покупок.',
    OPERATION_DELETE => 'Удалить товар из списка покупок.',
    OPERATION_PRINT => 'Отобразить список покупок.',
];

$items = [];

// Показывает список покупок
function showList(array $items): void {
    if ($items) {
        echo "Ваш список покупок:\n" . implode("\n", $items) . "\n";
    } else {
        echo "Ваш список покупок пуст.\n";
    }
}

// Получает номер операции от пользователя 
function getOperation(array $operations, array $items): string {
    do {
        system('cls');
        showList($items);
        
        echo "Выберите операцию:\n";
        foreach ($operations as $num => $text) {
            echo "$num. $text\n";
        }
        echo '> ';
        $input = trim(fgets(STDIN));

        if (!isset($operations[$input])) {
            echo "!!! Неизвестная операция\n";
        }
    } while (!isset($operations[$input]));
    
    return $input;
}

// Добавляет товар в список
function add(array &$items): void {
    echo "Введите название товара:\n> ";
    $items[] = trim(fgets(STDIN));
}

// Удаляет товар из списка
function delete(array &$items): void {
    showList($items);
    echo "Введите товар для удаления:\n> ";
    $item = trim(fgets(STDIN));
    
    $items = array_filter($items, fn($i) => $i !== $item);
}

// Показывает весь список и ждет нажатия Enter
function printAll(array $items): void {
    showList($items);
    echo "Всего: " . count($items) . " позиций\nНажмите enter";
    fgets(STDIN);
}

do {
    $operation = getOperation($operations, $items);
    echo "Выбрано: {$operations[$operation]}\n";

    switch ($operation) {
        case OPERATION_ADD: add($items); break;
        case OPERATION_DELETE: delete($items); break;
        case OPERATION_PRINT: printAll($items); break;
    }

    echo "\n-----\n";
} while ($operation > 0);

echo 'Программа завершена' . PHP_EOL;

?>