<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header>
        <h1>To-Do List</h1>
        <h2><a href="./modules/logout.php">Logout</a></h2>
    </header>
    <main>

        <form action="modules/addTask.php">
            <input type="text" name="task" placeholder="Add a new task">
            <button type="submit">Add</button>
        </form>
        <div>
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


    </main>
</body>

</html>