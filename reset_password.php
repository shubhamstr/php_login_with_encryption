<?php
if(isset($_GET['email'])){
    include 'config.php';
    $email = $_GET['email'];
    $users_sql = "SELECT * FROM `users` WHERE `email`='$email'";
    $users_result = mysqli_query($con,$users_sql);
    $users_count = mysqli_num_rows($users_result);
    $users_row = mysqli_fetch_array($users_result);
    if($users_count==0){
        header('location: login.php');
    }else{
        session_start(); 
        $_SESSION['username'] = $users_row['username'];
    }
}else if(isset($_GET['reset_pass'])){
    include './session.php'; 
}else{
    header('location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container">
        <h1 class="text-center">Reset Password</h1>
        <div class="col-12 col-md-6 offset-md-3">
            <form action="./back.php" method="post" id="userform">
                <div class="mb-3">
                    <label for="password" class="form-label">New Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
                    <span class="text-danger" style="font-size:15px;"></span>
                </div>
                <div class="mb-3">
                    <label for="cpassword" class="form-label">Confirm Password:</label>
                    <input type="password" class="form-control" id="cpassword" placeholder="Enter Password" name="cpassword">
                    <span class="text-danger" style="font-size:15px;"></span>
                </div>
                <div class="text-center">
                    <input type="hidden" name="reset_pass">
                    <p>Go Back <a href="login.php">Login Page</a> </p>
                    <input type="button" value="Update Password" class="btn btn-primary" id="reset">
                </div>
            </form>
        </div>
    </div>









<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#reset').click(function (e) {
                e.preventDefault();
                var password = $('#password');
                var cpassword = $('#cpassword');


                if(password.val().length == 0){
                    var err = '*Enter Password';
                    password.parent('div').find('span').text(err);
                }else if(cpassword.val().length == 0){
                    var err = '*Enter Confirm Password';
                    cpassword.parent('div').find('span').text(err);
                }else if(cpassword.val() != password.val()){
                    var err = '*Password does not match..!!';
                    cpassword.parent('div').find('span').text(err);
                }else{
                    password.parent('div').find('span').text("");
                    cpassword.parent('div').find('span').text("");
                    $('#userform').submit();
                }
                console.log(err);

            });
        });
    </script>
<?php

$url1 = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

if(!isset($_GET['reset_pass'])){
?>
    <script>
        var url1 = '<?php echo $url1; ?>';
        var url2 = url1+"?email=<?php echo $_GET['email']; ?>&reset_pass";
        console.log(url2);
        window.open(url2, '_self');
    </script>
<?php } ?>




<?php 
if(isset($_GET['success'])){
if($_GET['success']== 1){
    ?>

<script type="text/javascript">
swal("DONE!", "Password Updated Successfully", "success");
</script>
<?php
}

}
?>


<?php 
if(isset($_GET['error'])){
    if($_GET['error']== 1){
        ?>
    <script type="text/javascript">
    swal("OOPS!", "Something Error!!", "error");
    </script>
    <?php
    }

}
?>

</body>
</html>