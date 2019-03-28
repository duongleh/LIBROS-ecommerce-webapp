<?php require "blocks/hr.php"; ?>
<form name="Login" method="POST">
    <div class="container">
        <div class="container" style="background-color:#f1f1f1;padding: 14px 20px;text-align: center">
            <b>ĐĂNG NHẬP</b>
        </div>
        <br>
        <?php
        if (isset($_POST["btnLogin"]) && mysqli_num_rows($user) == 0) {
            $check_usernames = check_username($un);
            $check_passwords = check_password($pa);
            ?>
        <div class="container" style="background-color:red;padding: 14px 20px;text-align: center;color:white">
            <?php
            if (mysqli_num_rows($check_usernames) == 0) {
                echo "Username không tồn tại. Xin vui lòng thử lại !";
            } else if (mysqli_num_rows($check_usernames) == 1 && mysqli_num_rows($check_passwords) == 0) {
                echo "Password không chính xác. Xin vui lòng thử lại !";
            }
            ?>
        </div>
        <br>
        <?php

    }   ?>

        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <button type="submit" name="btnLogin" style="margin-top: 25px" class="loginbtn"><b>LOGIN</b></button>
        <label>
            <input type="checkbox" checked="checked" name="remember" style="margin-top: 15px"> Remember me
        </label>
    </div>
</form>
<br>
<div class="container">
    Don't have account yet? <a href="index.php?p=signup"><b style="color:red">&nbspSign up</b></a>
</div> 