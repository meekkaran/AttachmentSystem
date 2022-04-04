<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="templates/style1.css">
</head>

<body>

    <div class="article">
        <form action="index.php" method="post">
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