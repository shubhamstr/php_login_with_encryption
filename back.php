<?php

include './config.php';

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    
    $users_sql = "SELECT * FROM `users` WHERE `email`='$email'";
    $users_result = mysqli_query($con,$users_sql);
    $users_count = mysqli_num_rows($users_result);
    if($users_count > 0){
        header("location: register.php?error=1");
    }else{
    
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
        $users_sql = "INSERT INTO `users`(`username`,`email`,`password`,`cpassword`)VALUES('$username','$email','$hashed_password','$hashed_password')";
        $users_result = mysqli_query($con,$users_sql);
        if($users_result){
            header("location: register.php?insert=1");
        }else{
            header("location: register.php?error=2");
        }
    }
                    
}


if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $users_sql = "SELECT * FROM `users` WHERE `email`='$email'";
    $users_result = mysqli_query($con,$users_sql);
    $users_count = mysqli_num_rows($users_result);
    $users_row = mysqli_fetch_array($users_result);
    if($users_count > 0){
        if(password_verify($password, $users_row['password'])){
            session_start(); 
            $_SESSION['username'] = $users_row['username'];
            header("location: welcome.php?success=1");
        }else{
            header("location: login.php?error=2");
        }
    }else{
        header("location: login.php?error=1");
    }
                    
}

?>
                