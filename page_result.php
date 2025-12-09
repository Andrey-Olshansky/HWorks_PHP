<?php
// 4. Показывает результат счётчика
session_start();

$counter = isset($_SESSION['counter']) ? $_SESSION['counter'] : 0;
?>
<!DOCTYPE html>
<html>
<body>
    <h1>Результат счётчика</h1>
    <p>Страница-счётчик была открыта <strong><?= $counter ?></strong> раз(а).</p>
    <p><strong>Технически:</strong> значение берётся из сессии ($_SESSION['counter']).</p>
    <a href="Hw_6_HTTP.php">Назад к списку</a>
</body>
</html>