<?php include('db.php')?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <div class="container">
        <h2>Welcome!</h2>
        <form method="POST" action="login.php">
            <label>Username:</label>
            <br/>
            <i class='fas fa-user'></i>
            <input class="form" type="text" name="username" placeholder="Enter username or email address" value="<?php echo $username?>"/>
            <br/>
            <label>Password:</label>
            <br/>
            <i class='fas fa-lock'></i>
            <input class="form" type="password" name="password" placeholder="Enter your password"/>
            <br/>
            <button class="btnSubmit" type="submit" name="login">Sign in</button>
        </form>
        <?php include('errors.php') ?>
        <a href="registration.php">Not registered yet?</a>
    </div>
    <script src="https://kit.fontawesome.com/78ed2231e4.js"></script>
</body>
</html>