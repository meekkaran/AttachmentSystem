<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES['file']['name'])) {
    $folder = 'uploads/';
    $threshold = count($_FILES['file']['name']);
    for ($i = 0; $i < $threshold; $i++) {
        $filename = $_FILES['file']['name'][$i];
        $path = $folder . $filename;
        if (strpos($filename, '.php') == true) {
            echo "Choose another FIle!";
        } elseif (strpos($filename, '.exe') == true) {
            echo "Choose another FIle!";
        } else {
            if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $path)) {
                echo "File " . $i . ' Uploaded Success! <br>';
            } else {
                echo "File $i Upload Failed! :/";
            };
        };
    };
};
