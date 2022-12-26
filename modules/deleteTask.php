<?php
session_start();

$tasksArrSession = $_SESSION['tasksArr'];
$keyOfTaskToDelete = key($_REQUEST);

unset($tasksArrSession[$keyOfTaskToDelete]);

$_SESSION['tasksArr'] = $tasksArrSession;

header("Location: ../index.php");
