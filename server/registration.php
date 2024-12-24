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

<?php
require_once('../database/database.php');
$db = db_connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $user_name = $_POST['user_name'];
  $password = $_POST['password'];
  $newsletter = $_POST['newsletter'];
  $file_name;

  if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $file_name = $user_name . '_' . time() . '_' . $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];

    move_uploaded_file($file_tmp, "../image/profile_image/" . $file_name);
 }

  $sql = "INSERT INTO USERS (email,user_name, password, newsletter, sign_up_time, profile_image_name) 
          VALUES ('$email', '$user_name', '$password','$newsletter', CURRENT_TIME(), '$file_name')";
  $result = mysqli_query($db, $sql);

  header("Location: ../login.php");
} else {
  header("Location: ../registration.php");
}

db_disconnect($db);
