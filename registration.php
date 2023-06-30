

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
   
    </style>
</head>

<body>
    <h1 >Mechanic Finder Application</h1>
    <hr class="hr-line">
    
    <?php
    require('db.php');
    // When form submitted, insert values into the database.

    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        // Check if user already exists in the database
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "<div class='form'>
              <h3>User already registered.</h3><br/>
              <p class='link'>Click here to <a href='registration.php'>try again</a></p>
              </div>";
    } else {
        $query    = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }}
    } else {
?>
    <form class="form" action="" method="post">
        <h3 class="login-title">Register Here</h3>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress" required>
        <input type="password" class="login-input" name="password" placeholder="Password" required>
        <input type="submit" name="submit" value="Register" class="login-button">
        
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
<?php
    }
?>
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
