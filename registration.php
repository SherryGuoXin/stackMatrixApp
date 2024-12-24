<!--
    Group: 10
    Student Name: Xin Guo, 041-154-582
    Student Name: Di Wu, 041-165-211
    Lab: CST8285 311
    Assignment: Assignment 02
    Date: November-15-2024
    Professor: Hala Own

    File Name: registration.php
    Page Description: To register user.
    Contributed by Xin Guo
-->

<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="To register user to stackmatix.">
    <meta name="keyword" content="account, stackmatrix, register, user, sign-up">
    <meta name="author" content="Xin Guo">
    <title>Registration</title>

    <link rel="stylesheet" href="style/style.css?<?php echo time() ?>">
    <script src="js/script.js?<?php echo time() ?>" defer></script>
</head>

<body>
    <?php include "shared/header.php"; ?>

    <main id="registration">
        <div class="formcontainer">
            <h2>Create a StackMatrix Account</h2>
            <h3>It's quick and esay.</h3>
            <hr>
            <form id="regist_form" action="server/registration.php" method="POST" onsubmit="return validate();" enctype="multipart/form-data">
                <div class="textfield">
                    <label for="email">Email Address</label>
                    <input class="input_size" type="text" name="email" id="email" placeholder="Email">
                </div>

                <div class="textfield">
                    <label for="user_name">User Name</label>
                    <input class="input_size" type="text" name="user_name" id="login" placeholder="User name">
                </div>

                <div class="imagefield">
                    <label for="avatar">Upload Your Avatar</label>
                    <input type="file" id="avatar" name="image" />
                </div>

                <div class="textfield">
                    <label for="password">Password</label>
                    <input class="input_size" type="password" name="password" id="pass" placeholder="Password">
                </div>

                <div class="textfield">
                    <label for="pass2">Re-type Password</label>
                    <input class="input_size" type="password" id="pass2" placeholder="Password">
                </div>

                <div class="checkbox">
                    <input type="checkbox" name="terms" id="terms">
                    <label for="terms">I agree to the StackMatrix terms and conditions</label>
                </div>
                <div class="button">
                    <button type="submit">Sign-Up</button>
                </div>
            </form>

            <div id="login_link">
                <a href="login.php">Already have an account?</a>
            </div>

        </div>
    </main>

    <?php include 'shared/footer.php'; ?>
</body>

</html>