<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Hw8_Account</title>
</head>
<body>
    <h1>Информация об авторе</h1>
    <p>Ваше имя и информация о вас</p>
    
    <?php if(isset($_SESSION['username']) && !empty($_SESSION['username'])): ?>
        <h2>Привет, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        <a href="exit8.php">Выйти</a>
    <?php else: ?>
        <form action="post.php" method="POST">
            <input type="text" name="username" placeholder="Введите ваше имя" required>
            <button type="submit">Отправить</button>
        </form>
    <?php endif; ?>
</body>
</html>