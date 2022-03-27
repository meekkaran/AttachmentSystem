<?php include('includes/server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
  <link rel="stylesheet" type="text/css" href="templates/style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('includes/errors.php'); ?>
  	<div class="input-group">
  	  <label>Name</label>
  	  <input type="text" name="name" value="">
  	</div>
	  <div class="input-group">
  	  <label>Faculty</label>
  	  <input type="text" name="faculty" value="">
  	</div>
	  <div class="input-group">
  	  <label>Department</label>
  	  <input type="text" name="department" value="">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
	  <div class="input-group">
  	  <label>Mobile</label>
  	  <input type="text" name="mobile" value="">
  	</div>
	  <div class="input-group">
  	  <label>Roll Id</label>
  	  <input type="text" name="role_id" value="<?php echo $role_id; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>