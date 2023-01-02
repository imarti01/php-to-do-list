<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="assets/css/style.css?<?php echo time(); ?>">
</head>

<body>
    <header>
        <h1>To-Do List</h1>
    </header>


    <main>
        <div class="form-login form-register">
            <h2>Register</h2>
            <?php
            if (isset($_GET['error'])) {
                echo "<h3 class='error-alert-register'>Passwords don't match!</h3>";
            }
            ?>
            <form action="./modules/register.php" method="post">
                <label>
                    Email:
                    <input type="email" name="email" required>
                </label>
                <label>
                    Username:
                    <input type="text" name="username" required>
                </label>
                <label>
                    Password:
                    <input type="password" name="password" required>
                </label>
                <label>
                    Confirm Password:
                    <input type="password" name="confirmPassword" required>
                </label>
                <button>Submit</button>
            </form>
            <p><a href="loginPage.php">Login Page</a></p>
        </div>
    </main>
</body>

</html>