<?php

session_start();

$tasksArr = [];
$newTask = $_REQUEST['task'];

if (isset($_SESSION["tasksArr"])) {
    $tasksArr = $_SESSION['tasksArr'];
    array_push($tasksArr, $newTask);
    $_SESSION["tasksArr"] = $tasksArr;
    print_r($tasksArr);
    print_r($_SESSION['tasksArr']);
} else {
    array_push($tasksArr, $newTask);
    $_SESSION['tasksArr'] = $tasksArr;
    print_r($tasksArr);
}

header("Location: ../index.php");
