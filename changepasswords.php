<?php
global $connection;
if(isset($_POST['forgot_password'])){
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $confirm_pass=md5($_POST['password_confirm']);
    $firstname=$_POST['firstname'];

    $email=mysqli_real_escape_string($connection,$email);
    $password=mysqli_real_escape_string($connection,$password);
    $firstname=mysqli_real_escape_string($connection,$firstname);
    $sql="UPDATE signup SET password='$password' WHERE email='$email' AND firstname='$firstname'";
    $query=mysqli_query($connection,$sql);
if($password==$confirm_pass){
    if($query){
        echo"<script>alert('Password Updated Successfully.You can now login with the new Password')</script>";
        echo"<script>window.location='login.php'</script>";
    }
    else{
        echo"<script>alert('Unable to Change the password.Please try again!!')</script>";
    }
}
    else{
        echo"<script>alert('password Mismatch!')</script>";
    }


}

?>