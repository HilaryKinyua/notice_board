<?php
//session_start();
global $connection;
if(isset($_POST['login'])){
    $email=stripslashes($_POST['email']);
    $password=stripslashes($_POST['password']);
    // $password=md5($password);

    $email=mysqli_real_escape_string($connection,$email);
    $password=mysqli_real_escape_string($connection,$password);

    $querry=mysqli_query($connection,"SELECT *FROM lecturer_login_table WHERE email='{$email}'");
    $count=mysqli_num_rows($querry);
    if($count<=0){

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Login Error!","No details found in the database.Please try again!","error");';
        echo '}, 5);</script>';
    }
    else{
        while($row=mysqli_fetch_array($querry)){

            $userlastname=$row['name'];
            $useremail=$row['email'];
            $userpassword=$row['password'];
        }
        if($email==$useremail && $password==$userpassword){
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Login Success!"," Login Successful","success");';
            echo '}, 5);</script>';
//            $_SESSION['firstname']=$userfirstname;
            $_SESSION['name']=$username;
            header("Location: lecturer.php");

        }else{
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Login Error!","Email or password does not exist.Please try again!","error");';
            echo '}, 5);</script>';
        }

    }

}

?>