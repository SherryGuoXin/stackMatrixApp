<!--
    Group: 10
    Student Name: Xin Guo, 041-154-582
    Student Name: Di Wu, 041-165-211
    Lab: CST8285 311
    Assignment: Assignment 02
    Date: November-15-2024
    Professor: Hala Own

    File Name: header.php
    Page Description: To show header of the page.
    Contributed by Xin Guo
-->

<!DOCTYPE html>
<html>

<head>

</head>

<body>
  <header>
    <a href="index.php">
      <img src="./image/host_image/site_icon.png" alt="home" height="40">
      <p id="header_name">STACKMATRIX</p>
    </a>

    <?php if (isset($_SESSION['user_name'])) { ?>
      <nav>
        <ul>
          <li><a href="index.php">About US</a></li>
          <li><a href="home.php">My Home</a></li>
          <li><a href="searchThread.php">Search</a></li>
          <li><a href="server/logout.php">Logout</a></li>
        </ul>
      </nav>
    <?php } else { ?>
      <nav>
        <ul>
          <li><a href="index.php">About US</a></li>
          <li><a href="registration.php">Register</a></li>
          <li><a href="login.php">Login</a></li>
        </ul>
      </nav>
    <?php } ?>
  </header>
</body>

</html>