<?php
session_start();

if (isset($_POST["btnLogout"])) {
    unset($_SESSION['ID_User']);
    unset($_SESSION['Username']);
    unset($_SESSION['Hoten']);
    unset($_SESSION['Groups']);
    unset($_SESSION['Diachi']);
}

header("Location: ../index.php");
exit();
