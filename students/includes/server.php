<?php
session_start();

// initializing variables
$admissionnumber = "";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'supervisedb');

// REGISTER STUDENT
if (isset($_POST['reg_user'])) {

  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $faculty = mysqli_real_escape_string($db, $_POST['faculty']);
  $department = mysqli_real_escape_string($db, $_POST['department']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
  $admissionnumber = mysqli_real_escape_string($db, $_POST['admissionnumber']);
  $companyname = mysqli_real_escape_string($db, $_POST['companyname']);
  $companyaddress = mysqli_real_escape_string($db, $_POST['companyaddress']);
  $companyemail = mysqli_real_escape_string($db, $_POST['companyemail']);
  $companycontact = mysqli_real_escape_string($db, $_POST['companycontact']);
  $companywebsite = mysqli_real_escape_string($db, $_POST['companywebsite']);
  $startingdate = mysqli_real_escape_string($db, $_POST['startingdate']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) {
    array_push($errors, "Name is required");
  }
  if (empty($faculty)) {
    array_push($errors, "Faculty is required");
  }
  if (empty($department)) {
    array_push($errors, "Department is required");
  }
  if (empty($email)) {
    array_push($errors, "Email is required");
  }
  if (empty($mobile)) {
    array_push($errors, "Mobile is required");
  }
  if (empty($admissionnumber)) {
    array_push($errors, "Roll is required");
  }
  if (empty($companyname)) {
    array_push($errors, "Company name is required");
  }
  if (empty($companyaddress)) {
    array_push($errors, "companyaddress is required");
  }
  if (empty($companyemail)) {
    array_push($errors, "companyemail is required");
  }
  if (empty($companycontact)) {
    array_push($errors, "companycontact is required");
  }
  if (empty($companywebsite)) {
    array_push($errors, "companywebsite is required");
  }
  if (empty($startingdate)) {
    array_push($errors, "startingdate is required");
  }
  if (empty($password_1)) {
    array_push($errors, "Password is required");
  }
  if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM students WHERE admission_number='$admissionnumber' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['admission_number'] === $admissionnumber) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1); //encrypt the password before saving in the database
    $query = "INSERT INTO students(name, faculty, department, email, mobile, admission_number, companyname,
    companyaddress, companyemail, companycontact, companywebsite, startingdate, password, created_at) 
  			  VALUES('$name', '$faculty', '$department', '$email', '$mobile', '$admissionnumber',
          '$companyname', '$companyaddress', '$companyemail', '$companycontact', '$companywebsite', '$startingdate', '$password', now())";
    mysqli_query($db, $query);
    $_SESSION['admissionumber'] = $admissionnumber;
    $_SESSION['success'] = "You are now logged in";
    header('location: login.php');
  }
}

// LOGIN STUDENT

if (isset($_POST['login_user'])) {
  // TO PREVENT FROM MYSQLI INJECTION
  $admissionnumber = stripcslashes($admissionnumber);
  $password = stripcslashes($password);

  $admissionnumber = mysqli_real_escape_string($db, $_POST['admissionnumber']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($admissionnumber)) {
    array_push($errors, "admissionnumber is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM students WHERE admission_number='$admissionnumber' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {

      $row = mysqli_fetch_assoc($results);
      $reg_user_id = $row['id'];
      $name = $row['name'];
      $_SESSION['loggedin'] = true;
      $_SESSION['student_id'] = $reg_user_id;
      $_SESSION['name'] = $name;
      $_SESSION['admissionnumber'] = $admissionnumber;
      $_SESSION['success'] = "You are now logged in";
      header('location: logbook.php');
    } else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}
