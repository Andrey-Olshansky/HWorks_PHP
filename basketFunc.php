<?php

/*
 * Скрипт "Список покупок"
 * Простая консольная программа для управления списком покупок
 * Возможности: добавление, удаление, просмотр товаров
 */

// Константы для операций меню
const OPERATION_EXIT = 0;     // Выход из программы
const OPERATION_ADD = 1;      // Добавить товар
const OPERATION_DELETE = 2;   // Удалить товар
const OPERATION_PRINT = 3;    // Показать список

// Меню операций
// Ассоциативный массив меню операций
// Ключ - номер операции, значение - текст пункта меню
$operations = [
    OPERATION_EXIT => OPERATION_EXIT . '. Завершить программу.',
    OPERATION_ADD => OPERATION_ADD . '. Добавить товар в список покупок.',
    OPERATION_DELETE => OPERATION_DELETE . '. Удалить товар из списка покупок.',
    OPERATION_PRINT => OPERATION_PRINT . '. Отобразить список покупок.',
];

// Массив для хранения товаров
$items = [];


do {
    // system('clear'); // Очистка экрана (для Linux/Mac)
    system('cls'); // Для Windows

    // Выбор операции
    do {
        // Показ текущего списка покупок
        if (count($items)) {
            echo 'Ваш список покупок: ' . PHP_EOL;
            // implode("\n", $items) - объединяет элементы массива в строку через перенос строки
            echo implode("\n", $items) . "\n";
        } else {
            echo 'Ваш список покупок пуст.' . PHP_EOL;
        }

        // Показ меню операций
        echo 'Выберите операцию для выполнения: ' . PHP_EOL;
        echo implode(PHP_EOL, $operations) . PHP_EOL . '> ';
        // trim(fgets(STDIN)) - читает ввод пользователя и удаляет лишние пробелы
        $operationNumber = trim(fgets(STDIN));

        // Проверка корректности ввода
        if (!array_key_exists($operationNumber, $operations)) {
            system('cls'); // Очистка экрана для Windows
            echo '!!! Неизвестный номер операции, повторите попытку.' . PHP_EOL;
        }

    } while (!array_key_exists($operationNumber, $operations));

    // !array_key_exists($operationNumber, $operations)
    // Проверяет: НЕ существует ли в массиве $operations ключ $operationNumber
    // Возвращает true если ключа НЕТ (неверная операция)
    // Возвращает false если ключ ЕСТЬ (верная операция)

    echo 'Выбрана операция: '  . $operations[$operationNumber] . PHP_EOL;

    // Обработка выбранной операции
    switch ($operationNumber) {
        case OPERATION_ADD:
            // Добавление товара
            echo "Введите название товара для добавления в список: \n> ";
            $itemName = trim(fgets(STDIN));
            $items[] = $itemName;
            break;

        case OPERATION_DELETE:
            // Удаление товара
            echo 'Текущий список покупок:' . PHP_EOL;
            echo 'Список покупок: ' . PHP_EOL;
            echo implode("\n", $items) . "\n";

            echo 'Введите название товара для удаления из списка:' . PHP_EOL . '> ';
            $itemName = trim(fgets(STDIN));

            // Поиск и удаление всех вхождений товара
            if (in_array($itemName, $items, true) !== false) {
                while (($key = array_search($itemName, $items, true)) !== false) {
                    unset($items[$key]);
                }
            }
            break;

        case OPERATION_PRINT:
            // Показ всего списка
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