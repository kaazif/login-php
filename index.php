<?php
session_start();
$conn = mysqli_connect('localhost','root','','faginnapss');
if(!isset($_SESSION['email'])){
  echo "<script>window.open('login.php','_self')</script>";
}

?>
<!-- THIS PAGE IS AFTER LOGING USING THE LOGIN CREDENTAILS THE USER CAN BE ABLE TO VIEW MAIN CONTENT -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  
</head>
<body>
<br><br>
<div class="container">
  <h2>Home</h2>
  <h1>Welcome to Faginnapss</h1>
  
  <a class="btn btn-danger" href="logout.php">Logout</a>

</div>

</body>
</html>
