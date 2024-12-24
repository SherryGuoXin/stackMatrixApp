<!--
    Group: 10
    Student Name: Xin Guo, 041-154-582
    Student Name: Di Wu, 041-165-211
    Lab: CST8285 311
    Assignment: Assignment 02
    Date: November-15-2024
    Professor: Hala Own

    File Name: home.php
    Page Description: To show homepage after user logs in.
    Contributed by Di Wu
-->

<?php
session_start();
unset($_SESSION['thread_id']);
require_once('database/database.php');
$db = db_connect();

$user_name = $_SESSION['user_name'];
$sql_user = "SELECT * FROM USERS WHERE user_name = '$user_name'";
$result_set_user = mysqli_query($db, $sql_user);
$result_user = mysqli_fetch_assoc($result_set_user);

$sql_category = "SELECT category_name FROM CATEGORIES";
$result_set_category = mysqli_query($db, $sql_category);

$sql_thread = "SELECT * FROM THREADS ORDER BY post_time DESC";
$result_set_thread = mysqli_query($db, $sql_thread);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="to show stackmatrix homepage after user logs in.">
  <meta name="keyword" content="thread, comment, stackmatrix, post, user">
  <meta name="author" content="Di Wu">
  <title>StackMatrix | Home</title>

  <link rel="stylesheet" href="style/style.css?<?php echo time() ?>">
  <script src="js/home.js?<?php echo time() ?>" defer></script>
</head>

<body>
  <?php include "shared/header.php"; ?>

  <main>


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

      <div class="main-content">
        <form class="add_thread" action="server/newThread.php" method="POST" enctype="multipart/form-data" onsubmit="return validate();">
          <div class="selection">
            <label>Select Your Thread Category</label>
            <select class="selection_bar" name="category" id="category">
              <option value="Other" selected>Other</option>
              <?php while ($result_category = mysqli_fetch_assoc($result_set_category)) { ?>
                <option value="<?php echo $result_category['category_name']; ?>"><?php echo $result_category['category_name']; ?></option>
              <?php } ?>
            </select>
          </div>

          <label class="hide_content" for="thread">Write your thread here</label>
          <textarea id="thread" name="thread" rows="3" cols="45" placeholder="What is happening?!"></textarea>

          <div class="upload_submit">
            <div class="upload_image">
              <label for="upload_image">Upload Your Image Here</label>
              <input type="file" id="upload_image" name="image" />
            </div>

            <button class="input_size" id="add_thread_button" type="submit">Post</button>
          </div>

        </form>

        <?php while ($result_thread = mysqli_fetch_assoc($result_set_thread)) { ?>
          <div class="show_thread_comment">
            <div class="thread_comment_header">

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

            <div class="thread_comment_content">
              <a href="<?php echo "viewThread.php?id=" . $result_thread['thread_id']; ?>">
                <p><?php echo $result_thread['thread']; ?></p>
                <?php if ($result_thread['thread_image_name'] != '') { ?>
                  <img class="thread_image" src="image/thread_image/<?php echo $result_thread['thread_image_name']; ?>">
                <?php } ?>

              </a>
            </div>

            <?php
            $thread_id = $result_thread['thread_id'];
            $sql_comment = "SELECT COUNT(comment_id) AS count FROM COMMENTS WHERE thread_id = $thread_id";
            $result_set_comment = mysqli_query($db, $sql_comment);
            $result_comment = mysqli_fetch_assoc($result_set_comment)
            ?>

            <a href="<?php echo "viewThread.php?id=" . $result_thread['thread_id']; ?>">
              <p class="count_of_comment"><?php echo $result_comment['count']; ?> comments</p>
            </a>

          </div>
        <?php } ?>
      </div>

      <div class="right-content">
        <?php include "shared/rightContent.php"; ?>
      </div>
    </div>


  </main>

  <?php include 'shared/footer.php'; ?>
</body>

</html>