<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="assets/css/style.css?<?php echo time(); ?>">
</head>

<body class="index-page">
    <header>
        <h1>To-Do List</h1>
        <button><a href="./modules/logout.php">Logout ⇰</a></button>
    </header>
    <main>
        <div class="container-index-page">
            <form action="modules/addTask.php" class="form-add-todo">
                <input type="text" name="task" placeholder="Add a new task" class="input-add-class">
                <button type="submit">Add</button>
            </form>
            <div class="div-show-todos">
                <?php
                session_start();
                if (isset($_SESSION['currentUser'])) {
                    require_once("modules/sessionControl.php");
                    showTasks();
                } else {
                    header("Location: loginPage.php");
                }
                ?>
            </div>
        </div>


    </main>
</body>

</html>