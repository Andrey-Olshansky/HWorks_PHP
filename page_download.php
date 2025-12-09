<?php
// 2. Форсируем скачивание текстового файла
if (isset($_GET['text'])) {
    $text = $_GET['text'];
    $filename = "download.txt";
    
    // Заголовки для скачивания
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Content-Length: ' . strlen($text));
    
    echo $text;
    exit;
} else {
    echo "Ошибка: параметр 'text' не указан в URL";
    echo "<br><a href='Hw_6_HTTP.php'>Назад</a>";
}
?>