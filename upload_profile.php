<?php
global $connection;

if(isset($_POST['update_profile'])){
    $userfirstname=$_SESSION['firstname'];
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
//        die("<i class='alert-danger glyphicon glyphicon-danger'></i> No file selected, Please select the file to upload");
        die("<div class='alert alert-danger'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>No file Selected!</strong> Please select the file to upload
</div> ");
    } else {

        move_uploaded_file($upload_tmp, $path);
        // echo '<i class="alert-success glyphicon glyphicon-ok"></i>File uploaded successifully';

    }

    //ADD TO DATABASE
    $sql="UPDATE profile_pic SET profileimage='$path' WHERE name='$userfirstname' ";

    $query=mysqli_query($connection,$sql);
    if ($query) {
        echo "<div class='alert alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Profile Upload!</strong>  Profile Pic updated successfully.
            </div> ";
        header("Location: profile.php");


    } else {

        echo"<div class='alert alert-danger'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Profile Upload Error!</strong> Profile not updated.Please Trv Again..
</div> ";
    }


}
?>