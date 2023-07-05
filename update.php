<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <title>Update Farmer</title>
</head>
<body>
  <?php 
  require('db.php');

  if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $username = $_POST['name'];
    $email = $_POST['email'];
    $query = "UPDATE users SET name='$name', email='$email' WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
      echo '<script> alert("Data Updated"); </script>';
      header("location:update_profile.php");
      exit;
    } else {
      echo '<script> alert("Data Not Updated"); </script>';
    }
  }

  $id = $_POST['id'];
  $query = "SELECT * FROM users WHERE id='$id' ";
  $query_run = mysqli_query($con, $query);
  if ($query_run && mysqli_num_rows($query_run) > 0) {
    $row = mysqli_fetch_assoc($query_run);
  ?>
  <div class="container">
    <div class="jumbotron">
      <h2>Update data</h2>
      <hr>
      <form class="form" action="" method="post">
        <h1 class="login-title">Edit Your Details</h1>
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        <div class="form-group">
          <label for="name">Username:</label>
          <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>">
        </div>
        <div class="form-group">
          <label for="email">Email Address:</label>
          <input type="text" class="form-control" name="email" value="<?php echo $row['email'] ?>">
        </div>
        <input type="submit" name="update" value="Update" class="btn btn-primary">
        <a href="farmerreport.php" class="btn btn-danger">Cancel</a>
      </form>
    </div>
  </div>

  <?php
  } else {
    echo '<script> alert("No record found"); </script>';
  }
  ?>

</body>
</html>
