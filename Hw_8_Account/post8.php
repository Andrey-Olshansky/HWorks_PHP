<?php
    session_start();
    if(isset($_POST['username']) && !empty($_POST['username'])) {
        $_SESSION['username'] = $_POST['username'];
    }
    header('Location: index8.php');
    exit();
?>