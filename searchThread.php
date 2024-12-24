<!--
    Group: 10
    Student Name: Xin Guo, 041-154-582
    Student Name: Di Wu, 041-165-211
    Lab: CST8285 311
    Assignment: Assignment 02
    Date: November-15-2024
    Professor: Hala Own

    File Name: searchThread.php
    Page Description: To search thread.
    Contributed by Di Wu
-->

<?php
session_start();
require_once('database/database.php');
$db = db_connect();

$sql_category = "SELECT category_name FROM CATEGORIES";
$result_set_category = mysqli_query($db, $sql_category);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $keyword = $_POST['keyword'];
    $name = $_POST['name'];
    $category  = $_POST['category'];

    $sql_thread = "SELECT * FROM THREADS 
    WHERE (thread LIKE '%$keyword%' OR '$keyword' = '')
    AND (user_name = '$name' OR '$name' = '')
    AND (category = '$category' OR '$category' = '')
    ORDER BY post_time DESC";
    $result_set_thread = mysqli_query($db, $sql_thread);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="To search thread in stackmatix.">
    <meta name="keyword" content="stackmatrix, search, thread, comment, time">
    <meta name="author" content="Di Wu">
    <title>Search Thread</title>

    <link rel="stylesheet" href="style/style.css?<?php echo time() ?>">
</head>

<body>
    <?php include "shared/header.php"; ?>

    <main class="search-content">
        <div class="search_bar">
            <form action="searchThread.php" method="POST" class="search_form">
                <input type="text" name="keyword" maxlength="200" placeholder="Keyword" />
                <input type="text" name="name" maxlength="20" placeholder="User Name" />

                <select name="category" id="category">
                    <option value="">Filter Category </option>
                    <?php while ($result_category = mysqli_fetch_assoc($result_set_category)) { ?>
                        <option value="<?php echo $result_category['category_name']; ?>"><?php echo $result_category['category_name']; ?></option>
                    <?php } ?>
                </select>
                <input type="submit" value="Search" />
            </form>
        </div>

        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            while ($result_thread = mysqli_fetch_assoc($result_set_thread)) { ?>
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
        <?php }
        } ?>
    </main>

    <?php include 'shared/footer.php'; ?>
</body>

</html>