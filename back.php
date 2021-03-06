<?php

include './constants.php';
include './config.php';

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $users_sql = "SELECT * FROM `users` WHERE `email`='$email'";
    $users_result = mysqli_query($con,$users_sql);
    $users_count = mysqli_num_rows($users_result);
    if($users_count > 0){
        header("location: register.php?error=1");
    }else{
    
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
        $users_sql = "INSERT INTO `users`(`username`,`email`,`password`)VALUES('$username','$email','$hashed_password')";
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
    
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $token = substr(str_shuffle($chars),0,10);
    
    $users_sql = "SELECT * FROM `users` WHERE `email`='$email'";
    $users_result = mysqli_query($con,$users_sql);
    $users_count = mysqli_num_rows($users_result);
    $users_row = mysqli_fetch_array($users_result);
    if($users_count > 0){
        if(password_verify($password, $users_row['password'])){
            $users_sql2 = "UPDATE `users` SET `token`='$token' WHERE `email`='$email'";
            $users_result2 = mysqli_query($con,$users_sql2);
            session_start(); 
            $_SESSION['login_token'] = $token;
            header("location: welcome.php?success=1");
        }else{
            header("location: login.php?error=2");
        }
    }else{
        header("location: login.php?error=1");
    }
                    
}



if(isset($_POST['forgot_pass'])){
    $email = $_POST['email'];

    $url1 = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    $url2 = str_replace("back.php","reset_password.php",$url1);

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $token = substr(str_shuffle($chars),0,10);
    
    $users_sql = "SELECT * FROM `users` WHERE `email`='$email'";
    $users_result = mysqli_query($con,$users_sql);
    $users_count = mysqli_num_rows($users_result);
    $users_row = mysqli_fetch_array($users_result);
    if($users_count > 0){
            
        $to = "$email";
        $subject = "Password Reset";

        $message = '
        <html>
        <head>
        <title>Password Reset</title>
        </head>
        <body>
        <p>click to reset your password!</p>
        <a href="'.$url2.'?email='.$email.'&token='.$token.'">Reset Password</a>
        </body>
        </html>
        ';

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: '.SEND_EMAIL_FROM . "\r\n";
        $headers .= 'Cc: '.SEND_EMAIL_CC . "\r\n";

        if(mail($to,$subject,$message,$headers)){
            $users_sql2 = "UPDATE `users` SET `token`='$token' WHERE `email`='$email'";
            $users_result2 = mysqli_query($con,$users_sql2);
            header("location: forgot_password.php?success=1&mailsent");
        }else{
            header("location: forgot_password.php?success=1&mailerr");
        }
    }else{
        header("location: forgot_password.php?success=1");
    }
                    
}

if(isset($_POST['reset_pass'])){
    $email = $_POST['email'];
    $token = $_POST['token'];
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $users_sql = "UPDATE `users` SET `password`='$hashed_password' WHERE `email`='$email'";
    $users_result = mysqli_query($con,$users_sql);
    if($users_result){
        header("location: reset_password.php?email=$email&token=$token&success=1");
    }else{
        header("location: reset_password.php?email=$email&token=$token&error=1");
    }
                    
}
?>
                