<?php
session_start();
ob_start();

if (!isset($_SESSION['lec_id'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}
// if (isset($_GET['logout'])) {
//   session_destroy();
//   unset($_SESSION['student_id']);
//   header("location: login.php");
// }

// variable array $db that hold each parameters necessary to connect to the database
$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "supervisedb";

// foreach loop that loops through array $db to convert parameters to constants
foreach ($db as $key => $value) {
  // define function that converts the paramerts looped to constants and uppercase
  define(strtoupper($key), $value);
}

// connecting the database from the converted parameters into uppercase
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$query = "SELECT * FROM tbl_weeks";
$select_all_weeks = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LecStudentLogbook</title>
  <link href="templates/logbook_style.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <header>
    <a href="#" class="logo">CIAMS</a>

    <!-- <input type="checkbox" id="menu-bar">
    <label for="menu-bar">Menu</label> -->

    <div class="navbar">
      <ul>
        <li><a href="logbook.php">Logbook</a></li>
        <li><a href="submitreports.php">Submit Report</a></li>
        <li><a href="index.php">Logout</a></li>
        <li><a href="#">Dashboard +</a>
          <ul>
            <li><a href="#">My Profile</a></li>
            <li><a href="#">My Details</a></li>
          </ul>
        </li>
        <li class="username"><span style="color:rgb(255, 198, 0);font-size:1.1em"><em>Welcome,</em>&nbsp; </span><span style="font-family:serif">
            <?php echo $_SESSION['lec_id']; ?></span>
        </li>
      </ul>
    </div>
  </header>
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
        <div class="form-group">
          <input type="button" value="MONDAY" name="mon_days" onclick="myFunction()" class="btn">
          <input type="button" value="TUESDAY" name="tue_days" onclick="myFunction1()" class="btn">
          <input type="button" value="WEDNESDAY" name="wed_days" onclick="myFunction2()" class="btn">
          <input type="button" value="THURSDAY" name="thur_days" onclick="myFunction3()" class="btn">
          <input type="button" value="FRIDAY" name="fri_days" onclick="myFunction4()" class="btn">
          <input type="button" value="SATURDAY" name="sat_days" onclick="myFunction5()" class="btn">
          <button onclick="myFunction6()" type="button" class="btn">WEEK REMARK</button>
          <button onclick="myFunction7()" type="button" class="btn">LECTURER REMARK</button>
        </div>
        <div class="aside">
          <hr>
          <label for="inputEmail4" style="color:black;">TODAY NOTES</label>
          <input type="text" id="mon" name="mon_day" class="mon" value="MONDAY" placeholder="MONDAY" readonly />
          <textarea type="text" id="bld" name="mon_notes" class="form-control bld" placeholder="MONDAY NOTES"></textarea>
          <input type="text" id="tue" name="tue_day" class="tue" value="TUESDAY" placeholder="TUESDAY" readonly />
          <textarea type="text" id="cole" name="tue_notes" class="form-control cole" placeholder="TUESDAY NOTES"></textarea>
          <input type="text" id="wed" name="wed_day" class="tue" value="WEDNESDAY" placeholder="WEDNESDAY" readonly />
          <textarea type="text" id="hrt" name="wed_notes" class="form-control hrt" placeholder="WEDNESDAY NOTES"></textarea>
          <input type="text" id="thur" name="thur_day" class="thur" value="THURSDAY" placeholder="THURSDAY" readonly />
          <textarea type="text" id="thal" name="thur_notes" class="form-control thal" placeholder="THURSDAY NOTES"></textarea>
          <input type="text" id="fri" name="fri_day" class="fri" value="FRIDAY" placeholder="FRIDAY" readonly />
          <textarea type="text" id="wt" name="fri_notes" class="form-control wt" placeholder="FRIDAY NOTES"></textarea>
          <input type="text" id="sat" name="sat_day" class="sat" value="SATURDAY" placeholder="SATURDAY" readonly />
          <textarea type="text" id="ht" name="sat_notes" class="form-control ht" placeholder="SATURDAY NOTES"></textarea>
          <input type="text" id="remark" name="remark" class="remark" value="REMARK" placeholder="REMARK" readonly />
          <textarea type="text" id="rmk" name="remarks_notes" class="form-control rmk" placeholder="WEEKLY REMARK"></textarea>
          <input type="text" id="lecremark" name="lecremark" class="lecremark" value="LECREMARK" placeholder="LECTURER REMARK" readonly />
          <textarea type="text" id="lrmk" name="lec_remarks_notes" class="form-control lrmk" placeholder="LECTURER WEEKLY REMARK"></textarea>
          <!-- buttons -->
          <input type="submit" name="create_post" id="btn_save1" value="MONDAY SUBMIT" class="btn sv2">
          <input name="create_post1" type="submit" id="btn_save2" value="TUESDAY SUBMIT" class="btn sv3">
          <input name="create_post2" type="submit" id="btn_save3" value="WEDNESDAY SUBMIT" class="btn sv4">
          <input name="create_post3" type="submit" id="btn_save4" value="THURSDAY SUBMIT" class="btn sv5">
          <input name="create_post4" type="submit" id="btn_save5" value="FRIDAY SUBMIT" class="btn sv6">
          <input name="create_post5" type="submit" id="btn_save6" value="SATURDAY SUBMIT" class="btn  sv7">
          <input name="create_post6" type="submit" id="btn_save7" value="SUBMIT REMARK" class="btn  sv8">
          <input name="create_post7" type="submit" id="btn_save8" value="SUBMIT LECTURER REMARK" class="btn  sv9">
          <hr>
          <ul>
            <li class="listing"><a href="profile.php"><?php echo $_SESSION['name']; ?></a></li>
            <li class="listing"><a href="index.php">Logbook</a></li>
            <li class="listing"><a href="lec.php">Your Supervisor</a></li>
            <!-- <li class="listing"><a href="">Profile</a></li> -->
            <li class="listing"><a href="index.php?logout='1'" style="color: red;">logout</a></li>
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
          <th><b>LECTURER REMARKS</b></th>
          <th><b>TRAINER REMARKS</b></th>
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
              $res = mysqli_query($conn, $query12);
              $week_days = array('MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY', 'REMARK', 'LECREMARK');
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
                  // echo "<td style='background-color:green;color:white;'>"."Match"."</td>";
                  echo  "<td  style='background-color:green;color:white;'>" . $row['day_notes'] . "<br>" . $row['created_at'] . "</td>";
                } else {

                  echo "<td style='background-color:red;color:white;'>" . "Pending" . "</td>";
                }
              }
              echo "<td style='background-color:red;color:white;'>" . "Pending" . "</td>";
              echo "</tr>";
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>


  <?php
  // monday input
  if (isset($_POST['create_post'])) {
    global $conn;
    // $day_title = isset($_GET['mon_days']) ? $_GET['mon_days'] : '';
    // $day_title = isset($_POST['mon_days']) ? $_POST['mon_days'] : '';
    $day_title = $_POST['mon_day'];
    $week_title = $_POST['week_id'];
    $day_notes  = $_POST['mon_notes'];
    $student_id = $_SESSION['student_id'];
    $query = "INSERT INTO logbookdata(week_id, day_title, day_notes, created_at, student_id, leccomment, trainercomment) ";
    $query .=
      "VALUES({$week_title},'{$day_title}','{$day_notes}',now(), '{$student_id}', NULL, NULL) ";
    $create_post_query = mysqli_query($conn, $query);
    header('location: logbook.php');
    exit(0);
    // confirmQuery($create_post_query);
  }
  // tuesday input
  if (isset($_POST['create_post1'])) {
    global $conn;
    // $day_title = isset($_GET['mon_days']) ? $_GET['mon_days'] : '';
    // $day_title = isset($_POST['mon_days']) ? $_POST['mon_days'] : '';
    $day_title = $_POST['tue_day'];
    $week_title = $_POST['week_id'];
    $day_notes  = $_POST['tue_notes'];
    $student_id = $_SESSION['student_id'];
    $query = "INSERT INTO logbookdata(week_id, day_title, day_notes, created_at, student_id, leccomment, trainercomment) ";
    $query .=
      "VALUES({$week_title},'{$day_title}','{$day_notes}',now(), '{$student_id}', NULL, NULL) ";
    $create_post_query = mysqli_query($conn, $query);
    header('location: logbook.php');
    exit(0);
    // confirmQuery($create_post_query);
  }
  // wednesday input
  if (isset($_POST['create_post2'])) {
    global $conn;
    // $day_title = isset($_GET['mon_days']) ? $_GET['mon_days'] : '';
    // $day_title = isset($_POST['mon_days']) ? $_POST['mon_days'] : '';
    $day_title = $_POST['wed_day'];
    $week_title = $_POST['week_id'];
    $day_notes  = $_POST['wed_notes'];
    $student_id = $_SESSION['student_id'];
    $query = "INSERT INTO logbookdata(week_id, day_title, day_notes, created_at, student_id, leccomment, lec_id, trainercomment) ";
    $query .=
      "VALUES({$week_title},'{$day_title}','{$day_notes}',now(), '{$student_id}', NULL, NULL) ";
    $create_post_query = mysqli_query($conn, $query);
    header('location: logbook.php');
    exit(0);
    // confirmQuery($create_post_query);
  }
  // thursday input
  if (isset($_POST['create_post3'])) {
    global $conn;
    // $day_title = isset($_GET['mon_days']) ? $_GET['mon_days'] : '';
    // $day_title = isset($_POST['mon_days']) ? $_POST['mon_days'] : '';
    $day_title = $_POST['thur_day'];
    $week_title = $_POST['week_id'];
    $day_notes  = $_POST['thur_notes'];
    $student_id = $_SESSION['student_id'];
    $query = "INSERT INTO logbookdata(week_id, day_title, day_notes, created_at, student_id, leccomment, trainercomment) ";
    $query .=
      "VALUES({$week_title},'{$day_title}','{$day_notes}',now(), '{$student_id}', NULL, NULL) ";
    $create_post_query = mysqli_query($conn, $query);
    header('location: logbook.php');
    exit(0);
    // confirmQuery($create_post_query);
  }
  // friday input
  if (isset($_POST['create_post4'])) {
    global $conn;
    // $day_title = isset($_GET['mon_days']) ? $_GET['mon_days'] : '';
    // $day_title = isset($_POST['mon_days']) ? $_POST['mon_days'] : '';
    $day_title = $_POST['fri_day'];
    $week_title = $_POST['week_id'];
    $day_notes  = $_POST['fri_notes'];
    $student_id = $_SESSION['student_id'];
    $query = "INSERT INTO logbookdata(week_id, day_title, day_notes, created_at, student_id, leccomment, trainercomment) ";
    $query .=
      "VALUES({$week_title},'{$day_title}','{$day_notes}',now(), '{$student_id}', NULL, NULL) ";
    $create_post_query = mysqli_query($conn, $query);
    header('location: logbook.php');
    exit(0);
    // confirmQuery($create_post_query);
  }
  // wednesday input
  if (isset($_POST['create_post5'])) {
    global $conn;
    // $day_title = isset($_GET['mon_days']) ? $_GET['mon_days'] : '';
    // $day_title = isset($_POST['mon_days']) ? $_POST['mon_days'] : '';
    $day_title = $_POST['sat_day'];
    $week_title = $_POST['week_id'];
    $day_notes  = $_POST['sat_notes'];
    $student_id = $_SESSION['student_id'];
    $query = "INSERT INTO logbookdata(week_id, day_title, day_notes, created_at, student_id, leccomment, trainercomment) ";
    $query .=
      "VALUES({$week_title},'{$day_title}','{$day_notes}',now(), '{$student_id}', NULL, NULL) ";
    $create_post_query = mysqli_query($conn, $query);
    header('location: logbook.php');
    exit(0);
    // confirmQuery($create_post_query);
  }
  // remarks input
  if (isset($_POST['create_post6'])) {
    global $conn;
    // $day_title = isset($_GET['mon_days']) ? $_GET['mon_days'] : '';
    // $day_title = isset($_POST['mon_days']) ? $_POST['mon_days'] : '';
    $day_title = $_POST['remark'];
    $week_title = $_POST['week_id'];
    $day_notes  = $_POST['remarks_notes'];
    $student_id = $_SESSION['student_id'];
    $query = "INSERT INTO logbookdata(week_id, day_title, day_notes, created_at, student_id, leccomment, trainercomment) ";
    $query .=
      "VALUES({$week_title},'{$day_title}','{$day_notes}',now(), '{$student_id}', NULL, NULL) ";
    $create_post_query = mysqli_query($conn, $query);
    header('location: logbook.php');
    exit(0);
    // confirmQuery($create_post_query);
  }
  //lecturer remarks input
  if (isset($_POST['create_post7'])) {
    global $conn;
    // $day_title = isset($_GET['mon_days']) ? $_GET['mon_days'] : '';
    // $day_title = isset($_POST['mon_days']) ? $_POST['mon_days'] : '';
    $day_title = $_POST['lecremark'];
    $week_title = $_POST['week_id'];
    $day_notes  = $_POST['lec_remarks_notes'];
    $student_id = $_SESSION['student_id'];
    $query = "UPDATE  logbookdata SET leccomment = '{$day_notes}' , week_id = '{$week_title}' WHERE logbk_id = '27'";
    $create_post_query = mysqli_query($conn, $query);
    header('location: studentlogbook.php');
    exit(0);
    // confirmQuery($create_post_query);
  }
  ?>

  <!-- footer section -->


