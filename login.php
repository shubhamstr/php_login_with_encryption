<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container">
        <h1 class="text-center">Login</h1>
        <div class="col-12 col-md-6 offset-md-3">
            <form action="./back.php" method="post" id="userform">
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
                    <span class="text-danger" style="font-size:15px;"></span>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
                    <span class="text-danger" style="font-size:15px;"></span>
                </div>
                <div class="text-center">
                    <input type="hidden" name="login">
                    <p>Dont have an account? <a href="register.php">Click to Register</a> </p>
                    <p>Forgot Password? <a href="forgot_password.php">Click to Reset</a> </p>
                    <input type="button" value="Login" class="btn btn-primary" id="login">
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
            $('#login').click(function (e) {
                e.preventDefault();
                var email = $('#email');
                var password = $('#password');


                if(email.val().length == 0){
                    var err = '*Enter Email';
                    email.parent('div').find('span').text(err);
                }else if(password.val().length == 0){
                    var err = '*Enter Password';
                    password.parent('div').find('span').text(err);
                }else{
                    email.parent('div').find('span').text("");
                    password.parent('div').find('span').text("");
                    $('#userform').submit();
                }
                console.log(err);

            });
        });
    </script>




<?php 
if(isset($_GET['error'])){
if($_GET['error']== 1){
    ?>

<script type="text/javascript">
swal("OOPS!", "User Not Found", "error");
</script>
<?php
}else if($_GET['error']== 2){
    ?>
<script type="text/javascript">
swal("OOPS!", "Password is Wrong", "error");
</script>
<?php
}

}
?>

</body>
</html>