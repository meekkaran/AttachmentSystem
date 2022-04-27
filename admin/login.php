<?php include('includes/server.php') ?>
<!DOCTYPE html>
<html>

<head>
	<title>Admin registration</title>
	<link rel="stylesheet" type="text/css" href="templates/style.css">
	<link rel="stylesheet" href="./templates/admin1.css" />
</head>

<body>
	<div id="top-navigation">
		<div id="logo"> CIAMS</div>
		<div id="student_name"><span style="color:rgb(255, 198, 0);font-size:1.1em"><em>Welcome,</em>&nbsp; </span><span style="font-family:serif"><?php echo "Admin" ?></span></div>
	</div>
	<div class="loginform">
		<div class="header">
			<h2>Login</h2>
		</div>

		<form method="post" action="login.php">
			<?php include('includes/errors.php'); ?>
			<div class="input-group">
				<label>Username</label>
				<input type="text" name="username">
			</div>
			<div class="input-group">
				<label>Password</label>
				<input type="password" name="password">
			</div>
			<div class="input-group">
				<button type="submit" class="btn" name="login_user">Login</button>
			</div>
			<p>
				<!-- Not yet a member? <a href="register.php">Sign up</a> -->
				Go to home page <a href="../index.php">Home</a>
			</p>
		</form>
	</div>
</body>

</html>