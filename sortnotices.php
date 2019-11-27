<?php
global $connection;
if(isset($_POST['selectionsearch'])) {
    $selectionsearch = $_POST['selectionsearch'];
    switch ($selectionsearch) {
        case'Education Notices':
            $select_query = mysqli_query($connection, "SELECT * FROM notice_upload WHERE 	notice_category LIKE '%Education%'");
            $counter = 0;
            if (mysqli_num_rows($select_query) > 0) {
                while ($row = mysqli_fetch_array($select_query)) {
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

                    $counter++;

                    ?>
                    <h4 align="center" class="alert alert-success">Search Results Found</h4>
                    <table class="table table-responsive table-striped">
                        <thead style="background-color:#67A9CE;color: #ffffff;">
                        <tr>
                            <td>#</td>
                            <th>Upload Title</th>
                            <th>Remaining Days</th>
                            <th>Upload Date/Time</th>
                            <th>Category</th>
                            <th>View</th>
                        </tr>
                        </thead>
                        <tr>
                            <td><?php echo $counter; ?></td>
                            <td><?php echo $upload_title; ?></td>
                            <td><?php echo $x; ?></td>
                            <td><?php echo $upload_time; ?></td>
                            <td><?php echo $notice_category; ?></td>
                            <td><a href="<?php echo $document; ?>" class="btn btn-primary " title="View Details"
                                   style="background-color: blue;color: #ffffff;text-decoration: none;border-radius: 50px;"
                                   download>View</a></td>
                        </tr>
                    </table>
                <?php

                }

            } else {
                echo '<div class="alert alert-danger">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Search Error!</strong> 0 results found for your Search
</div>';

            }

            break;

        //Sports
        case'Sports':
            $select_query = mysqli_query($connection, "SELECT * FROM notice_upload WHERE 	notice_category LIKE '%Sports%'");
            $counter = 0;
            if (mysqli_num_rows($select_query) > 0) {
                while ($row = mysqli_fetch_array($select_query)) {
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

                    $counter++;

                    ?>
                    <h4 align="center" class="alert alert-danger">Search Results Found</h4>
                    <table class="table table-responsive table-striped">
                        <thead style="background-color:#67A9CE;color: #ffffff;">
                        <tr>
                            <td>#</td>
                            <th>Upload Title</th>
                            <th>Remaining Days</th>
                            <th>Upload Date/Time</th>
                            <th>Category</th>
                            <th>View</th>
                        </tr>
                        </thead>
                        <tr>
                            <td><?php echo $counter; ?></td>
                            <td><?php echo $upload_title; ?></td>
                            <td><?php echo $x; ?></td>
                            <td><?php echo $upload_time; ?></td>
                            <td><?php echo $notice_category; ?></td>
                            <td><a href="<?php echo $document; ?>" class="btn btn-primary " title="View Details"
                                   style="background-color: blue;color: #ffffff;text-decoration: none;border-radius: 50px;"
                                   download>View</a></td>
                        </tr>
                    </table>
                <?php

                }

            } else {
                echo '<div class="alert alert-danger">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Search Error!</strong> 0 results found for your Search
</div>';

            }
            break;

        //Meetings
        case'Meetings':
            $select_query = mysqli_query($connection, "SELECT * FROM notice_upload WHERE 	notice_category LIKE '%Meetings%'");
            $counter = 0;
            if (mysqli_num_rows($select_query) > 0) {
                while ($row = mysqli_fetch_array($select_query)) {
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

                    $counter++;

                    ?>
                    <h4 align="center" class="alert alert-success">Search Results Found</h4>
                    <table class="table table-responsive table-striped">
                        <thead style="background-color:#67A9CE;color: #ffffff;">
                        <tr>
                            <td>#</td>
                            <th>Upload Title</th>
                            <th>Remaining Days</th>
                            <th>Upload Date/Time</th>
                            <th>Category</th>
                            <th>View</th>
                        </tr>
                        </thead>
                        <tr>
                            <td><?php echo $counter; ?></td>
                            <td><?php echo $upload_title; ?></td>
                            <td><?php echo $x; ?></td>
                            <td><?php echo $upload_time; ?></td>
                            <td><?php echo $notice_category; ?></td>
                            <td><a href="<?php echo $document; ?>" class="btn btn-primary " title="View Details"
                                   style="background-color: blue;color: #ffffff;text-decoration: none;border-radius: 50px;"
                                   download>View</a></td>
                        </tr>
                    </table>
                <?php

                }

            } else {
                echo '<div class="alert alert-danger">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Search Error!</strong> 0 results found for your Search
</div>';

            }
            break;

        //Entertainment
        case'Entertainment':
            $select_query = mysqli_query($connection, "SELECT * FROM notice_upload WHERE 	notice_category LIKE '%Entertainment%'");
            $counter = 0;
            if (mysqli_num_rows($select_query) > 0) {
                while ($row = mysqli_fetch_array($select_query)) {
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

                    $counter++;

                    ?>
                    <h4 align="center" class="alert alert-success">Search Results Found</h4>
                    <table class="table table-responsive table-striped">
                        <thead style="background-color:#67A9CE;color: #ffffff;">
                        <tr>
                            <td>#</td>
                            <th>Upload Title</th>
                            <th>Remaining Days</th>
                            <th>Upload Date/Time</th>
                            <th>Category</th>
                            <th>View</th>
                        </tr>
                        </thead>
                        <tr>
                            <td><?php echo $counter; ?></td>
                            <td><?php echo $upload_title; ?></td>
                            <td><?php echo $x; ?></td>
                            <td><?php echo $upload_time; ?></td>
                            <td><?php echo $notice_category; ?></td>
                            <td><a href="<?php echo $document; ?>" class="btn btn-primary " title="View Details"
                                   style="background-color: blue;color: #ffffff;text-decoration: none;border-radius: 50px;"
                                   download>View</a></td>
                        </tr>
                    </table>
                <?php

                }

            } else {
                echo '<div class="alert alert-danger">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Search Error!</strong> 0 results found for your Search
</div>';

            }

            break;


//Lost And Found Items
        case'Lost And Found Items':
            $select_query = mysqli_query($connection, "SELECT * FROM notice_upload WHERE 	notice_category LIKE '%Lost And Found Items%'");
            $counter = 0;
            if (mysqli_num_rows($select_query) > 0) {
                while ($row = mysqli_fetch_array($select_query)) {
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

                    $counter++;

                    ?>
                    <h4 align="center" class="alert alert-success">Search Results Found</h4>
                    <table class="table table-responsive table-striped">
                        <thead style="background-color:#67A9CE;color: #ffffff;">
                        <tr>
                            <td>#</td>
                            <th>Upload Title</th>
                            <th>Remaining Days</th>
                            <th>Upload Date/Time</th>
                            <th>Category</th>
                            <th>View</th>
                        </tr>
                        </thead>
                        <tr>
                            <td><?php echo $counter; ?></td>
                            <td><?php echo $upload_title; ?></td>
                            <td><?php echo $x; ?></td>
                            <td><?php echo $upload_time; ?></td>
                            <td><?php echo $notice_category; ?></td>
                            <td><a href="<?php echo $document; ?>" class="btn btn-primary " title="View Details"
                                   style="background-color: blue;color: #ffffff;text-decoration: none;border-radius: 50px;"
                                   download>View</a></td>
                        </tr>
                    </table>
                <?php

                }

            } else {
                echo '<div class="alert alert-danger">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Search Error!</strong> 0 results found for your Search
</div>';

            }
            break;

        //Advertisements
        case'Advertisements':
            $select_query = mysqli_query($connection, "SELECT * FROM notice_upload WHERE 	notice_category LIKE '%Advertisements%'");
            $counter = 0;
            if (mysqli_num_rows($select_query) > 0) {
                while ($row = mysqli_fetch_array($select_query)) {
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

                    $counter++;

                    ?>
                    <h4 align="center" class="alert alert-success">Search Results Found</h4>
                    <table class="table table-responsive table-striped">
                        <thead style="background-color:#67A9CE;color: #ffffff;">
                        <tr>
                            <td>#</td>
                            <th>Upload Title</th>
                            <th>Remaining Days</th>
                            <th>Upload Date/Time</th>
                            <th>Category</th>
                            <th>View</th>
                        </tr>
                        </thead>
                        <tr>
                            <td><?php echo $counter; ?></td>
                            <td><?php echo $upload_title; ?></td>
                            <td><?php echo $x; ?></td>
                            <td><?php echo $upload_time; ?></td>
                            <td><?php echo $notice_category; ?></td>
                            <td><a href="<?php echo $document; ?>" class="btn btn-primary " title="View Details"
                                   style="background-color: blue;color: #ffffff;text-decoration: none;border-radius: 50px;"
                                   download>View</a></td>
                        </tr>
                    </table>
                <?php

                }

            } else {
                echo '<div class="alert alert-danger">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Search Error!</strong> 0 results found for your Search
</div>';

            }
            break;

    }





}


?>