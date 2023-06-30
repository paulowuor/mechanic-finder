<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<title>Update famer</title>
</head>
<body>
<?php 
require('db.php');
 $id=$_POST['id'];
 $query="SELECT * FROM users WHERE id='$id' ";
 $query_run=mysqli_query($con,$query);
 if ($query_run) {
 while ($row=mysqli_fetch_array($query_run)) {
 	?>

<div class="container">
	<div class="jumbotron">
		<h2>Update data</h2>
		<hr>
    <input type="hidden" name="id" value="<?php echo ['id'] ?>">
		<form class="form" action="" method="post">
        <h1 class="login-title">Register Farmer Here</h1>
        <input type="text" class="form-control" name="username"   value=" <?php echo $row['username'] ?>">
        <br>
        <input type="text" class="login-input" name="email" value="<?php echo $row['email'] ?>" placeholder="Enter Email Adress">
        
        
        <input type="submit" name="update" value="update" class="btn btn-primary">
       
    <a href="farmerreport.php" class="btn btn-danger"> CANCEL</a>
        
    </form>
      <?php
      if(isset($_POST['update'])){
        $username=$_POST['username'];
        $email=$_POST['email'];
        $phonenumber=$_POST['phonenumber'];
        $nationalID=$_POST['nationalID'];
        $query="UPDATE users SET username='$username', email='$email' WHERE id='$id' ";
        $query_run=mysqli_query($con,$query);
        if ($query_run) {
echo '<script> alert("Data Updated"); </script>';
header("location:update_profile.php");
}
else{
echo '<script> alert("Data Not Updated"); </script>';
}
}
      ?>
	</div>
</div>

 	<?php
 }}
 else{
 	echo '<script> alert("No record found"); </script>';
 }
?>
</body>
</html>