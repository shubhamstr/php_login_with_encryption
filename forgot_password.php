<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container">
        <h1 class="text-center">Forgot Password</h1>
        <p class="text-center">Enter your email if email exists in our system you will receive an email..!!</p>
        <div class="col-12 col-md-6 offset-md-3">
            <form action="./back.php" method="post" id="userform">
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
                    <span class="text-danger" style="font-size:15px;"></span>
                </div>
                <div class="text-center">
                    <input type="hidden" name="forgot_pass">
                    <p>Go Back <a href="login.php">Login Page</a> </p>
                    <input type="button" value="Get Reset Link" class="btn btn-primary" id="reset">
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
                var email = $('#email');


                if(email.val().length == 0){
                    var err = '*Enter Email';
                    email.parent('div').find('span').text(err);
                }else{
                    email.parent('div').find('span').text("");
                    $('#userform').submit();
                }
                console.log(err);

            });
        });
    </script>




<?php 
if(isset($_GET['success'])){
if($_GET['success']== 1){
    ?>

<script type="text/javascript">
swal("DONE!", "Requested Reset Link Successfully", "success");
</script>
<?php
}

}
?>

</body>
</html>