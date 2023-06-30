<?php
require('db.php');
$sql = "SELECT * FROM users";
  $query_run = mysqli_query($con, $sql);

?>

<!-- display the search form and the table of users -->

<table border="1" class="table table-bordered" style="background-color: white;">
  <thead class="table-dark">
    <tr>
      <th>username</th>
      <th>email</th>
      <th>password</th>
     
      
      <th>Edit information</th>
      <th>Delete Account</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if (mysqli_num_rows($query_run) > 0) {
      while ($row = mysqli_fetch_array($query_run)) {
    ?>
        <tr>
          <td><?php echo $row['username']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['password']; ?></td>
        
        
          <td>
            <form action="update.php" method="POST">
              <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
              <input type="submit" name="update" class="btn btn-success" value="EDIT">
            </form>
          </td>
          <td>
            <form action="delete.php" method="POST">
              <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
              <input type="submit" name="delete" class="btn btn-danger" value="DELETE">
            </form>
          </td>
        </tr>
    <?php
      }
    }
    else {
      // display a message if no records found
      echo "<tr><td colspan='7'>No record found</td></tr>";
    }
    ?>
  </tbody>
</table>

