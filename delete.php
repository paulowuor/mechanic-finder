<?php 

require('db.php');
if (isset($_POST['delete'])) {

$id=$_POST['id'];
$query="DELETE FROM users WHERE id='$id'";
$query_run=mysqli_query($con,$query);
if ($query_run) {
echo '<script> alert("Data Deleted"); </script>';
header("location:registration.php");
}
else{
echo '<script> alert("Data Not Deleted"); </script>';
}
}


 ?>
