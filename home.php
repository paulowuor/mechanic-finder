<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
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
      font-family: Arial, sans-serif;
    }

    .container {
      display: flex;
      flex-direction: row;
      justify-content: space-between;
      align-items: stretch;
    }

    .sidebar {
      width: 10%;
      background-color: green;
      color: #fff;
      margin-top: 0%;
      padding: 20px;
      opacity: 0.9;

    }

    .main-content {
      width: 80%;
      background-color: #f2f2f2;
      padding: 20px;
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
      background-color: green;
      padding: 20px;
      margin-top: 50%;
      color: orange;
      opacity: 0.9;
    }

    .footer #date {
      font-style: italic;
      margin-bottom: 90%;
    }

    h1 {
      color: white;
      font-weight: bold;
      text-align: center;
      margin-top: 50px;
      font-size: 36px;
      height: 30%;
      opacity: 0.9;
    }

    .search-box {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 10px;
    }

    .styled-select {
      appearance: none;
      -webkit-appearance: none;
      -moz-appearance: none;
      background-color: #f2f2f2;
      border: 1px solid #ccc;
      padding: 8px;
      font-size: 16px;
      width: 100%;
      border-radius: 4px;
      margin-bottom: 10px;
    }

    .styled-select:focus {
      outline: none;
      border-color: #0066ff;
    }
  </style>
</head>

<body>
  <h1>Mechanic Finder Application</h1>
  <div class="container">
    <div class="sidebar">
      <!-- Sidebar content goes here -->
      <h3>Home Dashboard</h3>
      <div class="dashboard-contents">
        <div class="search-box">
          
        </div>
        <ul>
          <li><a href="login.php">user Login</a></li>
      <li><a href="admin_login.php">Admin Login</a></li>
        </ul>
      </div>
    </div>
   

  <footer class="footer">
    <h6>The expectations of life depend upon diligence; the mechanic that would perfect his work must first sharpen his tools.<br>
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

    document.getElementById("pageSelect").addEventListener("change", function() {
      var selectedOption = this.value;
      if (selectedOption !== "") {
        window.location.href = selectedOption;
      }
    });
  </script>
</body>
</html>
