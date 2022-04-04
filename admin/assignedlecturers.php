<?php include "./includes/db.php"; ?>
<!DOCTYPE html>
<html lang="en" class="bg-pink">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CIAMS</title>
    <link rel="stylesheet" href="./templates/admin.css" />
    <link rel="stylesheet" href="./templates/style1.css" />

    <script type="text/javascript" src="../../js/jquery-3.1.1.min.js" />
    </script>

</head>

<body>

    <div id="top-navigation">
        <div id="header_logo"><img src="../../img/header_log.png" style="float:left;width:150px; height:50px;position:relative;left:20px" />CIAMS</div>
        <div id="student_name"><span style="color:rgb(255, 198, 0);font-size:1.1em"><em>Welcome,</em>&nbsp; </span><span style="font-family:serif"><?php echo "Admin" ?></span></div>
    </div>

    <div class="wrap">
        <div id="left_side_bar">
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
                <a class="menu_items_link" href="changepassword.php">
                    <li class="menu_items_list">Change Password</li>
                </a>
                <a class="menu_items_link" href="../../index.php">
                    <li class="menu_items_list">Logout</li>
                </a>
            </ul>
        </div>

        <div class="article">
            <form action="assignedlecturers.php" method="post">
                <h1>Assign Supervisors</h1>
                <label>Student</label>
                <select name="student" class="sel">
                    <?php
                    $db = mysqli_connect('localhost', 'root', '', 'supervisedb');
                    $query = "SELECT * FROM students ";
                    $select_all_students = mysqli_query($db, $query);
                    // confirmQuery($select_all_categories);
                    while ($row = mysqli_fetch_assoc($select_all_students)) {
                        $stud_id = $row['id'];
                        $name = $row['name'];
                        echo "<option value='{$stud_id}'>{$name}</option>";
                    }
                    ?>
                </select>
                <label>Lecturer</label>
                <select name="lecturer" class="sel">
                    <?php
                    $db = mysqli_connect('localhost', 'root', '', 'supervisedb');
                    $query = "SELECT * FROM lecturers ";
                    $select_all_lecturers = mysqli_query($db, $query);
                    // confirmQuery($select_all_categories);
                    while ($row = mysqli_fetch_assoc($select_all_lecturers)) {
                        $stud_id = $row['lec_id'];
                        $name = $row['lecname'];
                        echo "<option value='{$stud_id}'>{$name}</option>";
                    }
                    ?>
                </select>
                <br>
                <hr>
                <input type="submit" value="Save Changes" name="save_assigned" class="savebtn" />
            </form>
            <?php
            $db = mysqli_connect('localhost', 'root', '', 'supervisedb');
            if (isset($_POST['save_assigned'])) {
                $student = $_POST['student'];
                $lecturer = $_POST['lecturer'];
                $query = "INSERT INTO assigned(student_id, lecturer_id) ";
                $query .=
                    "VALUES({$student},'{$lecturer}') ";
                $create_post_query = mysqli_query($db, $query);
                // confirmQuery($create_post_query);
            }
            ?>

        </div>

    </div>
</body>

</html>