<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['username']?></title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container">
        <h1 class="text-center">Welcome <?php echo $_SESSION['username']?></h1>
        <div class="text-center">
            <button type="button" class="btn btn-primary" onclick="logout();">Logout</button>
        </div>
    </div>









<!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    function logout(params) {
        window.open('logout.php','_self');
    }
</script>

<?php 
if(isset($_GET['success'])){
if($_GET['success']== 1){
    ?>

<script type="text/javascript">
swal("DONE!", "Welcome  <?php echo $_SESSION['username']?>", "success");
</script>
<?php
}

}
?>
</body>
</html>