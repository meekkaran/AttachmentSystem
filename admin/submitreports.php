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
                    <li class="menu_items_list" style="background-color:orange;padding-left:16px">Student Reports</li>
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
            <table border="1" cellpadding="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Student ID</th>
                        <th>Report</th>

                        <th>posted_At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM  fileup";
                    $query_select_all = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($query_select_all)) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $report = $row['report'];
                        $student_id = $row['student_id'];
                        $posted_at = $row['posted_at'];

                        echo "<tr>";
                        echo "<td>{$id}</td>";
                        echo "<td>{$title}</td>";
                        echo "<td>{$student_id}</td>";
                        echo "<td>{$report}</td>";
                        echo "<td>{$posted_at}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>


    </div>


</body>



</html>