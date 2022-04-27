<?php include "./includes/db.php"; ?>
<!DOCTYPE html>
<html lang="en" class="bg-pink">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CIAMS</title>
    <link rel="stylesheet" href="./templates/admin1.css" />
</head>

<body>
    <div id="top-navigation">
        <div id="logo"> CIAMS</div>
        <div id="student_name"><span style="color:rgb(255, 198, 0);font-size:1.1em"><em>Welcome,</em>&nbsp; </span><span style="font-family:serif"><?php echo "Admin" ?></span></div>
    </div>

    <div class="admincontent">
    <div class="sidebar">
            <ul id="menu_list">
                <a class="menu_items_link" href="registeredstudents.php">
                    <li class="menu_items_list" style="background-color:orange;padding-left:16px">Registered Students</li>
                </a>
                <a class="menu_items_link" href="submitreports.php">
                    <li class="menu_items_list">Student Reports</li>
                </a>
                <a class="menu_items_link" href="attachmentlogbooks.php">
                    <li class="menu_items_list">Attachment Logbooks</li>
                </a>
                <a class="menu_items_link" href="registeredsupervisors.php">
                    <li class="menu_items_list">Registered Supervisors</li>
                </a>
                <a class="menu_items_link" href="assignedlecturers.php">
                    <li class="menu_items_list">Assign Supervisors</li>
                </a>
                <a class="menu_items_link" href="remarks.php">
                    <li class="menu_items_list">Supervisors Remarks</li>
                </a>
                <a class="menu_items_link" href="registeredtrainers.php">
                    <li class="menu_items_list">Registered Trainers</li>
                </a>
                <a class="menu_items_link" href="studentstrainers.php">
                    <li class="menu_items_list">Students' Trainers</li>
                </a>
                <a class="menu_items_link" href="changepassword.php">
                    <li class="menu_items_list">Change Password</li>
                </a>
                <a class="menu_items_link" href="../../index.php">
                    <li class="menu_items_list">Logout</li>
                </a>
            </ul>
        </div>
        <div class="main">
            <h2>Fixed sidebar menu html css</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Reg. Number</th>
                        <th>Comp. Name</th>
                        <th>Comp. Address</th>
                        <th>Comp. Email</th>
                        <th>Comp. Contact</th>
                        <th>Comp. Website</th>
                        <th>Strart Date</th>
                        <th>Date Created</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM  students";
                    $query_select_all = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($query_select_all)) {
                        $id = $row['id'];
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

                        echo "<tr>";
                        echo "<td>{$id}</td>";
                        echo "<td>{$name}</td>";
                        echo "<td>{$email}</td>";
                        echo "<td>{$mobile}</td>";
                        echo "<td>{$admissionnumber}</td>";
                        echo "<td>{$companyname}</td>";
                        echo "<td>{$companyaddress}</td>";
                        echo "<td>{$companyemail}</td>";
                        echo "<td>{$companycontact}</td>";
                        echo "<td>{$companywebsite}</td>";
                        echo "<td>{$startingdate}</td>";
                        echo "<td>{$created_at}</td>";
                        echo "<td><a href='updatestudents.php?update=<?php echo $admissionnumber ?>'>Update</a></td>";
                        echo "<td><a href='registeredstudents.php?delete={$admissionnumber}'>Delete</a></td>";
                        echo "</tr>";
                    }
                    ?>
                    <!-- deleting records from the db -->
                    <?php
                    if (isset($_GET['delete'])) {
                        $delete_id = $_GET['delete'];
                        $query = "DELETE FROM students WHERE student_id={$delete_id} ";
                        $delete_query = mysqli_query($conn, $query);
                        header("location: registeredstudents.php");
                    }
                    ?>

                </tbody>
            </table>
        </div>


    </div>


</body>



</html>