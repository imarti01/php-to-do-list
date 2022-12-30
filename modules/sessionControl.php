<?php

function userRegister()
{
    $newUser = new stdClass();
    $newUser->email =  $_REQUEST['email'];
    $newUser->username = $_REQUEST['username'];
    $newUser->password = $_REQUEST['password'];
    $newUser->tasksArr = [];

    $data = file_get_contents("users.json");
    $users = json_decode($data, true);

    if ($_REQUEST['password'] !== $_REQUEST['confirmPassword']) {
        header("Location: ../registerPage.php?error=incorrectPassword");
    } else {
        if (count($users) > 0) {
            foreach ($users as $user) {
                if ($user['email'] === $newUser->email) {
                    $newUser->isRegistered = true;
                }
            }
        }
        if ($newUser->isRegistered) {
            header("Location: ../loginPage.php?error=alreadyRegistered");
        } else {
            array_push($users, $newUser);
            $newArrUsers = json_encode($users);
            $fileUsers = 'users.json';
            file_put_contents($fileUsers, $newArrUsers);
            header("Location:../loginPage.php?Message=registerOk");
        }
    }
}

function userLogin()
{
    session_start();

    $data = file_get_contents("users.json");
    $users = json_decode($data, true);

    foreach ($users as $idx => $user) {
        if ($user['email'] === $_REQUEST['email'] && $user['password'] === $_REQUEST['password']) {
            $_SESSION['currentUser'] = $idx;
        }
    }
    if (isset($_SESSION['currentUser'])) {
        header("Location:../index.php");
    } else {
        header("Location:../loginPage.php?error=incorrectEmailOrPassword");
    }
}

function showTasks()
{
    $currentUser = $_SESSION['currentUser'];

    $data = file_get_contents("./modules/users.json");
    $users = json_decode($data, true);

    if (count($users[$currentUser]['tasksArr']) > 0) {
        $tasks = $users[$currentUser]['tasksArr'];

        foreach ($tasks as $idx => $task) {
            echo "<form action='modules/deleteTask.php'>";
            echo "<p>$task</p>";
            echo "<input type='hidden' name=$idx value=$task>";
            echo "<button type=submit>Delete</button>";
            echo "</form>";
        }
    }
}

function addNewTask()
{
    session_start();
    $currentUser = $_SESSION['currentUser'];

    $data = file_get_contents("users.json");
    $users = json_decode($data, true);

    $tasksArr = [];
    $newTask = $_REQUEST['task'];

    if (count($users[$currentUser]['tasksArr']) > 0) {
        $tasksArr = $users[$currentUser]['tasksArr'];
        array_push($tasksArr, $newTask);
        $users[$currentUser]['tasksArr'] = $tasksArr;
    } else {
        array_push($tasksArr, $newTask);
        $users[$currentUser]['tasksArr'] = $tasksArr;
    }

    $newArrUsers = json_encode($users);
    $fileUsers = 'users.json';
    file_put_contents($fileUsers, $newArrUsers);

    header("Location: ../index.php");
}

function deleteTask()
{
    session_start();
    $currentUser = $_SESSION['currentUser'];

    $data = file_get_contents("users.json");
    $users = json_decode($data, true);

    $tasksArr = $users[$currentUser]['tasksArr'];
    $keyOfTaskToDelete = key($_REQUEST);

    unset($tasksArr[$keyOfTaskToDelete]);

    $users[$currentUser]['tasksArr'] = $tasksArr;

    $newArrUsers = json_encode($users);
    $fileUsers = 'users.json';
    file_put_contents($fileUsers, $newArrUsers);

    header("Location: ../index.php");
}
