<?php

session_start();
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['role_id']);
    header("location: ../login.php");
}
