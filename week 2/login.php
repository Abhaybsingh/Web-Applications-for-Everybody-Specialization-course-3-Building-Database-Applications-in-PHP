<?php
require_once "pdo.php";

$failure = false;

if ( isset($_POST['email']) && isset($_POST['password']) ) {
    if ( strlen($_POST['email']) < 1 || 
        strlen($_POST['password']) < 1 ) {
        $failure = "User name and password are required";
    } 
    else {
        $sql = "SELECT name FROM users WHERE email = :em AND password = :pw";
    
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute(array(
            ':em' => $_POST['email'],
            ':pw' => $_POST['password']));
    
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ( $row === FALSE ) {
            $failure = "Login incorrect";
        } 
        else {
            $failure = "Login success";
            header("Location: autos.php?name=".urlencode($_POST['email']));
            return;
        }
    }
}

if ( isset($_POST['cancel'] ) ) {
    header("Location: index.php");
    return;
}

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <title>Abhay Singh Login Page</title>
</head>
<body>
    <div class="container">
        <h1>Please Log In</h1>
        <?php
            if ( $failure !== false ) {
                echo('<p style="color: red;">'.htmlentities($failure)."</p>\n");
            }
        ?>
        <form method="post">
            <label>User Name</label>
            <input type="text" name="name"><br/>
            <label>Password</label>
            <input type="text" name="password"><br/>

            <!-- <p>Email:<input type="text" size="40" name="email"></p>
            <p>Password:<input type="text" size="40" name="password"></p> -->
            <input type="submit" value="Login"/>
            <input type="submit" name="cancel" value="Cancel">
        </form>
        <p>
        For a password hint, view source and find a password hint
        in the HTML comments.
        </p>
    <div>
</body>
</html>