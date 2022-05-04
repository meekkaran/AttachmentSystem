<?php
session_start();
ob_start();

if (!isset($_SESSION['student_id'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['student_id']);
    header("location: login.php");
}

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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="templates/logbook_style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="./templates/reports.css" />
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
                <li id="firstname"><span style="color:rgb(255, 198, 0);font-size:1.1em"><em>Welcome,</em>&nbsp; </span><span style="font-family:serif">
                        <?php echo $_SESSION['name']; ?></span>
                </li>
            </ul>
        </div>
    </header>
    <form method="post" enctype="multipart/form-data">
        <div class="submitreportbody">
            <h1 style="text-align: center">Upload Report</h1>
            <label>Title</label>
            <input type="text" name="title">
            <label>File Upload</label>
            <input type="File" name="file">
            <input type="submit" name="submit">
            <h4 style="text-align: center"><strong style="color: #E13F41">Please Ensure That your report is in a Microsoft Word format with your index number as its name before uploading it</strong></h4>
            <h4 style="text-align: center">Any work not in Microsoft Word format would be discarded </h4>
        </div>
    </form>

    <?php
    if (isset($_POST["submit"])) {
        #retrieve file title
        $title = $_POST["title"];

        #file name with a random number so that similar dont get replaced
        $pname = rand(1000, 10000) . "-" . $_FILES["file"]["name"];

        #temporary file name to store file
        $tname = $_FILES["files"]["tmp_name"];

        #upload directory path
        $uploads_dir = "/images";

        #to move uploaded file to specific location
        move_uploaded_file($tname, $uploads_dir . '/' . $pname);

        $student_id = $_SESSION['student_id'];
        #sql query to insert into database
        $sql = "INSERT into fileup(title,report,student_id,posted_at) VALUES('$title','$pname', '$student_id',now())";

        if (mysqli_query($conn, $sql)) {
            echo "File Successfully Uploaded";
        } else {
            echo "Error when uploading report";
        }
    }
    ?>

    <!-- footer section -->

    <footer>
        <div class="main-content">
            <div class="left box">
                <h2>Lang'ata Campus</h2>
                <div class="content">
                    <p>P.O BOX 62157-00200 <br />Nairobi, Kenya</p>
                    <p>Email: admissions@cuea.edu</p>
                    <p>Mobile: (+254) (0) 709-691000</p> <br />
                    <p>Bogani East Road, off Magadi Road, Next to Galleria Mall, 23km from the Jomo Kenyatta International Airport in Nairobi, Kenya.</p>
                </div>
            </div>

            <div class="center box">
                <h2>Gaba Campus</h2>
                <div class="content">
                    <p>P.O BOX 908-30100<br />Eldoret, Kenya</p>
                    <p>SMS: +(254) (0) 729 742-791</p>
                    <p>Email: registrygaba@cuea.edu</p>
                    <p>Mobile: +(254) (0) 728 458-276</p> <br />
                    <p>Kisumu Road, next to Eldoret Polytechnic, 12km fromm the Eldoret Interntional Airport in Eldoret, Kenya.</p>
                </div>
            </div>

            <div class="right box">
                <h2>Contact us</h2>
                <div class="content">
                    <a href="#">LinkedIn</a><br />
                    <a href="#">Twitter</a><br />
                    <a href="#">Facebook</a><br />
                    <a href="#">YouTube</a><br />
                    <a href="#">Instagram</a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>