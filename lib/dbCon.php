<?php
function myConnect() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "libros.vn";
    $con = mysqli_connect($servername, $username, $password);
    mysqli_select_db($con, $dbname);
    mysqli_query($con, "SET NAMES 'utf8'");
    return $con;
}
?>
