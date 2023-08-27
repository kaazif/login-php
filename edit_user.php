<!DOCTYPE html>
<html lang="en">
<head>
  <title>Faginnapss - Edit user</title>
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
  <h2>Edit User</h2>
  <?php
   $conn = mysqli_connect('localhost','root','','faginnapss');

   //  selecting which user should be deleted
   if(isset($_GET['edit'])){
     $edit_id = $_GET['edit'];
     //selecting which id should be edited
     $select = "SELECT * FROM user WHERE user_id='$edit_id' ";
     $run = mysqli_query($conn, $select);
     $row_user = mysqli_fetch_array($run);
     $user_name= $row_user['user_name'];
     $user_email = $row_user['user_email'];
     $user_password = $row_user['user_password'];
     $user_number = $row_user['user_number'];
     $user_image = $row_user['user_image'];
     $user_details = $row_user['user_details'];
    
   }
  ?>
  <!-- Boostrap 4 login form -->
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label >Name:</label>
      <input type="text" class="form-control" value="<?php echo $user_name;?>"  placeholder="Enter Your Name" name="user_name"> <!-- php echo defines that which attributes -->
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" value="<?php echo $user_email;?>" placeholder="Enter email" name="user_email"> <!-- php echo defines that which attributes -->
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" value="<?php echo $user_password;?>" placeholder="Enter password" name="user_password"> <!-- php echo defines that which attributes -->
    </div>
    <div class="form-group">
      <label >Phone:</label>
      <input type="number" class="form-control" value="<?php echo $user_number;?>" placeholder="Enter number" name="user_number"><!-- php echo defines that which attributes -->
    </div>
    <div class="form-group">
      <label >Image:</label>
      <input type="file" class="form-control"  placeholder="Enter Your Name" name="user_image">
    </div>
    <div class="form-group">
      <label >Details:</label>
      <textarea class="form-control"  name="user_details" ><?php echo $user_details;?></textarea><!-- php echo defines that which attributes -->
    </div>
    <!-- button for submittion -->
    <input type="submit" name="insert-btn" class="btn btn-primary">
  </form>


  <?php
  $conn = mysqli_connect('localhost','root','','faginnapss');

//   if(mysqli_connect_errno()){
//     echo "connection fail";
//   }else{
//     echo "Connection OK";
//   }

if(isset($_POST['insert-btn'])){
// $e defines edit user
  $euser_name =  $_POST['user_name'];
  $euser_email =  $_POST['user_email'];
  $euser_password =  $_POST['user_password'];
  $euser_number =  $_POST['user_number'];
  $eimage =  $_FILES['user_image']['name'];
  $eimage_tmp =  $_FILES['user_image']['tmp_name'];
  $euser_details =  $_POST['user_details'];
  
//F THE IMAGE IS EMPTY $user_image = $row_user['user_image'];
 if(empty($eimage)){
    $eimage = $user_image;
 }
//  for updating the databse
 $update = "UPDATE user SET user_name='$euser_name',user_email='$euser_email', user_password='$euser_password',user_number='$euser_number',user_image='$eimage',user_details='$euser_details' WHERE user_id='$edit_id' ";
  //WHERE defines the  $select = "SELECT * FROM user WHERE user_id='$edit_id';

 $run_update = mysqli_query($conn,$update);
 if($run_update === true){
    echo "Data has been Updated";
    move_uploaded_file($eimage_tmp, "upload/$eimage");
 }else{
    echo "failed, try Again";
 }
}
  ?>
  <!-- btn for view the user -->
  <a class="btn btn-primary" href="view_user.php">View User
</a>
</div>

</body>
</html>
