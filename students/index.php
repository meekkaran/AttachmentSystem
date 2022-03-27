<?php 
  session_start(); 

  if (!isset($_SESSION['admissionnumber'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['admissionnumber']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="templates/style1.css">
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="nav">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['admissionnumber'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['admissionnumber']; ?></strong></p>
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
        <form action="index.php" method="post">
            <h1>Assign Supervisors</h1>
            <label>Student</label>
            <select name="student" class="sel">
        <?php
        $db = mysqli_connect('localhost', 'root', '', 'supervisedb');
        $query = "SELECT * FROM students ";
        $select_all_students= mysqli_query($db,$query);
        // confirmQuery($select_all_categories);
        while($row = mysqli_fetch_assoc($select_all_students)) {
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
        $select_all_lecturers= mysqli_query($db,$query);
        // confirmQuery($select_all_categories);
        while($row = mysqli_fetch_assoc($select_all_lecturers)) {
        $stud_id = $row['lec_id'];
        $name = $row['name'];
        echo "<option value='{$stud_id}'>{$name}</option>";
        }
        ?>
        </select>
        <br>
        <hr>
        <input type="submit" value="Save Changes" name="save_assigned" />
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
</body>
</html>