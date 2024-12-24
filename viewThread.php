<!--
    Group: 10
    Student Name: Xin Guo, 041-154-582
    Student Name: Di Wu, 041-165-211
    Lab: CST8285 311
    Assignment: Assignment 02
    Date: November-15-2024
    Professor: Hala Own

    File Name: viewThread.php
    Page Description: To view threads and add comments.
    Contributed by Di Wu
-->


<?php
session_start();
require_once('database/database.php');
$db = db_connect();

if (!isset($_GET['id'])) {
  header("Location: home.php");
} else {
  $thread_id = $_GET['id'];
  $_SESSION['thread_id'] = $thread_id;
}

$user_name = $_SESSION['user_name'];
$sql_user = "SELECT * FROM USERS WHERE user_name = '$user_name'";
$result_set_user = mysqli_query($db, $sql_user);
$result_user = mysqli_fetch_assoc($result_set_user);

$sql_thread = "SELECT * FROM THREADS WHERE thread_id = '$thread_id'";
$result_set_thread = mysqli_query($db, $sql_thread);
$result_thread = mysqli_fetch_assoc($result_set_thread);
$thread_user = $result_thread['user_name'];

$sql_comment = "SELECT * FROM COMMENTS WHERE thread_id = '$thread_id'
                ORDER BY comment_time DESC";
$result_set_comment = mysqli_query($db, $sql_comment);
$sql_comment_count = "SELECT COUNT(comment_id) AS count FROM COMMENTS WHERE thread_id = '$thread_id'";
$result_comment_count = mysqli_query($db, $sql_comment_count);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="To To view threads and add comments in stackmatix.">
  <meta name="keyword" content="stackmatrix, view, thread, comment, add">
  <meta name="author" content="Di Wu">
  <title>StackMatrix Thread</title>

  <link rel="stylesheet" href="style/style.css?<?php echo time() ?>">
  <script src="js/viewThread.js?v=<?php echo time(); ?>" defer></script>
</head>

<body>
  <?php include "shared/header.php"; ?>

  <main>
    <div class="navigation">
      <h2><a href="home.php">&laquo; Back to Your Home</a></h2>
      <div>
        <h2 class="manage_thread"><a href="<?php echo "updateThread.php?id=" . $_SESSION['thread_id']; ?>">UPDATE THE THREAD</a></h2>
        <h2 class="manage_thread"><a href="server/deleteThread.php" id="delete_thread">DELETE THE THREAD</a></h2>
      </div>
    </div>


    <div class="content">
      <div class="left-content">
        <div class="welcome_user">
          <?php if (isset($_SESSION['user_name'])) { ?>
            <h1>Welcome to StackMatrix, </h1>
            <div class="user_content">
              <?php if ($result_user['profile_image_name'] != '') { ?>
                <img class="profile_image" src="image/profile_image/<?php echo $result_user['profile_image_name']; ?>">
              <?php } else { ?>
                <img class="profile_image" src="image/profile_image/default.jpg">
              <?php } ?>
              <p><?php echo $user_name; ?></h1>
              </p>
            </div>
          <?php } else {
            header("Location: login.php");
          } ?>

        </div>

        <?php include "shared/leftContent.php"; ?>
      </div>

      <div class="main-content_viewThread">
        <div class="thread_comment_header_viewThread">

          <?php
          $thread_user_name = $result_thread['user_name'];
          $sql_thread_user = "SELECT * FROM USERS WHERE user_name = '$thread_user_name'";
          $result_set_thread_user = mysqli_query($db, $sql_thread_user);
          $result_thread_user = mysqli_fetch_assoc($result_set_thread_user);
          ?>

          <div class="user_content">
            <?php if ($result_thread_user['profile_image_name'] != '') { ?>
              <img class="profile_image" src="image/profile_image/<?php echo $result_thread_user['profile_image_name']; ?>">
            <?php } else { ?>
              <img class="profile_image" src="image/profile_image/default.jpg">
            <?php } ?>
            <p><?php echo $result_thread['user_name']; ?></p>
            </p>
          </div>
          <p>posted on <?php echo $result_thread['post_time']; ?></p>
        </div>

        <div class="thread_comment_content_viewThread">
          <p><?php echo $result_thread['thread']; ?></p>
          <?php if ($result_thread['thread_image_name'] != '') { ?>
            <img class="thread_image" src="image/thread_image/<?php echo $result_thread['thread_image_name']; ?>">
          <?php } ?>
        </div>

        <hr class="in_viewThread">
        <p class="in_viewThread"><?php echo mysqli_fetch_assoc($result_comment_count)['count']; ?> comments</p>
        <hr class="in_viewThread">

        <form class="add_comment" action="server/comment.php" method="POST">
          <label class="hide_content" for="comment">Write your comment here</label><br>
          <textarea id="comment" name=comment rows="3" cols="45" placeholder="Post your comment"></textarea>

          <button class="input_size" id="add_comment_update_thread_button" type="submit">Comment</button>
        </form>

        <?php while ($results_comment = mysqli_fetch_assoc($result_set_comment)) { ?>
          <div class="show_thread_comment">
            <div class="thread_comment_header">


              <?php
              $comment_user_name = $results_comment['user_name'];
              $sql_comment_user = "SELECT * FROM USERS WHERE user_name = '$comment_user_name'";
              $result_set_comment_user = mysqli_query($db, $sql_comment_user);
              $result_comment_user = mysqli_fetch_assoc($result_set_comment_user);
              ?>

              <div class="user_content">
                <?php if ($result_comment_user['profile_image_name'] != '') { ?>
                  <img class="profile_image" src="image/profile_image/<?php echo $result_comment_user['profile_image_name']; ?>">
                <?php } else { ?>
                  <img class="profile_image" src="image/profile_image/default.jpg">
                <?php } ?>
                <p><?php echo $results_comment['user_name']; ?></p>
                </p>
              </div>
              <p>commented on <?php echo $results_comment['comment_time']; ?> </p>
            </div>

            <p class="thread_comment_content"><?php echo $results_comment['comment']; ?> </p>
          </div>

        <?php } ?>
      </div>

      <div class="right-content_view_update_Thread">
        <?php include "shared/rightContent.php"; ?>
      </div>
    </div>
  </main>

  <?php include 'shared/footer.php'; ?>
</body>

</html>