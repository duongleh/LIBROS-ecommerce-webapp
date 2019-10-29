<?php require "views/blocks/hr.php"; ?>
<div class="container-fluid">
    <div class="row no-gutter">
        <div class="d-none d-md-flex col-md-4 col-lg-7 bg-image" style="background-image: url('assets/img/login.jpeg');"></div>
        <div class="col-md-8 col-lg-5">
            <form name="Login" method="POST">
                <div class="container">
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

            <div class="container">
                Don't have account yet? <a href="index.php?p=signup"><b style="color:red">&nbspSign up</b></a>
            </div>
        </div>
    </div>
</div>