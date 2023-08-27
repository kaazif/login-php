<!DOCTYPE html>
<html lang="en">
<head>
  <title>Faginnapss - View</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<br><br>
<!-- bootsrap 4 table form -->
<div class="container">
  <h2>View user</h2>

  <?php
  //  selecting which user should be deleted
   $conn = mysqli_connect('localhost','root','','faginnapss');
   if(isset($_GET['del'])){
    $del_id = $_GET['del'];
    $delete = "DELETE FROM user WHERE user_id='$del_id'"; 
    $run_delete = mysqli_query($conn,$delete);
    if($run_delete === true){
        echo "Record Has been Delected";
    }else{
        echo "Failed, Try Again";
    }
   }
  ?>

    <table class="table table-bordered">
    <thead>
      <tr>
        <!--tables -->
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Phone</th>
        <th>Image</th>
        <th>Details</th>
        <th>Delete</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>



    <?php
    //database connection
    $conn = mysqli_connect('localhost','root','','faginnapss');
    $select = "SELECT * FROM user"; 
    $run = mysqli_query($conn, $select);
    //while lopp for to repeat a section of code of the user table
    while($row_user = mysqli_fetch_array($run)){
    $user_id = $row_user['user_id'];
    $user_name= $row_user['user_name'];
    $user_email = $row_user['user_email'];
    $user_password = $row_user['user_password'];
    $user_number = $row_user['user_number'];
    $user_image = $row_user['user_image'];
    $user_details = $row_user['user_details'];
    ?>
      <tr>
        <!-- to view the details from user in database to appear in the table -->
        <td><?php echo $user_id;?></td>
        <td><?php echo $user_name;?></td>
        <td><?php echo $user_email;?></td>
        <td><?php echo $user_password;?></td>
        <td><?php echo $user_number;?></td>
        <td><img src="upload/<?php echo $user_image;?>" height="70px"></td> <!-- image and it height -->
        <td><?php echo $user_details;?></td>
<!-- button for delete and edit -->
        <td><a class="btn btn-danger" href="view_user.php?del=<?php echo $user_id;?>">Delete</a></td> <!-- selecting for which user id for delete -->

        <td><a class="btn btn-success" href="edit_user.php?edit=<?php echo $user_id;?>">Edit</a></td><!-- selecting for which user id for edit -->
      </tr>
      <?php }
      ?>
      
    </tbody>
  </table>
</div>

</body>
</html>
