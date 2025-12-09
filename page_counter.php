<?php
// 3. Счётчик открытий страницы с редиректом
session_start();

// Инициализация счётчика
if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 0;
}

// Увеличиваем счётчик
$_SESSION['counter']++;

// Проверка на кратность 3
if ($_SESSION['counter'] % 3 == 0) {
    header('Location: page_result.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<body>
    <h1>Страница-счётчик</h1>
    <p>Открыта <?= $_SESSION['counter'] ?> раз(а).</p>
    <p><strong>Логика:</strong> при каждом открытии +1 к счётчику в сессии.</p>
    <p>Когда счётчик кратен 3 → автоматический переход на страницу результата.</p>
    <a href="Hw_6_HTTP.php">Назад к списку</a>
</body>
</html>