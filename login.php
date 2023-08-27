<?php session_start();?> <!-- TO REDIRECT TO THE LOGIN FORM OF THE APPLICATION  -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome to Faginnapps</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<body>
    <!-- LOGIN FORM FROM BOOTSTRAP -->
    <div id="login">
        <h3 class="text-center text-white pt-5">Welcome to Faginnapps!</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="email" id="username"  placeholder="Enter Email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="text" name="password" id="password" class="form-control" placeholder="Enter Password">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="login-btn" class="btn btn-info btn-md" value="Login">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="add_user.php" class="text-info">Register here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- CSS PART FOR THE LOGIN FORM -->
    <style>
        body {
  margin: 0;
  padding: 0;
  background-color: #17a2b8;
  height: 100vh;
}
#login .container #login-row #login-column #login-box {
  margin-top: 120px;
  max-width: 600px;
  height: 320px;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
    </style>

<?php
//DB CONNECTION
$conn = mysqli_connect('localhost','root','','faginnapss');

// PICKING THE VALUES FOR DATABASE
if(isset($_POST['login-btn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    //IDENTIFYING THE PICKED VALUES FROM DATABASE
    $select = "SELECT * FROM user WHERE user_email='$email' ";
    $run = mysqli_query($conn, $select);
    $row_user = mysqli_fetch_array($run);
    $db_email = $row_user['user_email'];
    $db_password = $row_user['user_password'];
    if($email == $db_email && $password == $db_password){
        echo "<script>window.open('index.php','_self');</script>";  //REDIRECT 
        $_SESSION['email'] =$db_email; // LOGIN CREDENTAILS VAILD 
    }else{
        echo "Incorrect Login Credentails";
    }

}
?>
</body>
</html>