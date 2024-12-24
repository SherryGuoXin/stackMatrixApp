<!--
    Group: 10
    Student Name: Xin Guo, 041-154-582
    Student Name: Di Wu, 041-165-211
    Lab: CST8285 311
    Assignment: Assignment 02
    Date: November-15-2024
    Professor: Hala Own

    File Name: logout.php
    Page Description: To log user out.
    Contributed by Xin Guo
-->

<?php
session_start();
session_destroy();
header("Location: ../index.php");
