<?php
session_start();

// initializing variables
$role_id = "";
$email    = "";
// $name    = "";
// $faculty    = "";
// $department    = "";
// $mobile    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'supervisedb');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $faculty = mysqli_real_escape_string($db, $_POST['faculty']);
  $department = mysqli_real_escape_string($db, $_POST['department']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
  $role_id = mysqli_real_escape_string($db, $_POST['role_id']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($faculty)) { array_push($errors, "Faculty is required"); }
  if (empty($department)) { array_push($errors, "Department is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($mobile)) { array_push($errors, "Mobile is required"); }
  if (empty($role_id)) { array_push($errors, "Roll is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM lecturers WHERE role_id='$role_id' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['role_id'] === $role_id) {
      array_push($errors, "Roll for user already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO lecturers(name, faculty, department, email, mobile, role_id, password, created_at) 
  			  VALUES('$name', '$faculty', '$department', '$email', '$mobile', '$role_id', '$password', now())";
  	mysqli_query($db, $query);
  	$_SESSION['role_id'] = $role_id;
    // $_SESSION['name'] = $results;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    $role_id = mysqli_real_escape_string($db, $_POST['role_id']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
  // print_r($password);
  // exit();
    if (empty($role_id)) {
        array_push($errors, "Roll is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM lecturers WHERE role_id='$role_id' AND password='$password'";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) {
//  = mysqli_fetch_assoc($results);
         $row = mysqli_fetch_assoc($results);
            $reg_user_id = $row['lec_id'];
            $name = $row['name'];
			// put logged in user into session array
			// $_SESSION['user'] = $reg_user_id['id'];

			// $_SESSION['message'] = "You are now logged in";
		  // $_SESSION['loggedin'] = true;
			   $_SESSION['lec_id'] = $reg_user_id;
         $_SESSION['role_id'] = $role_id;
        //  $_SESSION['name'] = $name;
          // $_SESSION['name'] = $results->name;
          $_SESSION['success'] = "You are now logged in";
          header('location: index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }
  
  ?>