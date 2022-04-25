<?php
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
// if ($conn) {
//     echo "we are connected";
// }
