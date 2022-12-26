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
    </header>
    <main>

        <form action="modules/addTask.php">
            <input type="text" name="task" placeholder="Add a new task">
            <button type="submit">Add</button>
        </form>
        <div>
            <?php
            session_start();

            if (isset($_SESSION['tasksArr'])) {
                $tasks = $_SESSION['tasksArr'];

                foreach ($tasks as $idx => $task) {
                    echo "<form action='modules/deleteTask.php'>";
                    echo "<p>$task</p>";
                    echo "<input type='hidden' name=$idx value=$task>";
                    echo "<button type=submit>Delete</button>";
                    echo "</form>";
                }
            }

            ?>
        </div>


    </main>
</body>

</html>