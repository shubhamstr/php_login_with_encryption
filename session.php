<?php
  session_start();
  include 'config.php';
  
  if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $users_sql = "SELECT * FROM `users` WHERE `username`='$username'";
    $users_result = mysqli_query($con,$users_sql);
    $users_count = mysqli_num_rows($users_result);
    if($users_count==0){
      header('location: login.php');
    }
    $users_row = mysqli_fetch_array($users_result);
    $user_id = $row['id'];
    $username = $row['username'];
    $email = $row['email'];
    
  }
  else{
    header('location: login.php');
  }
?>