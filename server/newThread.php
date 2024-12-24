<!--
    Group: 10
    Student Name: Xin Guo, 041-154-582
    Student Name: Di Wu, 041-165-211
    Lab: CST8285 311
    Assignment: Assignment 02
    Date: November-15-2024
    Professor: Hala Own

    File Name: newThread.php
    Page Description: To add new thread.
    Contributed by Di Wu
-->

<?php
session_start();
require_once('../database/database.php');
$db = db_connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user = $_SESSION['user_name'];
  $category = $_POST['category'];
  $thread = $_POST['thread'];

  if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $file_name = $user . '_' . time() . '_' . $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];

    move_uploaded_file($file_tmp, "../image/thread_image/" . $file_name);
  } else {
    $file_name = NULL;
  }

  $sql = "INSERT INTO THREADS (user_name, post_time, category, thread, thread_image_name) 
          VALUES ('$user', CURRENT_TIME(), '$category', '$thread', '$file_name')";
  $result = mysqli_query($db, $sql);

  header("Location: ../home.php");
} else {
  header("Location: ../home.php");
}

db_disconnect($db);
