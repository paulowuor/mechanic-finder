<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1>Mechanic Finder Application</h1>
    <hr class="hr-line">
    
    <?php
    require('db.php');

    // When form submitted, insert values into the database.
    if (isset($_POST['submit'])) {
        // Sanitize and escape form inputs
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
        $photo = mysqli_real_escape_string($con, $_POST['photo']);

        // Handle file upload
        $cv = $_FILES['cv'];
        $cvName = mysqli_real_escape_string($con, $cv['name']);
        $cvTmpName = $cv['tmp_name'];
        $cvType = $cv['type'];

        // Check if the uploaded file is a PDF
        if ($cvType === 'application/pdf') {
            // Move the uploaded file to a permanent location
            $cvDestination = 'uploads/' . $cvName;
            move_uploaded_file($cvTmpName, $cvDestination);

            // Insert values into the database
            $query = "INSERT INTO `mechanics` (username, email, phonenumber, cv, photo)
                      VALUES ('$username', '$email', '$phonenumber', '$cvDestination', '$photo')";

            $result = mysqli_query($con, $query);

            if ($result) {
                echo "<div class='form'>
                      <h3>You are registered successfully.</h3><br/>
                      <p class='link'>Click here to <a href='mechanic.php'>add</a></p>
                      </div>";
            } else {
                echo "<div class='form'>
                      <h3>Failed to register. Please try again.</h3><br/>
                      <p class='link'>Click here to <a href='mechanic.php'>add</a> again.</p>
                      </div>";
            }
        } else {
            echo "<div class='form'>
                  <h3>Invalid file format. Please upload a PDF file.</h3><br/>
                  <p class='link'>Click here to <a href='mechanic.php'>add</a> again.</p>
                  </div>";
        }
    }
?>

<form class="form" action="" method="post" enctype="multipart/form-data">
    <h3 class="login-title">Add Mechanics</h3>
    <input type="text" class="login-input" name="username" placeholder="Username" required />
    <input type="text" class="login-input" name="email" placeholder="Email Address" required>
    <input type="text" class="login-input" name="phonenumber" placeholder="Phone Number" required>
    <input type="file" class="login-input" name="cv" accept=".pdf" required>
    <input type="text" class="login-input" name="photo" placeholder="Upload photo" required>
    <input type="submit" name="submit" value="Add" class="login-button">
</form>

    <footer class="footer">
        <h6 style="text-align: center;">The expectations of life depend upon diligence; the mechanic that would perfect his work must first sharpen his tools.<br>
            A lawyer without history or literature is a mechanic, a mere working mason; if he possesses some knowledge of these, he may venture to call himself an architect.
        </h6>
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
