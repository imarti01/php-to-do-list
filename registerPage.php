<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
</head>

<body>
    <header>
        <h1>To-Do List</h1>
    </header>

    <?php
    if (isset($_GET['error'])) {
        echo "<div><h3>Passwords don't match</h3></div>";
    }
    ?>

    <h2>Register</h2>
    <form action="./modules/register.php" method="post">
        <label>
            Email:
            <input type="email" name="email">
        </label>
        <label>
            Username:
            <input type="text" name="username">
        </label>
        <label>
            Password:
            <input type="password" name="password">
        </label>
        <label>
            Confirm Password:
            <input type="password" name="confirmPassword">
        </label>
        <button>Submit</button>
    </form>
    <p><a href="loginPage.php">LoginPage</a></p>

</body>

</html>