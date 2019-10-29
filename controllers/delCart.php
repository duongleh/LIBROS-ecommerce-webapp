<?php
session_start();

if (isset($_POST["btnDelCart"])) {
    unset($_SESSION['cart']);
    unset($_SESSION['indexs']);
}

header("Location: ../index.php?p=cart");
exit();
