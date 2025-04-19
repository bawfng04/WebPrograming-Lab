<?php
session_start();

// Clear session
session_unset();
session_destroy();

// xoá cookie
if (isset($_COOKIE['remember'])) {
    setcookie('remember', '', time() - 3600, '/');
}

header('Location: login.php');
exit;
?>