<?php 
session_start();

if(!isset($_SESSION['username'])){
    header('Location: login.php');
}

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('Location: login.php');
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <div class="container">
        
        <?php if(isset($_SESSION['success'])){ ?>
            <p class="success"><?php echo $_SESSION['success']?></p>
            <?php unset($_SESSION['success']); ?>
        <?php } ?>
    
        <?php if(isset($_SESSION['username'])){ ?>
            <h2 class="userP">Welcome, <?php echo $_SESSION['username']?>!</h2>
            <img src="https://images.unsplash.com/photo-1533738363-b7f9aef128ce?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=675&q=80" alt="welcomeImage"/>
            <br/>
            <a href="index.php?logout=1" name="logout">Logout</a>
        <?php } ?>
        
    </div>
</body>
</html>