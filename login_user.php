<?php
//session_start();
global $connection;
if(isset($_POST['login'])){
    $email=stripslashes($_POST['email']);
    $password=md5(stripslashes($_POST['password']));
   // $password=md5($password);

    $email=mysqli_real_escape_string($connection,$email);
    $password=mysqli_real_escape_string($connection,$password);


    $querry=mysqli_query($connection,"SELECT *FROM signup Where email='$email'");
    $count=mysqli_num_rows($querry);
    if($count<=0){

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Login Error!","No details in the database!","error");';
        echo '}, 5);</script>';
    }
    else{
        while($row=mysqli_fetch_array($querry)){
            $userfirstname=$row['firstname'];
            $userlastname=$row['lastname'];
            $useremail=$row['email'];
            $userpassword=$row['password'];
        }
        if($email==$useremail && $password==$userpassword){
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Login Success!"," Login Successful","success");';
            echo '}, 5);</script>';
            $_SESSION['firstname']=$userfirstname;
            $_SESSION['lastname']=$userlastname;
            header("Location: notices.php");

        }else{
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Login Error!"," Password or Email is Incorrect.Please try again","error");';
            echo '}, 5);</script>';
        }

    }

}

?>