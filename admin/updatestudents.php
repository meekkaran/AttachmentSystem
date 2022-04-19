<?php include('includes/db.php');

$admissionnumber = $_GET['update'];
$query = "SELECT * from students WHERE admissionnumber='" . $admissionnumber . "'";
$query_select_all = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($query_select_all)) {
    $name = $row['name'];
    $email = $row['email'];
    $mobile = $row['mobile'];
    $admissionnumber = $row['admission_number'];
    $companyname = $row['companyname'];
    $companyaddress = $row['companyaddress'];
    $companyemail = $row['companyemail'];
    $companycontact = $row['companycontact'];
    $companywebsite = $row['companywebsite'];
    $startingdate = $row['startingdate'];
    $created_at = $row['created_at'];
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="templates/style.css">
</head>

<body>
    <div class="header">
        <h2>Update Student Details</h2>
    </div>

    <form method="post" action="registeredstudents.php">
        <div class="input-group">
            <label>Full Name</label>
            <input type="text" name="name" value="<?php echo $name ?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $email ?>">
        </div>
        <div class="input-group">
            <label>Mobile</label>
            <input type="text" name="mobile" value="<?php echo $mobile ?>">
        </div>
        <div class="input-group">
            <label>Admission number</label>
            <input type="text" name="admissionnumber" value="<?php echo $admissionnumber ?>">
        </div>
        <div class="input-group">
            <label>Company Name</label>
            <input type="text" name="companyname" value="<?php echo $companyname ?>">
        </div>
        <div class="input-group">
            <label>Company Address</label>
            <input type="text" name="companyaddress" value="<?php echo $companyaddress ?>">
        </div>
        <div class="input-group">
            <label>Company Email</label>
            <input type="text" name="companyemail" value="<?php echo $companyemail ?>">
        </div>
        <div class="input-group">
            <label>Company Contact</label>
            <input type="text" name="companycontact" value="<?php echo $companycontact ?>">
        </div>
        <div class="input-group">
            <label>Company Website</label>
            <input type="link" name="companywebsite" value="<?php echo $companywebsite ?>">
        </div>
        <div class="input-group">
            <label>Starting Date</label>
            <input type="date" name="startingdate" value="<?php echo $created_at ?>">
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
            <button type="submit" class="btn" name="update">Update</button>
        </div>
    </form>
</body>

</html>