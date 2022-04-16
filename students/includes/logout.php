<?php


if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['student_id']);
    header("location: ../login.php");
}
