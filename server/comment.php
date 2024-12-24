<!--
    Group: 10
    Student Name: Xin Guo, 041-154-582
    Student Name: Di Wu, 041-165-211
    Lab: CST8285 311
    Assignment: Assignment 02
    Date: November-15-2024
    Professor: Hala Own

    File Name: comment.php
    Page Description: To add comments.
    Contributed by Di Wu
-->

<?php
session_start();
require_once('../database/database.php');
$db = db_connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user_name = $_SESSION['user_name'];
  $comment = $_POST['comment'];
  $thread_id = $_SESSION['thread_id'];

  $sql = "INSERT INTO COMMENTS (user_name, comment_time, comment, thread_id) 
          VALUES ('$user_name', CURRENT_TIME(), '$comment',  '$thread_id')";
  $result = mysqli_query($db, $sql);

  header("Location: ../viewThread.php?id=$thread_id");
} else {
  header("Location: ../viewThread.php?id=$thread_id");
}

db_disconnect($db);
