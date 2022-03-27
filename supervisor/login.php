<?php include('includes/server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="templates/style.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('includes/errors.php'); ?>
  	<div class="input-group">
  		<label>Roll Id</label>
  		<input type="text" name="role_id" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div><hr>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
		<!-- Go to home page <a href="/index.php">Sign up</a> -->
  	</p>
	  <p>
  		<!-- Not yet a member? <a href="register.php">Sign up</a> -->
		Go to home page <a href="../index.php">Home</a>
  	</p>
  </form>
</body>
</html>
