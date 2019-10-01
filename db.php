<?php

if(!isset($_SESSION)){
    session_start();
}

$serverName = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'registration-form';

$connection = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

$errors = array();
$username = '';
$email = '';

if(isset($_POST['register'])){

    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $password2 = mysqli_real_escape_string($connection, $_POST['password2']);

    if(empty($username)){
        array_push($errors, "Username can't be empty!");
    }
    if(empty($email)){
        array_push($errors, "Email is required");
    }
    if(empty($password) || empty($password2)){
        array_push($errors, "Please fill in both passwords");
    }

    if($password !== $password2){
        array_push($errors, "Passwords don't match!");
    }

    $sql = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1;";
    $result = mysqli_query($connection, $sql);
    $user = mysqli_fetch_assoc($result);

    if($user){
        if($user['username'] == $username){
            array_push($errors, "User with this username already exists");
        }
        if($user['email'] == $email){
            array_push($errors, "This email is already registered");
        } 
    }

    if(count($errors) == 0){
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword');";
    
        mysqli_query($connection, $sql);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('Location: index.php');
    }

}


if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    
    if(empty($username)){
        array_push($errors, "Username is required");
    }
    if(empty($password)){
        array_push($errors, "Password is required");
    }

    if(count($errors) == 0){
        $sql = "SELECT * FROM users WHERE username='$username' OR email='$username'";
        $results = mysqli_query($connection, $sql);

        if(mysqli_num_rows($results) == 1){

            if($row = mysqli_fetch_assoc($results)){
                $passwordCheck = password_verify($password, $row['password']);

                if($passwordCheck){
                    $_SESSION['username'] = $row['username'];
  	                $_SESSION['success'] = "You are now logged in";
  	                header('Location: index.php');
                } else {
                    array_push($errors, "Wrong password. Please try again");
                }
            }          
        }  else {
            array_push($errors, "This user is not found");
        }

    }

}