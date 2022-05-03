<?php include('db.php');

$id = $_GET['fullname'];
$id = $_GET['faculty'];
$id = $_GET['department'];
$id = $_GET['email'];
$id = $_GET['mobile'];
$id = $_GET['role_id'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="./templates/style.css">
</head>

<body>
    <div class="header">
        <h2>Update lecturer</h2>
    </div>

    <form method="post" action="register.php">
        <div class="input-group">
            <label>Full Name</label>
            <input type="text" name="lecname" value="">
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
            <input type="email" name="email" value="">
        </div>
        <div class="input-group">
            <label>Mobile</label>
            <input type="text" name="mobile" value="">
        </div>
        <div class="input-group">
            <label>Roll Id</label>
            <input type="text" name="role_id" value="">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="reg_user">Update Lecturer Details</button>
        </div>
    </form>
</body>

</html>