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
            <li>
                <a href="#" class="feat-btn">Students
                    <span class="show"> + </span>
                </a>
                <ul class="feat-show">
                    <li><a href="registeredstudents.php">View students</a></li>
                    <li><a href="#">View Submitted reports</a></li>
                    <li><a href="#">View E-logbooks</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="serv-btn">Lecturers
                    <span class="show1"> + </span>
                </a>
                <ul class="serv-show">
                    <li><a href="registeredlecturers">View Lecturers</a></li>
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
        
    </div>


</body>

</html>