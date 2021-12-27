<?php
  session_start();
  include 'config.php';
  
  if(isset($_SESSION['login_token'])){
    $login_token = $_SESSION['login_token'];
    $users_sql = "SELECT * FROM `users` WHERE `token`='$login_token'";
    $users_result = mysqli_query($con,$users_sql);
    $users_count = mysqli_num_rows($users_result);
    if($users_count==0){
      header('location: login.php');
      session_destroy();
    }
    $users_row = mysqli_fetch_array($users_result);
    $user_id = $users_row['id'];
    $username = $users_row['username'];
    $email = $users_row['email'];
    
  }
  else{
    header('location: login.php');
  }
?>