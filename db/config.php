<?php
$con = mysqli_connect("localhost", "root", "");

if(isset($_GET["check"])){
    if($con){
        echo "Connected Successfully"."<br>";
    }else{
        echo "Connection Failed ".mysqli_connect_errno()."<br>";
        if(mysqli_connect_errno() == 1049){
            echo "use seeding file to set initial data"."<br>";
        }
    }
}