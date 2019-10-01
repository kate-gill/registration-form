<?php include('db.php')?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <div class="container">
        <form method="POST" aciton="registration.php">
            <label>Username:</label>
            <br/>
            <i class='fas fa-user'></i>
            <input class="form" type="text" name="username" placeholder="Username" value="<?php echo $username?>"/>
            <br/>        
            <label>Email:</label>
            <br/>
            <i class="fa fa-envelope-open"></i>
            <input class="form" type="text" name="email" placeholder="Email" value="<?php echo $email?>"/>
            <br/>
            <label>Password:</label>
            <br/>
            <i class='fas fa-lock'></i>
            <input class="form" type="password" name="password" placeholder="Password"/>
            <br/>
            <label>Please repeat password:</label>
            <br/>
            <i class='fas fa-user-lock'></i>
            <input class="form" type="password" name="password2" placeholder="Please repeat password"/>
            <br/>
            <button class="btnSubmit" type="submit" name="register">Sign up</button>
        </form>
        <?php include('errors.php')?>
        <a href="login.php">Already a member?</a>
    </div>
    <script src="https://kit.fontawesome.com/78ed2231e4.js"></script>
</body>
</html>