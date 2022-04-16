<?php
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['trainername']);
    header("location: login.php");
}
