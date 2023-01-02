<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="assets/css/style.css?<?php echo time(); ?>">
</head>

<body>
    <header>
        <h1>To-Do List</h1>
    </header>


    <main>
        <div class="form-login">
            <h2>Login</h2>
            <?php
            if (isset($_GET['error'])) {
                $errorMessage = $_GET['error'];

                if ($errorMessage === "alreadyRegistered") {
                    echo "<h3 class='error-alert'>A user already exists with this email!</h3>";
                } elseif ($errorMessage === "incorrectEmailOrPassword") {
                    echo "<h3 class='error-alert'>Verify that your e-mail & the password are valid!</h3>";
                }
            }
            ?>
            <form action="./modules/login.php" method="post">
                <label>Email:
                    <input type="email" name="email" required>
                </label>
                <label>Password:
                    <input type="password" name="password" required>
                </label>
                <button>Submit</button>
            </form>
            <p><a href="registerPage.php">Register Page</a></p>
        </div>
    </main>
</body>

</html>