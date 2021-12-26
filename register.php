<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <h1 class="text-center">Register</h1>
        <div class="col-12 col-md-6 offset-md-3">
            <form action="./back.php" method="post" id="userform">
                <div class="mb-3 mt-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username">
                    <span class="text-danger" style="font-size:15px;"></span>
                </div>
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
                <div class="mb-3">
                    <label for="cpassword" class="form-label">Confirm Password:</label>
                    <input type="password" class="form-control" id="cpassword" placeholder="Enter Password" name="cpassword">
                    <span class="text-danger" style="font-size:15px;"></span>
                </div>
                <div class="text-center">
                    <input type="button" value="Register" class="btn btn-primary" id="register" name="register">
                </div>
            </form>
        </div>




    </div>









    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#register').click(function (e) {
                e.preventDefault();
                var username = $('#username');
                var email = $('#email');
                var password = $('#password');
                var cpassword = $('#cpassword');


                if(username.val().length == 0){
                    var err = '*Enter Username';
                    username.parent('div').find('span').text(err);
                }else if(email.val().length == 0){
                    var err = '*Enter Email';
                    email.parent('div').find('span').text(err);
                }else if(password.val().length == 0){
                    var err = '*Enter Password';
                    password.parent('div').find('span').text(err);
                }else if(cpassword.val().length == 0){
                    var err = '*Enter Confirm Password';
                    cpassword.parent('div').find('span').text(err);
                }else if(cpassword.val() != password.val()){
                    var err = '*Password does not match..!!';
                    cpassword.parent('div').find('span').text(err);
                }else{
                    username.parent('div').find('span').text("");
                    email.parent('div').find('span').text("");
                    password.parent('div').find('span').text("");
                    cpassword.parent('div').find('span').text("");
                    $('#userform').submit();
                }
                console.log(err);

            });
        });
    </script>
</body>

</html>