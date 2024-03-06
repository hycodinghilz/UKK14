<!DOCTYPE html>
<html>

<head>
	<title>Animated Login Form</title>
	<link rel="stylesheet" href="style.css">
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<!-- <script src="https://kit.fontawesome.com/a81368914c.js"></script> -->
	<script src="style.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/bg.svg">
		</div>
		<div class="login-content">
			<form action="m_login.php" method="post">
				<img src="img/avatar.svg">
				<h2 class="title">Hilz Mart</h2>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="div">
						<h5></h5>
						<input type="text" name="username_login" class="input">
					</div>
				</div>
				<div class="input-div pass">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div class="div">
						<h5></h5>
						<input type="password" name="password_login" class="input">
					</div>
				</div>
				<input type="submit" class="btn" value="Login">
			</form>
		</div>
	</div>
	<script type="text/javascript" src="js/main.js"></script>
</body>

</html>