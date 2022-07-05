<?php
if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
    header("location: ../index.php?illegal-activities");
    exit();
}
spl_autoload_register('AutoLoader');

function AutoLoader($className){
    $path = "backend/";
    $extension = "class.php";
    $fullPath = $path . $className . $extension;

    include_once $fullPath;
}