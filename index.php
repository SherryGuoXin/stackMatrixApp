<!--
    Group: 10
    Student Name: Xin Guo, 041-154-582
    Student Name: Di Wu, 041-165-211
    Lab: CST8285 311
    Assignment: Assignment 02
    Date: November-15-2024
    Professor: Hala Own

    File Name: index.php
    Page Description: To land the page and show company info.
    Contributed by Xin Guo
-->

<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="To land the page and show company info.">
  <meta name="keyword" content="stackmatrix, connect, grow, learn, sharing, knowledge">
  <meta name="author" content="Xin Guo">
  <title>Welcome to StackMatrix</title>

  <link rel="stylesheet" href="style/style.css?<?php echo time() ?>">
</head>

<body >
  <?php include "shared/header.php"; ?>

  <main class="index">

  <div class="container">
        <div class="left">
        <p class="stackmatrix_text">StackMatrix</p>
        <h2>Connect, Learn, and Grow with StackMatrix!</h2>
        </div>

    <div class="right">
      <div class="button-container">    
        <a class="buttonLink" href="registration.php">Register</a>
        <a class="buttonLink" href="login.php" >Login</a></button>
      </div>
    </div>
    </div>
  </main>
  <div class="index-content">
    <section class="index-introduction">
        <h3>Knowledge Sharing</h3>
        <img src="image/host_image/index_intro_knowledge.jpg" alt="Illustration of a collaborative tech community">
        <p>stackMatrix brings together tech enthusiasts from around the world to share insights, solve problems, and collaborate on innovative ideas.</p>
    </section>
    <section class="index-introduction">
        <h3>Expert-Led Discussions</h3>
        <img src="image/host_image/index_intro_discussions.jpg" alt="Representation of expert-led discussions">
        <p>Join discussions moderated by industry experts, gaining valuable knowledge and staying updated on the latest tech trends and innovations.</p>
    </section>
    <section class="index-introduction">
        <h3>Resourceful Content</h3>
        <img src="image/host_image/index_intro_content.jpg" alt="Visualization of organized resources">
        <p>Access a wealth of tutorials, guides, and best practices neatly categorized to help you find the information you need quickly and efficiently.</p>
    </section>
</div>
  <div class="container">
        <div class="left">
        <p class="stackmatrix_text">Welcome to stackMatrix</p>
        
        <p>Join a global network of like-minded individuals who are passionate about technology and innovation.
          Together, we’re building a space where ideas flourish, solutions are crafted, 
          and the future of tech is shaped.</p>
        </div>

    <div class="right">
    <img src="image/host_image/index_welcome.jpg" alt="Illustration of a collaborative tech community">
     
      
    </div>
    </div>
  <hr>



   
    

  <?php include 'shared/footer.php'; ?>
</body>

</html>