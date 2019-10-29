<?php
session_start();

if (isset($_POST["shipBtn"])) {
    $_SESSION['ship'] = ($_POST['ship'] == 2) ? 30000 : 0;
}

header("Location: ../index.php?p=checkout");
exit();
