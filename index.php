<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System With PHP</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container">
        <h1 class="text-center">Login System</h1>
        <p class="text-center">using hashing of passwords, sessions and tokens</p>
        <div class="text-center">
            <button type="button" class="btn btn-primary" onclick="register();">Register</button>
            <button type="button" class="btn btn-primary" onclick="login();">Login</button>
        </div>
    </div>









<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function register(params) {
        window.open('register.php','_self');
    }
    function login(params) {
        window.open('login.php','_self');
    }
</script>
</body>
</html>