<!DOCTYPE html>
<html lang="en">
<head>
  <title>New User for Faginnapss</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  
</head>
<body>
<br><br>
<!-- Boostrap 4 login form -->
<div class="container">
  <h2>Add New User</h2>
  <form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label >Name:</label>
      <input type="text" class="form-control"  placeholder="Enter Your Name" name="user_name" required="required">
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control"  placeholder="Enter email" name="user_email" required="required">
    </div>

    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control"  placeholder="Enter password" name="user_password" minlength="8" maxlength="255" required="required">
    </div>

    <div class="form-group">
      <label >Phone:</label>
      <input type="number" class="form-control"  placeholder="Enter number" name="user_number" required="required">
    </div>

    <div class="form-group">
      <label >Image:</label>
      <input type="file" class="form-control"  placeholder="Enter Your Name" name="user_image" >
    </div>

    <div class="form-group">
      <label >Details:</label>
      <textarea class="form-control" name="user_details" required="required"></textarea>
    </div>

    <input type="submit" name="insert-btn" class="btn btn-primary">
    <a class="btn btn-primary" href="login.php">Login
</a>

  </form>
  
  

  <?php
  //mysql connection to connect the database 
  $conn = mysqli_connect('localhost','root','','faginnapss');

  //from the below comment we can be able to see the mysql connectivity

//   if(mysqli_connect_errno()){
//     echo "connection fail";
//   }else{
//     echo "Connection OK";
//   }

// here we are useing get or post method
if(isset($_POST['insert-btn'])){

  $user_name =  $_POST['user_name'];
 $user_email =  $_POST['user_email'];
 $user_password =  $_POST['user_password'];
 $user_number =  $_POST['user_number'];
  $image =  $_FILES['user_image']['name'];
  $tmp_name =  $_FILES['user_image']['tmp_name'];

 $user_details =  $_POST['user_details'];
 
// databse variables
 $insert = "INSERT INTO user(user_name,user_email,user_password,user_number,user_image,user_details) 
 VALUES('$user_name','$user_email','$user_password','$user_number','$image','$user_details')";

//to run the variables
 $run_insert = mysqli_query($conn,$insert);
 if($run_insert === true){
    echo "Data has been Added";
    //to save the uploaded imgages
    move_uploaded_file($tmp_name, "upload/$image");
 }else{
    echo "failed, try Again";
 }

}

  ?>
</div>

</body>
</html>
