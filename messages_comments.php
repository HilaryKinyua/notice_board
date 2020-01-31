<?php
global $connection;
if(isset($_POST['send_comment'])){

    $comment=$_POST['comment'];
    //Comment Owner
    $fname=$_SESSION['firstname'];
    $lname=$_SESSION['lastname'];
    $comment=mysqli_real_escape_string($connection,$comment);
    $sql="INSERT INTO table_comments(comments,firstname,lastname)VALUES ('{$comment}','{$fname}','{$lname}')";
    $querry=mysqli_query($connection,$sql);
    if($querry){
//        echo"<script>alert('Comment Saved to the database')</script>";

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Comment!","Comment Saved Successfully!","success");';
        echo '}, 10);</script>';
//        echo"<script>window.location='notices.php'</script>";
       // header("Location: notices.php");



    }
    else{
        echo"<script>alert('Comment not saved')</script>";
    }

}
?>
