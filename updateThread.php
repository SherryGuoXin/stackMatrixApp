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
require_once('database/database.php');
$db = db_connect();

$user_name = $_SESSION['user_name'];
$sql_user = "SELECT * FROM USERS WHERE user_name = '$user_name'";
$result_set_user = mysqli_query($db, $sql_user);
$result_user = mysqli_fetch_assoc($result_set_user);

if (!isset($_GET['id'])) {
    header("Location: home.php");
} else {
    $thread_id = $_GET['id'];
}

$sql_thread = "SELECT * FROM THREADS WHERE thread_id = '$thread_id'";
$result_set_thread = mysqli_query($db, $sql_thread);
$result_thread = mysqli_fetch_assoc($result_set_thread);
$thread = $result_thread['thread'];
$thread_image_name = $result_thread['thread_image_name'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="To update thread in stackmatix.">
    <meta name="keyword" content="stackmatrix, update, thread, time">
    <meta name="author" content="Xin Guo">
    <title>Update Thread</title>

    <link rel="stylesheet" href="style/style.css?<?php echo time() ?>">
</head>

<body>
    <?php include "shared/header.php"; ?>

    <main>
        <h2 class="back_to_thread"><a href="viewThread.php?id=<?php echo $thread_id; ?>">&laquo; Back to Your Thread</a></h2>

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
                <form class="update_thread" action="server/updateThread.php" method="POST" enctype="multipart/form-data">

                    <label class="input_label" for="updated_thread">Update your thread here</label>
                    <textarea id="updated_thread" name="updated_thread" rows="3" cols="45"><?php echo $thread; ?></textarea>

                    <div>
                        <?php if ($result_thread['thread_image_name'] != '') { ?>
                            <img class="thread_image" src="image/thread_image/<?php echo $result_thread['thread_image_name']; ?>">
                        <?php } ?>
                    </div>

                    <div class="upload_submit">
                        <div class="upload_image">
                            <label for="upload_image">Upload Your New Image Here</label>
                            <input type="file" id="upload_image" name="image" />
                        </div>

                        <button class="input_size" id="add_comment_update_thread_button" type="submit">Update Post</button>
                    </div>
                </form>
            </div>

            <div class="right-content_view_update_Thread">
                <?php include "shared/rightContent.php"; ?>
            </div>
        </div>

    </main>

    <?php include 'shared/footer.php'; ?>
</body>

</html>