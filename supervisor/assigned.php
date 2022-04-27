<?php include "./includes/db.php"; ?>
<?php
session_start();

if (!isset($_SESSION['role_id'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (!isset($_SESSION['lecname'])) {
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
    <title>Lecturer</title>
    <link rel="stylesheet" type="text/css" href="templates/style1.css">
    <link rel="stylesheet" href="text/css" href="templates/style.css">
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <header>
        <a href="#" class="logo">CIAMS</a>

        <input type="checkbox" id="menu-bar">
        <label for="menu-bar">Menu</label>

        <nav class="navbar">
            <ul>
                <li><a href="assigned.php">Students Logbooks</a></li>
                <li><a href="#">Logout</a></li>
                <li><a href="#">My Dashboard +</a>
                    <ul>
                        <li><a href="students/login.php">My Details</a></li>
                        <li><a href="supervisor/login.php">Supervisor</a></li>
                    </ul>
                </li>
                <li class="username"><span style="color:rgb(255, 198, 0);font-size:1.1em"><em>Welcome,</em>&nbsp; </span><span style="font-family:serif">
                        <?php echo $_SESSION['lecname']; ?></span>
                </li>
            </ul>
        </nav>
    </header>

    <div class="article">

        <table class="table table-striped" id="mytable" border="2" style="background-color: #84ed86; color: #761a9b; margin: 0 auto;">
            <tr>
                <th><b>Full Name</b></th>
                <th><b>Faculty</b></th>
                <th><b>Department</b></th>
                <th><b>Company</b></th>
                <th><b>Company Address</b></th>
                <th><b>Action</b></th>
            </tr>
            <tbody id="show_data">

                <?php
                $lec_id = $_SESSION['lec_id'];
                $conn = mysqli_connect("localhost", "root", "", "supervisedb");
                $sql = "SELECT * FROM assigned LEFT JOIN students ON students.id=assigned.student_id WHERE assigned.lecturer_id=$lec_id";
                $res = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
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
                    echo "<td><a href='studentlogbook.php?edit={$id}'>Logbook</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

    </div>
</body>

</html>