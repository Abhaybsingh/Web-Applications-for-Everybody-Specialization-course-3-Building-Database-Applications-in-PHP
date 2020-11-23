<?php
session_start();

if (!isset($_SESSION['name'])) {
    die("Not logged in");
}

require_once "pdo.php";

// $failure = false;
// $success = false;


if (isset($_POST['cancel'])) {
    // Redirect the browser to game.php
    header("Location: index.php");
    return;
}

// when logging in without permission
// if (!isset($_GET['name'])) {
//     die("Name parameter missing");
// }
// when logout button is pressed
//  elseif (isset($_POST['logout']) && $_POST['logout'] == 'Logout') {
//     header('Location: index.php');
// }
// when all data is entered

if (isset($_POST['make']) && isset($_POST['year'])
    && isset($_POST['mileage'])) {
    // check if the year and mileage entred were numeric
    if (!is_numeric($_POST['year']) || !is_numeric($_POST['mileage'])) {
        // $failure = 'Mileage and year must be numeric';
        $_SESSION['error'] = "Mileage and year must be numeric";
        header("Location: add.php");
        return;
    }
    // check if make is entered
     elseif (strlen($_POST['make']) < 1 ) {
        // $failure = 'Make is required';
        $_SESSION['error'] = "Make is required";
        header("Location: add.php");
        return;
    } else {
        // performimg insert statement for adding the values into the database
        $stmt = $pdo->prepare('INSERT INTO autos (make, year, mileage) VALUES ( :make, :year, :mileage)');
        $stmt->execute(array(
                ':make' => $_POST['make'],
                ':year' => $_POST['year'],
                ':mileage' => $_POST['mileage'])
        );
        // $success = 'Record inserted';
        $_SESSION['success'] = "Record inserted";
        header("Location: view.php");
        return;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <?php require_once "bootstrap.php"; ?>
    <title>Abhay Singh Login Page</title>
</head>
<body>
<div class="container">
    <h1>Tracking Autos for <?php echo $_SESSION['name']; ?></h1>
    <?php
    // if ($failure !== false) {
    //     // Look closely at the use of single and double quotes
    //     echo('<p style="color: red;">' . htmlentities($failure) . "</p>\n");
    // }
    // if ($success !== true) {
    //     // Look closely at the use of single and double quotes
    //     echo('<p style="color: green;">' . htmlentities($success) . "</p>\n");
    // }

    if (isset($_SESSION['error'])) {
        echo('<p style="color: red;">' . htmlentities($_SESSION['error']) . "</p>\n");
        unset($_SESSION['error']);
    }
    ?>
    <form method="post">
        <p>Make:
            <input type="text" name="make" size="60"/></p>
        <p>Year:
            <input type="text" name="year"/></p>
        <p>Mileage:
            <input type="text" name="mileage"/></p>
        <input type="submit" value="Add">
        <input type="submit" name="logout" value="Logout">
        <!-- <input type="submit" name="cancel" value="Cancel"> -->
    </form>    
</div>
</body>