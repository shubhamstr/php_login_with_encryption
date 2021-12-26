<?php

$con = mysqli_connect("localhost", "root", "");



$users_sql1 = "CREATE DATABASE `login_system2`;";
$users_result1 = mysqli_query($con,$users_sql1);
if($users_result1){
    echo "DATABASE login_system2 Created"."<br>";
}

$users_sql2 = "CREATE TABLE `login_system2`.`users` ( `id` INT NOT NULL AUTO_INCREMENT ,  `username` VARCHAR(250) NOT NULL ,  `email` VARCHAR(250) NOT NULL ,  `password` VARCHAR(250) NOT NULL ,  `cpassword` VARCHAR(250) NOT NULL ,  `token` VARCHAR(250) NOT NULL ,  `created_at` TIMESTAMP NOT NULL ,    PRIMARY KEY  (`id`))";
$users_result2 = mysqli_query($con,$users_sql2);
if($users_result2){
    echo "TABLE users Created"."<br>";
}

                









