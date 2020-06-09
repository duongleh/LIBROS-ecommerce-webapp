<?php
function myConnect()
{
    $db_host        = "34.66.40.244";
    $db_user        = "root";
    $db_pass        = "";
    $db_name        = "libros"; 

    $con = mysqli_connect($db_host, $db_user, $db_pass);
    mysqli_select_db($con, $db_name);
    mysqli_query($con, "SET NAMES 'utf8'");
    return $con;
}
