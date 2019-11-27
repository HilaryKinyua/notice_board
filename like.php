<?php
global $connection;
if(isset($_POST['like'])){

    $find_counts = "SELECT *FROM notice_likes";
    $count_query = mysqli_query($connection, $find_counts);
    while ($row = mysqli_fetch_assoc($count_query)) {
        $current_count = $row['counts'];

        $new_count = $current_count + 1;
        $update_count = mysqli_query($connection, "UPDATE notice_likes SET counts=$new_count");
        echo $new_count . "&nbsp; People Likes this";
    }
}
?>
