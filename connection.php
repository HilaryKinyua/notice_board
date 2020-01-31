<?php
ob_start();
session_start();
date_default_timezone_set("Africa/Nairobi");
$connection=mysqli_connect('localhost','root','','notice_board');
if(!$connection){
    echo"<script>alert('Unable to connect to the database')</script>";
}

?>