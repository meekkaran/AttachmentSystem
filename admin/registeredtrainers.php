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
                    <li class="menu_items_list">Registered Students</li>
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
                <a class="menu_items_link" href="registeredtrainers.php">
                    <li class="menu_items_list" style="background-color:orange;padding-left:16px">Registered Trainers</li>
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
            <table border="1" cellpadding="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Title</th>
                        <th>Date Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM  trainers";
                    $query_select_all = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($query_select_all)) {
                        $trainer_id = $row['trainer_id'];
                        $trainername = $row['trainername'];
                        $email = $row['email'];
                        $mobile = $row['mobile'];
                        $title = $row['title'];
                        $created_at = $row['created_at'];

                        echo "<tr>";
                        echo "<td>{$trainer_id}</td>";
                        echo "<td>{$trainername}</td>";
                        echo "<td>{$email}</td>";
                        echo "<td>{$mobile}</td>";
                        echo "<td>{$title}</td>";
                        echo "<td>{$created_at}</td>";
                        echo "<td><a href='registeredtrainers.php?update={$email}'class='adminbtn1'>Update</a></td>";
                        echo "<td><a href='registeredtrainers.php?delete={$email}'class='adminbtn'>Delete</a></td>";
                        echo "</tr>";
                    }
                    ?>
                    <!-- deleting records from the db -->
                    <?php
                    if (isset($_GET['delete'])) {
                        $trainer_id = $_GET['delete'];
                        $delete_id = mysqli_query($conn, "DELETE FROM `trainers` WHERE `trainer_id` = '$trainer_id'");
                    }

                    ?>

                </tbody>
            </table>
        </div>


    </div>


</body>



</html>