<?php
// 1. Устанавливаем код ответа 404
http_response_code(404);
header("HTTP/1.0 404 Not Found");
?>
<!DOCTYPE html>
<html>
<body>
    <h1>404 - Страница не найдена</h1>
    <p>Возвращаем HTTP-код 404 → браузер показывает стандартное сообщение об ошибке.</p>
    <a href="Hw_6_HTTP.php">Назад к списку</a>
</body>
</html>