</body>

</html>
<script>
  function myFunction() {
    var x = document.getElementById("bld");
    var z = document.getElementById("hrt");
    var y = document.getElementById("cole");
    var a = document.getElementById("thal");
    var b = document.getElementById("wt");
    var c = document.getElementById("ht");
    var d = document.getElementById("rmk");
    var e = document.getElementById("mon");
    var f = document.getElementById("tue");
    var g = document.getElementById("wed");
    var h = document.getElementById("thur");
    var i = document.getElementById("fri");
    var j = document.getElementById("sat");
    var k = document.getElementById("remark");
    var sv2 = document.getElementById("btn_save1");
    var sv3 = document.getElementById("btn_save2");
    var sv4 = document.getElementById("btn_save3");
    var sv5 = document.getElementById("btn_save4");
    var sv6 = document.getElementById("btn_save5");
    var sv7 = document.getElementById("btn_save6");
    var sv8 = document.getElementById("btn_save7");
    if (x.style.display === "none") {
      h.style.display = "none";
      i.style.display = "none";
      j.style.display = "none";
      k.style.display = "none";
      f.style.display = "none";
      g.style.display = "none";
      x.style.display = "block";
      y.style.display = "none";
      e.style.display = "block";
      z.style.display = "none";
      a.style.display = "none";
      sv2.style.display = "block";
      b.style.display = "none";
      d.style.display = "none";
      sv6.style.display = "none";
      c.style.display = "none";
      sv7.style.display = "none";
      sv3.style.display = "none";
      sv4.style.display = "none";
      sv5.style.display = "none";
      sv8.style.display = "none";
    } else {
      h.style.display = "none";
      i.style.display = "none";
      j.style.display = "none";
      k.style.display = "none";
      g.style.display = "none";
      f.style.display = "none";
      x.style.display = "none";
      e.style.display = "none";
      a.style.display = "none";
      sv2.style.display = "none";
      y.style.display = "none";
      z.style.display = "none";
      b.style.display = "none";
      c.style.display = "none";
      sv7.style.display = "none";
      d.style.display = "none";
      sv8.style.display = "none";
      sv6.style.display = "none";
      sv3.style.display = "none";
      sv4.style.display = "none";
      sv5.style.display = "none";
    }
  }

  function myFunction1() {
    var h = document.getElementById("thur");
    var i = document.getElementById("fri");
    var j = document.getElementById("sat");
    var k = document.getElementById("remark");
    var g = document.getElementById("wed");
    var f = document.getElementById("tue");
    var d = document.getElementById("rmk");
    var a = document.getElementById("thal");
    var x = document.getElementById("cole");
    var y = document.getElementById("bld");
    var z = document.getElementById("hrt");
    var b = document.getElementById("wt");
    var c = document.getElementById("ht");
    var e = document.getElementById("mon");
    var sv2 = document.getElementById("btn_save1");
    var sv3 = document.getElementById("btn_save2");
    var sv4 = document.getElementById("btn_save3");
    var sv5 = document.getElementById("btn_save4");
    var sv6 = document.getElementById("btn_save5");
    var sv7 = document.getElementById("btn_save6");
    var sv8 = document.getElementById("btn_save7");
    if (x.style.display === "none") {
      h.style.display = "none";
      i.style.display = "none";
      j.style.display = "none";
      k.style.display = "none";
      g.style.display = "none";
      f.style.display = "block";
      x.style.display = "block";
      y.style.display = "none";
      e.style.display = "none";
      z.style.display = "none";
      a.style.display = "none";
      b.style.display = "none";
      sv4.style.display = "none";
      c.style.display = "none";
      sv7.style.display = "none";
      sv3.style.display = "block";
      sv2.style.display = "none";
      sv5.style.display = "none";
      sv6.style.display = "none";
      d.style.display = "none";
      sv8.style.display = "none";
    } else {
      h.style.display = "none";
      i.style.display = "none";
      j.style.display = "none";
      k.style.display = "none";
      g.style.display = "none";
      f.style.display = "none";
      e.style.display = "none";
      x.style.display = "none";
      y.style.display = "none";
      a.style.display = "none";
      b.style.display = "none";
      z.style.display = "none";
      c.style.display = "none";
      sv7.style.display = "none";
      sv4.style.display = "none";
      sv3.style.display = "none";
      sv2.style.display = "none";
      sv5.style.display = "none";
      sv6.style.display = "none";
      d.style.display = "none";
      sv8.style.display = "none";
    }
  }

  function myFunction2() {
    var h = document.getElementById("thur");
    var i = document.getElementById("fri");
    var j = document.getElementById("sat");
    var k = document.getElementById("remark");
    var g = document.getElementById("wed");
    var f = document.getElementById("tue");
    var d = document.getElementById("rmk");
    var a = document.getElementById("thal");
    var x = document.getElementById("hrt");
    var y = document.getElementById("bld");
    var z = document.getElementById("cole");
    var b = document.getElementById("wt");
    var c = document.getElementById("ht");
    var e = document.getElementById("mon");
    var sv4 = document.getElementById("btn_save3")
    var sv2 = document.getElementById("btn_save1");
    var sv3 = document.getElementById("btn_save2");
    var sv5 = document.getElementById("btn_save4");
    var sv6 = document.getElementById("btn_save5");
    var sv7 = document.getElementById("btn_save6");
    var sv8 = document.getElementById("btn_save7");
    if (x.style.display === "none") {
      h.style.display = "none";
      i.style.display = "none";
      j.style.display = "none";
      k.style.display = "none";
      g.style.display = "block";
      f.style.display = "none";
      x.style.display = "block";
      sv4.style.display = "block";
      z.style.display = "none";
      e.style.display = "none";
      sv2.style.display = "none";
      y.style.display = "none";
      sv3.style.display = "none";
      sv5.style.display = "none";
      a.style.display = "none";
      b.style.display = "none";
      sv6.style.display = "none";
      c.style.display = "none";
      sv7.style.display = "none";
      d.style.display = "none";
      sv8.style.display = "none";
    } else {
      h.style.display = "none";
      i.style.display = "none";
      j.style.display = "none";
      k.style.display = "none";
      g.style.display = "none";
      f.style.display = "none";
      x.style.display = "none";
      sv4.style.display = "none";
      y.style.display = "none";
      e.style.display = "none";
      sv2.style.display = "none";
      z.style.display = "none";
      sv3.style.display = "none";
      a.style.display = "none";
      sv5.style.display = "none";
      b.style.display = "none";
      sv6.style.display = "none";
      c.style.display = "none";
      sv7.style.display = "none";
      d.style.display = "none";
      sv8.style.display = "none";
    }
  }

  function myFunction3() {
    var h = document.getElementById("thur");
    var i = document.getElementById("fri");
    var j = document.getElementById("sat");
    var k = document.getElementById("remark");
    var g = document.getElementById("wed");
    var f = document.getElementById("tue");
    var d = document.getElementById("rmk");
    var e = document.getElementById("mon");
    var x = document.getElementById("thal");
    var sv5 = document.getElementById("btn_save4");
    var a = document.getElementById("hrt");
    var y = document.getElementById("bld");
    var z = document.getElementById("cole");
    var b = document.getElementById("wt");
    var c = document.getElementById("ht");
    var sv4 = document.getElementById("btn_save3")
    var sv2 = document.getElementById("btn_save1");
    var sv3 = document.getElementById("btn_save2");
    var sv6 = document.getElementById("btn_save5");
    var sv7 = document.getElementById("btn_save6");
    var sv8 = document.getElementById("btn_save7");
    if (x.style.display === "none") {
      h.style.display = "block";
      i.style.display = "none";
      j.style.display = "none";
      k.style.display = "none";
      g.style.display = "none";
      f.style.display = "none";
      x.style.display = "block";
      y.style.display = "none";
      e.style.display = "none";
      z.style.display = "none";
      a.style.display = "none";
      sv3.style.display = "none";
      b.style.display = "none";
      sv6.style.display = "none";
      sv4.style.display = "none";
      sv5.style.display = "block";
      sv2.style.display = "none";
      sv6.style.display = "none";
      sv7.style.display = "none";
      c.style.display = "none";
      d.style.display = "none";
      sv8.style.display = "none";
    } else {
      h.style.display = "none";
      i.style.display = "none";
      j.style.display = "none";
      k.style.display = "none";
      g.style.display = "none";
      f.style.display = "none";
      e.style.display = "none";
      x.style.display = "none";
      y.style.display = "none";
      z.style.display = "none";
      a.style.display = "none";
      b.style.display = "none";
      sv3.style.display = "none";
      sv4.style.display = "none";
      sv5.style.display = "none";
      sv2.style.display = "none";
      sv6.style.display = "none";
      sv7.style.display = "none";
      c.style.display = "none";
      d.style.display = "none";
      sv8.style.display = "none";
    }
  }

  function myFunction4() {
    var h = document.getElementById("thur");
    var i = document.getElementById("fri");
    var j = document.getElementById("sat");
    var k = document.getElementById("remark");
    var g = document.getElementById("wed");
    var f = document.getElementById("tue");
    var e = document.getElementById("mon");
    var d = document.getElementById("rmk");
    var x = document.getElementById("wt");
    var y = document.getElementById("bld");
    var z = document.getElementById("hrt");
    var a = document.getElementById("cole");
    var b = document.getElementById("thal");
    var c = document.getElementById("ht");
    var sv2 = document.getElementById("btn_save1");
    var sv3 = document.getElementById("btn_save2");
    var sv4 = document.getElementById("btn_save3");
    var sv5 = document.getElementById("btn_save4");
    var sv6 = document.getElementById("btn_save5");
    var sv7 = document.getElementById("btn_save6");
    var sv8 = document.getElementById("btn_save7");
    if (x.style.display === "none") {
      h.style.display = "none";
      i.style.display = "block";
      j.style.display = "none";
      k.style.display = "none";
      g.style.display = "none";
      f.style.display = "none";
      x.style.display = "block";
      y.style.display = "none";
      e.style.display = "none";
      z.style.display = "none";
      a.style.display = "none";
      b.style.display = "none";
      c.style.display = "none";
      sv3.style.display = "none";
      sv4.style.display = "none";
      sv5.style.display = "none";
      sv6.style.display = "block";
      sv2.style.display = "none";
      sv7.style.display = "none";
      d.style.display = "none";
      sv8.style.display = "none";
    } else {
      h.style.display = "none";
      i.style.display = "none";
      j.style.display = "none";
      k.style.display = "none";
      g.style.display = "none";
      f.style.display = "none";
      x.style.display = "none";
      y.style.display = "none";
      z.style.display = "none";
      e.style.display = "none";
      a.style.display = "none";
      b.style.display = "none";
      c.style.display = "none";
      sv3.style.display = "none";
      sv4.style.display = "none";
      sv5.style.display = "none";
      sv6.style.display = "none";
      sv2.style.display = "none";
      sv7.style.display = "none";
      d.style.display = "none";
      sv8.style.display = "none";
    }
  }

  function myFunction5() {
    var h = document.getElementById("thur");
    var i = document.getElementById("fri");
    var j = document.getElementById("sat");
    var k = document.getElementById("remark");
    var g = document.getElementById("wed");
    var f = document.getElementById("tue");
    var d = document.getElementById("rmk");
    var e = document.getElementById("mon");
    var x = document.getElementById("ht");
    var y = document.getElementById("bld");
    var z = document.getElementById("hrt");
    var a = document.getElementById("cole");
    var b = document.getElementById("thal");
    var c = document.getElementById("wt");
    var sv2 = document.getElementById("btn_save1");
    var sv3 = document.getElementById("btn_save2");
    var sv4 = document.getElementById("btn_save3");
    var sv5 = document.getElementById("btn_save4");
    var sv6 = document.getElementById("btn_save5");
    var sv7 = document.getElementById("btn_save6");
    var sv8 = document.getElementById("btn_save7");
    if (x.style.display === "none") {
      h.style.display = "none";
      i.style.display = "none";
      j.style.display = "block";
      k.style.display = "none";
      g.style.display = "none";
      f.style.display = "none";
      x.style.display = "block";
      y.style.display = "none";
      e.style.display = "none";
      z.style.display = "none";
      a.style.display = "none";
      b.style.display = "none";
      c.style.display = "none";
      sv3.style.display = "none";
      sv4.style.display = "none";
      sv5.style.display = "none";
      sv6.style.display = "none";
      sv7.style.display = "block";
      sv2.style.display = "none";
      d.style.display = "none";
      sv8.style.display = "none";
    } else {
      h.style.display = "none";
      i.style.display = "none";
      j.style.display = "none";
      k.style.display = "none";
      g.style.display = "none";
      f.style.display = "none";
      x.style.display = "none";
      y.style.display = "none";
      z.style.display = "none";
      e.style.display = "none";
      a.style.display = "none";
      b.style.display = "none";
      c.style.display = "none";
      sv3.style.display = "none";
      sv4.style.display = "none";
      sv5.style.display = "none";
      sv6.style.display = "none";
      sv7.style.display = "none";
      sv2.style.display = "none";
      d.style.display = "none";
      sv8.style.display = "none";

    }
  }

  function myFunction6() {
    var h = document.getElementById("thur");
    var i = document.getElementById("fri");
    var j = document.getElementById("sat");
    var k = document.getElementById("remark");
    var g = document.getElementById("wed");
    var f = document.getElementById("tue");
    var r = document.getElementById("rmk");
    var x = document.getElementById("bld");
    var z = document.getElementById("hrt");
    var y = document.getElementById("cole");
    var a = document.getElementById("thal");
    var b = document.getElementById("wt");
    var c = document.getElementById("ht");
    var e = document.getElementById("mon");
    var sv2 = document.getElementById("btn_save1");
    var sv3 = document.getElementById("btn_save2");
    var sv4 = document.getElementById("btn_save3");
    var sv5 = document.getElementById("btn_save4");
    var sv6 = document.getElementById("btn_save5");
    var sv7 = document.getElementById("btn_save6");
    var sv8 = document.getElementById("btn_save7");
    if (r.style.display === "none") {
      h.style.display = "none";
      i.style.display = "none";
      j.style.display = "none";
      k.style.display = "block";
      g.style.display = "none";
      f.style.display = "none";
      r.style.display = "block";
      e.style.display = "none";
      x.style.display = "none";
      y.style.display = "none";
      z.style.display = "none";
      a.style.display = "none";
      sv2.style.display = "none";
      b.style.display = "none";
      // d.style.display = "none";
      sv6.style.display = "none";
      c.style.display = "none";
      sv7.style.display = "none";
      sv3.style.display = "none";
      sv4.style.display = "none";
      sv5.style.display = "none";
      sv8.style.display = "block";
    } else {
      h.style.display = "none";
      i.style.display = "none";
      j.style.display = "none";
      k.style.display = "none";
      g.style.display = "none";
      f.style.display = "none";
      e.style.display = "none";
      r.style.display = "none";
      x.style.display = "none";
      a.style.display = "none";
      sv2.style.display = "none";
      y.style.display = "none";
      z.style.display = "none";
      b.style.display = "none";
      c.style.display = "none";
      sv7.style.display = "none";
      // d.style.display = "none";
      sv8.style.display = "none";
      sv6.style.display = "none";
      sv3.style.display = "none";
      sv4.style.display = "none";
      sv5.style.display = "none";
    }
  }

  function myFunction7() {
    var h = document.getElementById("thur");
    var i = document.getElementById("fri");
    var j = document.getElementById("sat");
    var k = document.getElementById("remark");
    var m = document.getElementById("lecremark");
    var g = document.getElementById("wed");
    var f = document.getElementById("tue");
    var r = document.getElementById("rmk");
    var n = document.getElementById("lrmk");
    var x = document.getElementById("bld");
    var z = document.getElementById("hrt");
    var y = document.getElementById("cole");
    var a = document.getElementById("thal");
    var b = document.getElementById("wt");
    var c = document.getElementById("ht");
    var e = document.getElementById("mon");
    var sv2 = document.getElementById("btn_save1");
    var sv3 = document.getElementById("btn_save2");
    var sv4 = document.getElementById("btn_save3");
    var sv5 = document.getElementById("btn_save4");
    var sv6 = document.getElementById("btn_save5");
    var sv7 = document.getElementById("btn_save6");
    var sv8 = document.getElementById("btn_save7");
    var sv9 = document.getElementById("btn_save8");
    if (r.style.display === "none") {
      h.style.display = "none";
      i.style.display = "none";
      j.style.display = "none";
      k.style.display = "none";
      m.style.display = "block";
      g.style.display = "none";
      f.style.display = "none";
      r.style.display = "none";
      n.style.display = "block";
      e.style.display = "none";
      x.style.display = "none";
      y.style.display = "none";
      z.style.display = "none";
      a.style.display = "none";
      sv2.style.display = "none";
      b.style.display = "none";
      // d.style.display = "none";
      sv6.style.display = "none";
      c.style.display = "none";
      sv7.style.display = "none";
      sv3.style.display = "none";
      sv4.style.display = "none";
      sv5.style.display = "none";
      sv8.style.display = "none";
      sv9.style.display = "block";
    } else {
      h.style.display = "none";
      i.style.display = "none";
      j.style.display = "none";
      k.style.display = "none";
      m.style.display = "none";
      g.style.display = "none";
      f.style.display = "none";
      e.style.display = "none";
      r.style.display = "none";
      n.style.display = "none";
      x.style.display = "none";
      a.style.display = "none";
      sv2.style.display = "none";
      y.style.display = "none";
      z.style.display = "none";
      b.style.display = "none";
      c.style.display = "none";
      sv7.style.display = "none";
      // d.style.display = "none";
      sv8.style.display = "none";
      sv6.style.display = "none";
      sv3.style.display = "none";
      sv4.style.display = "none";
      sv5.style.display = "none";
      sv9.style.display = "none";
    }
  }
</script>