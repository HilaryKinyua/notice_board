
<?php
global $connection;
if(isset($_POST['upload'])) {
    $upload_title = $_POST['upload_title'];
    $upload_time = $_POST['upload_time'];
    $upload_date = $_POST['upload_date'];
    $notice_description = $_POST['notice_description'];
    $notice_category = $_POST['notice_category'];
    //$document = $_POST['document'];

    //upload files
    $upload_name = $_FILES['file']['name'];
    $upload_name = mt_rand(10000000, 99999999) . $upload_name;
    $upload_tmp = $_FILES['file']['tmp_name'];
    $upload_type = $_FILES['file']['type'];
    $file_size = $_FILES['file']['size'];

    $upload_name = preg_replace("#[^a-z0-9.]#i", "", $upload_name);

    $path = "uploads/$upload_name";
    if ($file_size > 104857600) {// allow files less than 100mb
        die("<div class='alert alert-danger'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Error!</strong> The File is too Big
</div>");
    }
    if (!$upload_tmp) {

        die("<div class='alert alert-danger'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>No file Selected!</strong> Please select the file to upload
</div> ");
    } else {

        move_uploaded_file($upload_tmp, $path);

    }    //ADD TO DATABASE


        $upload_title = mysqli_real_escape_string($connection, $upload_title);
        $upload_time = mysqli_real_escape_string($connection, $upload_time);
        $upload_date = mysqli_real_escape_string($connection, $upload_date);
        $notice_description = mysqli_real_escape_string($connection, $notice_description);
        $notice_category = mysqli_real_escape_string($connection, $notice_category);
        $upload_name= mysqli_real_escape_string($connection, $upload_name);

        $sql = "INSERT INTO notice_upload(upload_title,upload_time,expiry_date,notice_description,notice_category,document)
VALUES ('{$upload_title}','{$upload_time}','{$upload_date}','{$notice_description}','{$notice_category}','{$path}')";

        $querry = mysqli_query($connection, $sql);
        if ($querry) {

            echo'<script>swal("Notice Upload","Notice uploaded successfully!","success");</script>';

            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Notice Upload!","Notice uploaded successfully!","success");';
            echo '}, 10);</script>';


        } else {

            echo"<div class='alert alert-danger'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Upload Error!</strong> Notice Not Uploaded.Please Trv Again!
</div> ";
        }

}
?>