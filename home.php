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
			margin-top: 50%;
			color: orange;
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
		}

		.search-box {
			display: flex;
			align-items: center;
			background-color: #f2f2f2;
			padding: 5px 40px;
			border-radius: 40px;
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
			width: 200px;
			border-radius: 4px;
		}

		.styled-select:focus {
			outline: none;
			border-color: #0066ff;
		}
	</style>
</head>

<body>
	<h1>Mechanic Finder Application</h1>
	<div class="main-container">
		<div class="search-box">
			<select id="pageSelect" class="styled-select">
				<option value="">Select an option</option>
				<option value="login.php">User</option>
				<option value="admin_register.php">Admin</option>
			</select>
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
