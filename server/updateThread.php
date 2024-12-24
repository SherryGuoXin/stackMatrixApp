<!--
    Group: 10
    Student Name: Xin Guo, 041-154-582
    Student Name: Di Wu, 041-165-211
    Lab: CST8285 311
    Assignment: Assignment 02
    Date: November-15-2024
    Professor: Hala Own

    File Name: updateThread.php
    Page Description: To update thread.
    Contributed by Xin Guo
-->
    
<?php
session_start();
require_once('../database/database.php');
$db = db_connect();

// if we decided to delete, execute delete query and redirect to the home page
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user = $_SESSION['user_name'];
  $thread_id = $_SESSION['thread_id'];
  $updated_thread = $_POST['updated_thread'];

  if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $updated_file_name = $user . '_' . time() . '_' . $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];

    move_uploaded_file($file_tmp, "../image/thread_image/" . $updated_file_name);
  }


  $sql = "UPDATE THREADS 
          SET thread = '$updated_thread', post_time = CURRENT_TIME(), thread_image_name = '$updated_file_name'
          WHERE thread_id = '$thread_id'";
  $result = mysqli_query($db, $sql);
  unset($_SESSION['thread_id']);

  header("Location: ../viewThread.php?id=$thread_id");
} else {
  header("Location: ../viewThread.php?id=$thread_id");
}

db_disconnect($db);
