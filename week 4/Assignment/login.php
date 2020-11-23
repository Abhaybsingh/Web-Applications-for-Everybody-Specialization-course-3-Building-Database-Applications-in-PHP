<?php 
require_once "pdo.php";

session_start();
if (isset($_POST['cancel'])) {
    // Redirect the browser to game.php
    header("Location: index.php");
    return;
}

$salt = 'XyZzy12*_';    
$stored_hash = hash('md5', 'XyZzy12*_php123');;  // Pw is meow123

$error= false;
// $success = false;

// Check to see if we have some POST data, if we do process it
if (isset($_POST['email']) && isset($_POST['pass'])) {
    if (strlen($_POST['email']) < 1 || strlen($_POST['pass']) < 1) {
        $_SESSION['error'] = "User name and password are required";
    }
    else if (strpos($_POST['email'], "@") === false) {
            $_SESSION['error'] = "Email must have an at-sign (@)";
            header("Location: login.php");
            return;
    }   
    else {
        $check = hash('md5', $salt . $_POST['pass']);
        if ($check == $stored_hash) {
            error_log("Login success ".$_POST['email']);
            // Redirect the browser to game.php
            $_SESSION['name'] = $_POST['email'];
            // header("Location: view.php?name=".urlencode($_POST['email']));
            header("Location: view.php");
            return;
        } else {
            $_SESSION['error'] = "Incorrect password";
            error_log("Login fail ".$_POST['email']." $check");
            header("Location: login.php");
            return;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <?php require_once "bootstrap.php"; ?>
    <title>Abhay Singh Login Page</title>
</head>
<body style="font-family: sans-serif;">
<div class="container">
    <h1>Please Log In</h1>
    <?php
    if ( isset($_SESSION['error']) ) {
        echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
        unset($_SESSION['error']);
    }

    // if ( isset($_SESSION['success']) ) {
    //     echo('<p style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
    //     unset($_SESSION['success']);
    // }
    ?>
    <form method="POST">
        <!-- <label >Email : </label>
        <input type="text" name="email"><br/>
        <label >Password : </label>
        <input type="text" name="password"><br/>
        <input type="submit" value="Log In"> -->
        <!-- <input type="submit" name="cancel" value="Cancel"> -->
        <!-- <input type="submit" name="cancel" value="Cancel"> -->
        <!-- <a href="index.php">Cancel</a> -->
        <label for="email">Email</label>
        <input type="text" name="email" id="email"><br/>
        <label for="id_1723">Password</label>
        <input type="text" name="pass" id="id_1723"><br/>
        <input type="submit" value="Log In">
        <input type="submit" name="cancel" value="Cancel">
    </form>
</div>
</body>