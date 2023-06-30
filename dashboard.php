<?php
// include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mechanic Finder Application - Dashboard</title>
    <link rel="stylesheet" href="style.css" />
</head>
<style>
    /* style.css */

body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
}

.form {
  width: 300px;
  margin: 0 auto;
  background: #fff;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.dashboard-title {
  text-align: center;
  font-size: 24px;
  margin-bottom: 20px;
}

.dashboard-text {
  text-align: center;
}

.dashboard-link {
  text-align: center;
  margin-top: 20px;
}

.dashboard-link a {
  color: #1e88e5;
  text-decoration: none;
}

.dashboard-link a:hover {
  text-decoration: underline;
}

</style>
<body>
    <div class="form">
        <h1 class="dashboard-title">Mechanic Finder Application</h1>
        <hr>
        <p class="dashboard-text">Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p class="dashboard-text">Welcome to the user dashboard page.</p>
        
        <!-- User Features -->
        <h2 class="dashboard-subtitle">User Features:</h2>
        <ul class="dashboard-list">
            <li>Search for mechanics</li>
            <li>View mechanic profiles</li>
            <li>Read and provide reviews and ratings</li>
            <li>Book appointments with mechanics</li>
            <li>Manage saved mechanics list</li>
            <li><a href="update_profile.php">Update profile information</a></li>
            <li>Change password</li>
      
        </ul>
        
        <p class="dashboard-link"><a href="login.php">Logout</a></p>
    </div>
</body>
</html>
