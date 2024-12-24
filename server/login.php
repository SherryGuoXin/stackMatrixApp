<!--
    Group: 10
    Student Name: Xin Guo, 041-154-582
    Student Name: Di Wu, 041-165-211
    Lab: CST8285 311
    Assignment: Assignment 02
    Date: November-15-2024
    Professor: Hala Own

    File Name: login.php
    Page Description: To log user in.
    Contributed by Di Wu
-->

<?php
session_start();
require_once('../database/database.php');
$db = db_connect();

$users = array();
$sql = "SELECT user_name, password FROM USERS";
$result_set = mysqli_query($db, $sql);
while ($results = mysqli_fetch_assoc($result_set)) {
    $users[$results['user_name']] = $results['password'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    // Validate the existence of the user and password in the associative array
    if (isset($users[$user_name]) && $users[$user_name] === $password) {
        unset($_SESSION['failed_login']);
        $_SESSION['user_name'] = $user_name;
        
        header("Location: ../home.php");
    } else {
        $_SESSION['failed_login'] = false;
        header("Location: ../login.php");
    }
}

db_disconnect($db);
