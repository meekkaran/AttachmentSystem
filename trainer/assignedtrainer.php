<?php include "./includes/db.php"; ?>
<?php
session_start();

if (!isset($_SESSION['trainer_id'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>TrainerStudentsPage</title>
    <link rel="stylesheet" href="templates/style1.css">
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <header>
        <a href="#" class="logo">CIAMS</a>

        <input type="checkbox" id="menu-bar">
        <label for="menu-bar">Menu</label>

        <nav class="navbar">
            <ul>
                <li><a href="assignedtrainer.php">Add Student</a></li>
                <li><a href="">Students Logbooks</a></li>
                <li><a href="#">Logout</a></li>
                <li><a href="#">My Dashboard +</a>
                    <ul>
                        <li><a href="students/login.php">My Details</a></li>
                        <li><a href="supervisor/login.php">Supervisor</a></li>
                    </ul>
                </li>
                <li class="username"><span style="color:rgb(255, 198, 0);font-size:1.1em"><em>Welcome,</em>&nbsp; </span><span style="font-family:serif">
                        <?php echo $_SESSION['trainername']; ?></span>
                </li>
            </ul>
        </nav>
    </header>

    <!-- <div class="article"> -->

    <div class="article">
        <h2>Enter Students Registration Number</h2>
        <div class="formcontainer">

            <form action="assignedtrainer.php" method="post">
                <label>Admission Number:</label><br>
                <input type="text" name="admission_number"><br>
                <br>
                <hr>
                <input type="submit" value="Save Changes" name="savechanges" class="savebtn" />
            </form>
        </div>
        <?php
        $db = mysqli_connect('localhost', 'root', '', 'supervisedb');
        if (isset($_POST['savechanges'])) {
            $admissionnumber = $_POST['admission_number'];
            $query = "INSERT INTO assigned_trainer( admission_number,trainer_id) VALUES({$admissionnumber},'{$_SESSION['trainer_id']}') ";
            $create_post_query = mysqli_query($db, $query);
            // confirmQuery($create_post_query);
        }
        ?>

    </div>
    <div class="logbooktable">
        <table class="table table-striped" id="mytable" border="2" style="background-color: #84ed86; color: #761a9b; margin: 0 auto;">
            <tr>
                <th><b>Full Name</b></th>
                <th><b>Company Name</b></th>
                <th><b>Company Address</b></th>
                <th><b>Action</b></th>
            </tr>
            <tbody id="show_data">

                <?php
                $trainer_id = $_SESSION['trainer_id'];
                $conn = mysqli_connect("localhost", "root", "", "supervisedb");
                $sql = "SELECT * FROM assigned_trainer LEFT JOIN students ON students.admission_number=assigned_trainer.admission_number WHERE assigned_trainer.trainer_id=$trainer_id";
                $res = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $company = $row['companyname'];
                    $companyaddress = $row['companyaddress'];
                    echo "<tr>";
                    echo "<td>{$name}</td>";
                    echo "<td>{$company}</td>";
                    echo "<td>{$companyaddress}</td>";
                    echo "<td><a href='trainerstudentlogbook.php?edit={$id}'>Logbook</a></td>";
                    echo "</tr>";
                }
                ?>

            </tbody>
        </table>
    </div>



    </div>
</body>

</html>