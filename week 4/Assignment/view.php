<?php
session_start();
require_once "pdo.php";

// $failure = false;
// $success = false;

// when logging in without permission
// if (!isset($_GET['name'])) {
//     die("Name parameter missing");
// }

if ( ! isset($_SESSION['name']) ) {
    die('Not logged in');
}

// if ( isset($_SESSION['logout']) ) {
//     // die('Not logged in');
//     header("Location: logout.php");
// }

// when logout button is pressed
//  elseif (isset($_POST['logout']) && $_POST['logout'] == 'Logout') {
//     header('Location: index.php');
// }

// getting the first column of the database
$stmt = $pdo->query("SELECT make, year, mileage FROM autos");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

    if ( isset($_SESSION['success']) ) {
        echo('<p style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
        unset($_SESSION['success']);
        }
    ?>
    <!-- <input type="submit" name="logout" value="Logout"> -->
    <h2>Automobiles</h2>
    <ul>
        <?php
        // printing all rows of the database
        foreach ($rows as $row) {
            echo '<li>';
            echo htmlentities($row['make']) . ' ' . $row['year'] . ' / ' . $row['mileage'];
        };
        echo '</li><br/>';
        ?>
    </ul>
    <p>
        <a href="add.php">Add New</a>
        <a href="logout.php">Logout</a>
    </p>
</div>
</body>