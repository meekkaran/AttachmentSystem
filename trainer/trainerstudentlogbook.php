<?php include "./includes/db.php"; ?>
<?php
session_start();
ob_start();

if (!isset($_SESSION['trainer_id'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

$query = "SELECT * FROM tbl_weeks";
$select_all_weeks = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrainerStudentLogbook</title>
    <link href="templates/logbook_style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <a href="#" class="logo">CIAMS</a>

        <input type="checkbox" id="menu-bar">
        <label for="menu-bar">Menu</label>

        <nav class="navbar">
            <ul>
                <li><a href="assignedtrainer.php">Students Logbooks</a></li>
                <li><a href="#">Logout</a></li>
                <li class="username"><span style="color:rgb(255, 198, 0);font-size:1.1em"><em>Welcome,</em>&nbsp; </span><span style="font-family:serif">
                        <?php echo $_SESSION['trainername']; ?></span>
                </li>
            </ul>
        </nav>
    </header>
    <div class="logbookbody">
        <form method="post" action="studentlogbook.php">
            <div class="nav">
                <div class="aside">
                    <!-- <hr>
          <input type="text" id="lecremark" name="lecremark" class="lecremark" value="LECREMARK" placeholder="LECTURER REMARK" readonly />
          <textarea type="text" id="lrmk" name="lecomment" class="form-control lrmk" placeholder="LECTURER WEEKLY REMARK"></textarea>
          <input name="create_post7" type="submit" id="btn_save8" value="SUBMIT LECTURER REMARK" class="btn  sv9">
          <hr> -->
                    <ul>
                        <li class="listing"><a href="profile.php"><?php echo $_SESSION['name']; ?></a></li>
                        <li class="listing"><a href="lec.php">Your Students</a></li>
                    </ul>
                </div>
            </div>
        </form>
        <div class="article">

            <table class="table table-striped" width="100%" id="mytable" border="2" style="background-color: #84ed86; color: #761a9b; margin: 0 auto;">
                <tr>
                    <th><b>week/12</b></th>
                    <th><b>MONDAY</b></th>
                    <th><b>TUESDAY</b></th>
                    <th><b>WEDNESDAY</b></th>
                    <th><b>THURSDAY</b></th>
                    <th><b>FRIDAY</b></th>
                    <th><b>SATURDAY</b></th>
                    <th><b>Student Comments</b></th>
                </tr>
                <tbody id="show_data">

                    <?php
                    if (isset($_SESSION['student_id'])) {
                        $student_id = $_SESSION['student_id'];
                        foreach ($select_all_weeks as $key => $t) {
                            echo "<tr>";
                            echo "<td>" . $t['week_title'] . "</td>";
                            $conn = mysqli_connect("localhost", "root", "", "supervisedb");
                            $query12 = "SELECT * FROM logbookdata WHERE week_id='" . $t['week_id'] . "' AND student_id='" . $student_id . "' ";
                            // echo "$query12";
                            $res = mysqli_query($conn, $query12);
                            $week_days = array('MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY', 'REMARK');
                            $classes = array();
                            while ($row = mysqli_fetch_assoc($res)) {
                                $classes[$row['day_title']] = $row;
                            }
                            foreach ($week_days as $day) {

                                if (array_key_exists($day, $classes)) {
                                    $row = $classes[$day];
                                    $_SESSION['student_id'] = $row['student_id'];
                                    $_SESSION['week_id'] = $row['week_id'];
                                    $id = $_SESSION['student_id'];
                                    $id1 = $_SESSION['week_id'];
                                    echo  "<td  style='background-color:green;color:white;'>" . $row['day_notes'] . "<br>" . $row['created_at'] . "</td>";
                                } else {

                                    echo "<td style='background-color:red;color:white;'>" . "Pending" . "</td>";
                                }
                            }
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- footer section -->
    <!-- LECTURER COMMENTS -->
    <div class="lecomments">
        <h1 style="color:#fff">LECTURER COMMENTS</h1>
        <div class="logbookbody">
            <form method="post" action="studentlogbook.php">
                <div class="nav">
                    <div class="form-group">
                        <label for="weeks">WEEKS</label>
                        <select class="form-control" name="week_id" id="weeks">
                            <option value="">--- Choose Week ---</option>
                            <?php foreach ($select_all_weeks as $row) : ?>
                                <option value="<?php echo $row['week_id']; ?>"><?php echo $row['week_title']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="aside">
                        <hr>
                        <input type="text" id="lecremark" name="lecremark" class="lecremark" value="LECREMARK" placeholder="LECTURER REMARK" readonly />
                        <!-- <textarea type="text" id="lrmk" name="lecomment" class="form-control lrmk" placeholder="LECTURER WEEKLY REMARK"></textarea> -->
                        <input name="create_post7" type="submit" id="btn_save8" value="SUBMIT LECTURER REMARK" class="btn  sv9">
                        <hr>
                    </div>
                </div>
            </form>
            <div class="article">

                <table class="table table-striped" width="100%" id="mytable" border="2" style="background-color: #84ed86; color: #761a9b; margin: 0 auto;">
                    <tr>
                        <th><b>week/12</b></th>
                        <th><b>LECTURER COMMENTS</b></th>
                    </tr>
                    <tbody id="show_data">
                        <?php
                        if (isset($_SESSION['lec_id'])) {
                            $lec_id = $_SESSION['lec_id'];
                            foreach ($select_all_weeks as $key => $t) {
                                echo "<tr>";
                                echo "<td>" . $t['week_title'] . "</td>";
                                $conn = mysqli_connect("localhost", "root", "", "supervisedb");
                                $query12 = "SELECT * FROM lec_comments WHERE week_id='" . $t['week_id'] . "' AND lec_id='" . $lec_id . "'";
                                $res = mysqli_query($conn, $query12);
                                $week_days = array('LECREMARK');
                                if ($result = mysqli_fetch_array($res)) {
                                    echo  "<td  style='background-color:green;color:white;'>" . $result['lecomment'] . "</td>";
                                } else {
                                    echo "<td style='background-color:red;color:white;'>" . "Pending" . "</td>";
                                }
                            }
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- TRAINER COMMENTS -->
    <div class="trainercomments">
        <h1 style="color:#fff">TRAINER COMMENTS</h1>
        <div class="logbookbody">
            <form method="post" action="trainerstudentlogbook.php">
                <div class="nav">
                    <div class="form-group">
                        <label for="weeks">WEEKS</label>
                        <select class="form-control" name="week_id" id="weeks">
                            <option value="">--- Choose Week ---</option>
                            <?php foreach ($select_all_weeks as $row) : ?>
                                <option value="<?php echo $row['week_id']; ?>"><?php echo $row['week_title']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="aside">
                        <hr>
                        <input type="text" id="trainerremark" name="trainerremark" class="trainerremark" value="TRAINERREMARK" placeholder="TRAINER REMARK" readonly />
                        <textarea type="text" id="trmk" name="trainercomment" class="form-control lrmk" placeholder="TRAINER WEEKLY REMARK"></textarea>
                        <input name="create_post8" type="submit" id="btn_save8" value="SUBMIT TRAINER REMARK" class="btn  sv10">
                        <hr>
                    </div>
                </div>
            </form>
            <div class="article">

                <table class="table table-striped" width="100%" id="mytable" border="2" style="background-color: #84ed86; color: #761a9b; margin: 0 auto;">
                    <tr>
                        <th><b>week/12</b></th>
                        <th><b>TRAINER COMMENTS</b></th>
                    </tr>
                    <tbody id="show_data">
                        <?php
                        if (isset($_SESSION['trainer_id'])) {
                            $trainer_id = $_SESSION['trainer_id'];
                            foreach ($select_all_weeks as $key => $t) {
                                echo "<tr>";
                                echo "<td>" . $t['week_title'] . "</td>";
                                $conn = mysqli_connect("localhost", "root", "", "supervisedb");
                                $query12 = "SELECT * FROM trainer_comments WHERE week_id='" . $t['week_id'] . "' AND trainer_id='" . $trainer_id . "'";
                                $res = mysqli_query($conn, $query12);
                                $week_days = array('TRAINERREMARK');
                                if ($result = mysqli_fetch_array($res)) {
                                    echo  "<td  style='background-color:green;color:white;'>" . $result['trainercomment'] . "</td>";
                                } else {
                                    echo "<td style='background-color:red;color:white;'>" . "Pending" . "</td>";
                                }
                            }
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php

    //lecturer remarks input
    if (isset($_POST['create_post8'])) {
        global $conn;
        // $day_title = $_POST['lecremark'];
        $week_title = $_POST['week_id'];
        $day_notes = $_POST['trainercomment'];
        $query = "INSERT INTO trainer_comments(student_id, trainer_id, week_id, trainercomment) ";
        $query .=
            "VALUES('{$student_id}',{$_SESSION['trainer_id']},$week_title,'$day_notes') ";
        $create_post_query = mysqli_query($conn, $query);
        header('location: trainerstudentlogbook.php');
        exit(0);
        // confirmQuery($create_post_query);
    }
    ?>

</body>

</html>