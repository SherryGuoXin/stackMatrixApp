<!--
    Group: 10
    Student Name: Xin Guo, 041-154-582
    Student Name: Di Wu, 041-165-211
    Lab: CST8285 311
    Assignment: Assignment 02
    Date: November-15-2024
    Professor: Hala Own

    File Name: rightContent.php
    Page Description: To show right side of homepage after user logs in.
    Contributed by Xin Guo
-->

<?php
require_once('database/database.php');
$db = db_connect();
?>

<!DOCTYPE html>
<html>

<head>

</head>

<body>
    <div class="right_sidebar">
        <img src="./image/host_image/right_sidebar_img.gif" alt="" width=256px alt="sidebar img">

        <h3> What’s hot </h3>

        <div class="sidebar_content_zone">
            <?php
            $sql_top_threads = "
            SELECT t.thread_id, t.thread, COUNT(c.comment_id) AS comment_count
            FROM THREADS t
            LEFT JOIN COMMENTS c ON t.thread_id = c.thread_id
            GROUP BY t.thread_id
            ORDER BY comment_count DESC
            LIMIT 5";
            $result_top_threads = mysqli_query($db, $sql_top_threads);

            if ($result_top_threads) {
                while ($row = mysqli_fetch_assoc($result_top_threads)) {
                    echo "<p class='sidebar-content'>
                <a href='viewThread.php?id={$row['thread_id']}'>
                {$row['thread']} ({$row['comment_count']} comments)
                </a>
                </p>";
                }
            } else {
                echo "Error fetching top threads: " . mysqli_error($db);
            }
            ?>
        </div>

        <h3> What’s happening </h3>
        <div class="sidebar_content_zone">
            <?php
            $sql_categories = "SELECT category_name FROM CATEGORIES";
            $result_set_category = mysqli_query($db, $sql_categories);
            for ($i = 0; $i < 10; $i++) { // Loop 10 times
                $result_category = mysqli_fetch_assoc($result_set_category);

                if ($result_category) {
                    $category_name = $result_category['category_name'];
                    echo "<p class='sidebar-title'> Category: {$category_name} </p>";

                    $sql_thread = " SELECT t.thread, t.thread_id FROM THREADS t 
                WHERE t.category = '$category_name'
                LIMIT 1";
                    $result_set_thread = mysqli_query($db, $sql_thread);

                    if ($result_set_thread && mysqli_num_rows($result_set_thread) > 0) {
                        $result_thread = mysqli_fetch_assoc($result_set_thread);
                        echo "<a href='viewThread.php?id={$result_thread['thread_id']}' class='thread-link'>
                    <p class='sidebar-content'>{$result_thread['thread']}</p>
                </a>";
                    } else {
                        echo "<p class='sidebar-content'> Click more to explore $category_name.</p>";
                    }
                }
            }
            ?>
        </div>
        <a class="buttonLink" href="./searchThread.php">show more </a>
    </div>
</body>

</html>