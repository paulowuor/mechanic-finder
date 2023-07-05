

 
 <?php
    require('db.php');
 
     include("auth_session1.php");
    ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="#">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    
  /* Default styles */

  /* Media query for screens smaller than 768px */
  @media (max-width: 767px) {
    /* Styles for smaller screens */
  }

  /* Media query for screens larger than 768px */
  @media (min-width: 768px) {
    /* Styles for larger screens */
  }


    body {
      background-image: url(images/home.jpg);
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
      height: 100vh;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .main-container {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .header {
      text-align: center;
      margin-top: 20px;
    }

    .header h3 {
      color: #fff;
    }

    .logo {
      margin-top: 10px;
    }

    .navbar {
      margin-bottom: 20px;
    }

    .navbar-nav .nav-link {
      color: #fff;
    }

    .footer {
      text-align: center;
      background-color: rgba(255, 255, 255, 0.7);
      padding: 20px;
      margin-top: 30%;
      color: orange;
    }

    .footer #date {
      font-style: italic;
      margin-bottom: 90%;
    }
    h1{
  
      text-align: center;
      color: gold;
      font-weight: bold;

    }
     .search-box {
        display: flex;
        align-items: center;
        background-color: #f2f2f2;
        padding: 5px 40px;
        border-radius: 40px;
        margin-left: 40%;
    }
    .search-box{
        margin-bottom: 10px;
    }
    .profile{
      margin-left: 90%;
      background-color: green;
    }
    .table-search{
      margin-left: 30%;
      margin-right: 30%;
    }
  </style>
</head>

<body>
  <h1 >Mechanic Finder Application</h1>
   <div class="form">
        <div class="profile">
        <p class="dashboard-text">Hey, <?php echo $_SESSION['name']; ?>!</p>
        <p class="dashboard-link"><a href="login.php">Logout</a></p>
       </div>
       
        <!-- User Features -->
        <h2 class="dashboard-subtitle" style="color:gold;">User Dashboard</h2>
        <ul class="dashboard-list">
            
            <li><a href="update_profile.php">Update profile information</a></li>
                  
        </ul>
      
        
    </div>
<?php
// check if the form is submitted
if (isset($_GET['search'])) {
  // sanitize the search query to prevent SQL injection
  $search_query = mysqli_real_escape_string($con, $_GET['search']);

  // construct the SQL query to search for users
  $sql = "SELECT * FROM mechanics WHERE username LIKE '%{$search_query}%' OR email LIKE '%{$search_query}%' OR phonenumber LIKE '%{$search_query}%' OR cv LIKE '%{$search_query}%'";

  // execute the query
  $query_run = mysqli_query($con, $sql);
} else {
  // display all users if the search form is not submitted
  $sql = "SELECT * FROM mechanics";
  $query_run = mysqli_query($con, $sql);
}
?>

<!-- display the search form and the table of users -->
<form action="" method="GET">
  <input type="text" class="search-box" name="search" placeholder="Search">
</form>

<table border="1" class="table-search" style="background-color: white;">
  <thead>
    <tr>
      <th>username</th>
      <th>email</th>
      <th>phonenumber</th>
      <th>cv</th>
      <th>Book Appointment</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if ($query_run) {
      if (mysqli_num_rows($query_run) > 0) {
        while ($row = mysqli_fetch_array($query_run)) {
          ?>
          <tr>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phonenumber']; ?></td>
           <td>
  <?php
  $cvData = $row['cv']; // Retrieve the CV data from the current row
  $cvName = basename($cvData); // Extract the filename from the file path

  echo '<a href="'.$cvData.'" target="_blank">'.$cvName.'</a>'; // Display the CV as a clickable link
  ?>
</td>

            <td>
              <form action="#" method="POST">
                <input type="hidden" name="nationalID" value="<?php echo $row['nationalID'] ?>">
                <input type="submit" name="update" class="btn btn-success" value="Book">
              </form>
            </td>
          </tr>
    <?php
        }
      } else {
        // display a message if no records found
        echo "<tr><td colspan='5'>No record found</td></tr>";
      }
    } else {
      echo "Error in executing the query: " . mysqli_error($con);
    }
    ?>
  </tbody>
</table>


  <footer class="footer">
    <h6 style="text-align: center;">The expectations of life depend upon diligence; the mechanic that would perfect his work must first sharpen his tools.<br>
A lawyer without history or literature is a mechanic, a mere working mason; if he possesses some knowledge of these, he may venture to call himself an architect.</h6>
    &copy;<em id="date"></em>Paul Owuor De Developer
  </footer>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      var date = new Date().getFullYear();
      $("#date").text(date);
    });
  </script>
</body>
</html>
