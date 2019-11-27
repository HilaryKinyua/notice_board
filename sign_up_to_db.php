
<?php
global $connection;
if(isset($_POST['signup'])){
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $confirm_password=md5($_POST['confirm_password']);

    $firstname=mysqli_real_escape_string($connection,$firstname);
    $lastname=mysqli_real_escape_string($connection,$lastname);
    $email=mysqli_real_escape_string($connection,$email);
    $password=mysqli_real_escape_string($connection,$password);




if($password==$confirm_password){
    if(strlen($password)<8){
//        echo"<script>alert('Password length must be 8 or more Characters.Please try typing a longer password')</script>";
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Sign up Error!","Password length must be 8 or more Characters.Please try typing a longer password!","error");';
        echo '}, 5);</script>';
    }
    else{
        $sql="INSERT INTO signup(firstname,lastname,email,password)VALUES ('{$firstname}','{$lastname}','{$email}','{$password}')";
        $query=mysqli_query($connection,$sql);
        if($query){

            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Sign up Success!","operation successful.You can Login now!","success");';
            echo '}, 1000);</script>';
            echo"<script>location.href='login.php'</script>";
        }
        else{

            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Sign up Error!","Operation failed.Please try again!!","error");';
            echo '}, 5);</script>';
        }

    }

}
        else{

            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Sign up Error!","Password dont match.Try typing the correct password!","error");';
            echo '}, 5);</script>';
        }




}

?>