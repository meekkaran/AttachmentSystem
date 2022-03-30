<?php include "./includes/db.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adminDashboard</title>
    <link rel="stylesheet" href="./templates/admin.css">
    <link rel="stylesheet" href="../style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>

<body>
    <!-- header menu -->
    <header>
        <a href="#" class="logo">CIAMS</a>

        <input type="checkbox" id="menu-bar">
        <label for="menu-bar">Menu</label>

        <navbar class="navbar">
            <ul>
                <li><a href="#">Welcome Admin</a></li>
            </ul>
        </navbar>
    </header>


    <!-- sidebar menu -->
    <nav class="sidebar">
        <div class="text">Side Menu</div>
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Company Details</a></li>
            <li>
                <a href="#" class="feat-btn">Students
                    <span class="show"> + </span>
                </a>
                <ul class="feat-show">
                    <li><a href="#">View students</a></li>
                    <li><a href="#">View Submitted reports</a></li>
                    <li><a href="#">View E-logbooks</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="serv-btn">Lecturers
                    <span class="show1"> + </span>
                </a>
                <ul class="serv-show">
                    <li><a href="#">View Lecturers</a></li>
                    <li><a href="#">Assign Lecturers</a></li>
                    <li><a href="#">View Lecturers remarks</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="book-btn">Supervisors
                    <span class="show2"> + </span>
                </a>
                <ul class="book-show">
                    <li><a href="#">View Supervisors</a></li>
                    <li><a href="#">View Supervisors remarks</a></li>
                </ul>
            </li>

            <li><a href="#">Change Password</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </nav>

    <script>
        $('.feat-btn').click(function() {
            $('nav ul .feat-show').toggleClass("show");
        });
        $('.serv-btn').click(function() {
            $('nav ul .serv-show').toggleClass("show1");
        });
        $('.book-btn').click(function() {
            $('nav ul .book-show').toggleClass("show2");
        });
    </script>


    <!-- main admin body content -->

    <div class="mainbodycontent">
        <h3 align='center'>VIEW REGISTERED STUDENTS </h3>
        <table align='center' width='100%' cellpading='3' cellspacing='2' bgcolor=''>
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Admission Number</th>
                    <th>Company Name</th>
                    <th>Company Address</th>
                    <th>Company Email</th>
                    <th>Company Contact</th>
                    <th>Company Website</th>
                    <th>Strarting Date</th>
                    <th>Date Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM  students";
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

                    echo "<tr>";
                    echo "<td>{$name}</td>";
                    echo "<td>{$email}</td>";
                    echo "<td>{$mobile}</td>";
                    echo "<td>{$admissionnumber}</td>";
                    echo "<td>{$companyname}</td>";
                    echo "<td>{ $companyaddress }</td>";
                    echo "<td>{$companyemail}</td>";
                    echo "<td>{$companycontact}</td>";
                    echo "<td>{$companywebsite}</td>";
                    echo "<td>{$startingdate}</td>";
                    echo "<td>{$created_at}</td>";
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


</body>

</html>