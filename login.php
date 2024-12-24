<!--
    Group: 10
    Student Name: Xin Guo, 041-154-582
    Student Name: Di Wu, 041-165-211
    Lab: CST8285 311
    Assignment: Assignment 02
    Date: November-15-2024
    Professor: Hala Own

    File Name: login.php
    Page Description: To login user.
    Contributed by Di Wu
-->

<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="To login user to stackmatix.">
    <meta name="keyword" content="login, password, account, stackmatrix">
    <meta name="author" content="Di Wu">
    <title>StackMatrix - Log in or Sign up</title>

    <link rel="stylesheet" href="style/style.css?<?php echo time() ?>">
</head>

<body>
    <?php include "shared/header.php"; ?>

    <main>
        
        <div class="container">
        <div class="left">
            <h1>StackMatrix</h1>
            <p>Unleash your potential by connecting with the world's top minds on StackMatrix.</p>
        </div>
        <div class="right">
        <form action="server/login.php" method="POST" class="login-form">
           <input type="text" name="user_name" id="user_name"  placeholder="Account "/> </p>
           <input type="password" name="password" id="password"  placeholder= "Password"/> </p>
           <button type="submit" name="login">Login</button>
           <?php if (isset($_SESSION['failed_login'])) { ?>
            <!-- if user tried but failed to log in -->
            <p class="warning" ><?php echo 'Could not log you in，Please try again.'; ?></p>
                    <?php } ?>
         <hr>

           <a class="buttonLink" href="registration.php">Create new account</a>
           
        </form>
        </div>
        </div>


    </main>

    <?php include 'shared/footer.php'; ?>
</body>

</html>