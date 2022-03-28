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
  	  <label>Full Name</label>
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
  	  <label>Admission number</label>
  	  <input type="text" name="admissionnumber" value="<?php echo $admissionnumber; ?>">
  	</div>
	  <div class="input-group">
  	  <label>Company</label>
  	  <input type="text" name="companyname" value="">
  	</div>
	  <div class="input-group">
  	  <label>Company Address</label>
  	  <input type="text" name="companyaddress" value="">
  	</div>
	  <div class="input-group">
  	  <label>Company Email</label>
  	  <input type="text" name="companyemail" value="">
  	</div>
	  <div class="input-group">
  	  <label>Company Contact</label>
  	  <input type="text" name="companycontact" value="">
  	</div>
	  <div class="input-group">
  	  <label>Company Website</label>
  	  <input type="text" name="companywebsite" value="">
  	</div>
	  <div class="input-group">
  	  <label>Starting Date</label>
  	  <input type="text" name="startingdate" value="">
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