<!--
    Group: 10
    Student Name: Xin Guo, 041-154-582
    Student Name: Di Wu, 041-165-211
    Lab: CST8285 311
    Assignment: Assignment 02
    Date: November-15-2024
    Professor: Hala Own

    File Name: deleteThread.php
    Page Description: To delete the thread.
    Contributed by Xin Guo
-->

<?php
session_start();
require_once('../database/database.php');
$db = db_connect();

// if we decided to delete, execute delete query and redirect to the home page

$thread_id = $_SESSION['thread_id'];
$sql = "DELETE FROM THREADS WHERE thread_id = '$thread_id'";
$result = mysqli_query($db, $sql);
unset($_SESSION['thread_id']);

header("Location: ../home.php");

db_disconnect($db);
