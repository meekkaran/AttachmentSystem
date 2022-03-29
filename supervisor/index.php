<?php
session_start();

if (!isset($_SESSION['role_id'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['role_id']);
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="templates/style1.css">
    <link rel="stylesheet" href="../style.css" />
</head>

<body>
    <header>
        <a href="#" class="logo">CIAMS</a>
<!-- 
        <input type="checkbox" id="menu-bar">
        <label for="menu-bar">Menu</label> -->

        <nav class="navbar">
            <ul>
                <li><a href="#">Logout</a></li>
                <li><a href="#">Dashboard +</a>
                    <ul>
                        <li><a href="#">My Profile</a></li>
                        <li><a href="#">My Details</a></li>
                    </ul>
                </li>
                <li id="fullname"><span style="color:rgb(255, 198, 0);font-size:1.1em"><em>Welcome,</em>&nbsp; </span><span style="font-family:serif">
                        <?php echo $_SESSION['lec_id']; ?></span>
                </li>
            </ul>
        </nav>
    </header>

    <div class="nav">
        <!-- notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success">
                <h3>
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>

        <!-- logged in user information -->
        <?php if (isset($_SESSION['lec_id'])) : ?>
            <p>Welcome <strong><?php echo $_SESSION['lec_id']; ?></strong></p>
            <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
        <?php endif ?>
    </div>
    <div class="aside">
        <ul>
            <li class="listing"><a href="index.php">Dashboard</a></li>
            <li class="listing"><a href="categories.php">Lecturers</a></li>
            <li class="listing"><a href="">Students</a></li>
            <li class="listing"><a href="">Assign</a></li>
        </ul>
    </div>
    <div class="article">
        <h2>STUDENTS LOGBOOKS</h2>

        <table class="table table-striped" width="100%" id="mytable" border="2" style="background-color: #84ed86; color: #761a9b; margin: 0 auto;">
            <tr>
                <th><b>Name</b></th>
                <th><b>Faculty</b></th>
                <th><b>Department</b></th>
                <th><b>Company</b></th>
                <th><b>Company Address</b></th>
                <th><b>Action</b></th>
            </tr>
            <tbody id="show_data">

                <?php
                // if(isset($_SESSION['lec_id'])){
                //     $lec_id = $_SESSION['lec_id'];

                // }
                $conn = mysqli_connect("localhost", "root", "", "supervisedb");
                // $sql = "SELECT * FROM assigned INNER JOIN students ON assigned.student_id = students.id WHERE assigned.lecturer_id=$lec_id";
                $lec_id = $_SESSION['lec_id'];

                $sql = "SELECT * FROM assigned, students WHERE assigned.student_id = students.id AND assigned.lecturer_id = $lec_id";
                // $sql = "SELECT * FROM students JOIN assigned ON assigned.student_id=student.id WHERE assigned.lecturer_id=$lec_id";
                $res = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($res)) {
                    $_SESSION['student_id'] = $row['student_id'];
                    $id = $_SESSION['student_id'];
                    $name = $row['name'];
                    $faculty = $row['faculty'];
                    $department = $row['department'];
                    $company = $row['companyname'];
                    $companyaddress = $row['companyaddress'];
                    echo "<tr>";
                    echo "<td>{$name}</td>";
                    echo "<td>{$faculty}</td>";
                    echo "<td>{$department}</td>";
                    echo "<td>{$company}</td>";
                    echo "<td>{$companyaddress}</td>";
                    // echo "<td><a href='categories.php?delete={$id}'>Delete</a></td>";
                    echo "<td><a href='logbook.php?edit={$id}'>Logbook</a></td>";
                    echo "</tr>";
                }
                ?>

            </tbody>
        </table>

    </div>
</body>

</html>