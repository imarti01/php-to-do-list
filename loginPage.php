<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>
    <header>
        <h1>To-Do List</h1>
    </header>

    <?php
    if (isset($_GET['error'])) {
        $errorMessage = $_GET['error'];

        if ($errorMessage === "alreadyRegistered") {
            echo "<div><h3>A user already exists with this email</h3></div>";
        } elseif ($errorMessage === "incorrectEmailOrPassword") {
            echo "<div><h3>Verify that your e-mail & the password are valid</h3></div>";
        }
    }
    ?>

    <h2>Login</h2>
    <form action="./modules/login.php" method="post">
        <input type="email" name="email">
        <input type="password" name="password">
        <button>Submit</button>
    </form>
    <p><a href="registerPage.php">registerPage</a></p>

</body>

</html>