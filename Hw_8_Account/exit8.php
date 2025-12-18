
<?php
    session_start();
    unset($_SESSION['username']);
    header('Location: index8.php');
    exit();
?>