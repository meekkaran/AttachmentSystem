<?php include "./includes/db.php"; ?>
<!DOCTYPE html>
<html lang="en" class="bg-pink">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CIAMS</title>
    <link rel="stylesheet" href="./templates/admin.css" />
    <link rel="stylesheet" href="view_registered_students.css" />
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

        <div id="main_content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading phead">
                        <h2 class="panel-title ptitle"> View Registered Lecturers</h2>
                    </div>
                    <div class="panel-body pbody">

                        <form method="post" action="">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-5 col-xs-offset-6">
                                        <div class="input-group">
                                            <div class="input-group-btn search-panel">
                                                <select class="form-control search_by_side" name="filter-by">
                                                    <option>FilterBy</option>
                                                    <option>First Name</option>
                                                    <option>Last Name</option>
                                                    <option>Index Number</option>
                                                    <option>Programme</option>
                                                    <option>Level</option>
                                                    <option>Session</option>

                                                </select>

                                            </div>
                                            <input type="hidden" name="search_param" value="all" id="search_param">
                                            <input type="text" class="form-control" name="txt_search_term" placeholder="Search term...">
                                            <span class="input-group-btn">
                                                <input type="submit" class="btn btn-primary" value="search" name="btn_search" id="btn_search">
                                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <br>
    <table align='center' width='100%' cellpading='3' cellspacing='2' bgcolor=''>
        <thead>
            <tr>
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
                $trainername = $row['trainername'];
                $email = $row['email'];
                $mobile = $row['mobile'];
                $title = $row['title'];
                $created_at = $row['created_at'];

                echo "<tr>";
                echo "<td>{$trainername}</td>";
                echo "<td>{$email}</td>";
                echo "<td>{$mobile}</td>";
                echo "<td>{$title}</td>";
                echo "<td>{$created_at}</td>";
                echo "<td><a href='registeredtrainers.php?update={$email}'>Update</a></td>";
                echo "<td><a href='registeredtrainers.php?delete={$email}'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
            <!-- deleting records from the db -->
            <?php
            if (isset($_GET['delete'])) {
                $delete_id = $_GET['delete'];
                $query = "DELETE FROM trainers WHERE trainer_id={$delete_id} ";
                $delete_query = mysqli_query($conn, $query);
                header("location: registeredtrainers.php");
            }
            ?>

        </tbody>
    </table>
    </div>
    </div>
    </div>

</body>

</html>