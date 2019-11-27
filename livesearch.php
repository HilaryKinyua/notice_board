<?php

$connect = mysqli_connect("localhost", "root", "", "notice_board");
$output = '';
$sql = "select * from notice_upload where upload_title like
'%" . $_POST["search"] . "%' OR today_date like '%".$_POST["search"]."%'
OR notice_category like '%".$_POST["search"]."%' ";
$query = mysqli_query($connect, $sql);
if (mysqli_num_rows($query) > 0) {
?>
<h4 align="center" class="alert alert-success">Search Results Found</h4>
<div class="table-responsive" ">
<table class="table table bordered table-striped">
    <thead style="background-color:#67A9CE;color: #ffffff;">
    <tr>
        <th>Upload Title</th>
        <th>Remaining Days</th>
        <th>Upload Date/Time</th>
        <th>Category</th>
        <th>View</th>
    </tr>
    </thead>

    <?php

    while ($row = mysqli_fetch_array($query)) {
        $upload_title = $row['upload_title'];
        $upload_time = $row['today_date'];
        $notice_category = $row['notice_category'];
        $document = $row['document'];

        //Count the days remaining for the notice
        $exp_date = strtotime($row['expiry_date']);
        $today_date = strtotime(date("y-m-d H:i:s"));
        $diff = $today_date - $exp_date;
        //$diff=$exp_date-$today_date;
        $x = abs(floor($diff / (60 * 60 * 24)));

        echo "
<tbody>
                    <tr>
                    <td> $upload_title </td>
                    <td>$x</td>
                    <td> $upload_time</td>
                    <td>$notice_category</td>
                     <td><a href='$document' class='btn btn-primary '
                title='View Details'
                style='background-color: blue;color: #ffffff;text-decoration: none;border-radius: 50px;'
                download>View</a></td>
                    </tr>
                    </tbody>";

    }

    }
    else {
        echo "</table>";
        echo "</div>";
        echo "<center class='alert alert-danger'>No data found</center>";

    }
    ?>


