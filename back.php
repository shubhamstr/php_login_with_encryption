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



if(isset($_POST['forgot_pass'])){
    $email = $_POST['email'];

    $url1 = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    $url2 = str_replace("back.php","reset_password.php",$url1);
    
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
        <a href="'.$url2.'?email='.$email.'">Reset Password</a>
        </body>
        </html>
        ';

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <shubhamsutartesting@gmail.com>' . "\r\n";
        $headers .= 'Cc: shubhamsutar5799@gmail.com' . "\r\n";

        if(mail($to,$subject,$message,$headers)){
            header("location: forgot_password.php?success=1&mailsent");
        }else{
            header("location: forgot_password.php?success=1&mailerr");
        }
    }else{
        header("location: forgot_password.php?success=1");
    }
                    
}
?>
                