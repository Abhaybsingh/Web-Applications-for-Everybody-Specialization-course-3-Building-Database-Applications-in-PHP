<?php

require_once "pdo.php";

$failure = false;
$success = false;

// when logging in without permission
if (!isset($_GET['name'])) {
    die("Name parameter missing");
}
// when logout button is pressed
 elseif (isset($_POST['logout']) && $_POST['logout'] == 'Logout') {
    header('Location: index.php');
}
// when all data is entered
 elseif (isset($_POST['make']) && isset($_POST['year'])
    && isset($_POST['mileage'])) {
    // check if the year and mileage entred were numeric
    if (!is_numeric($_POST['year']) || !is_numeric($_POST['mileage'])) {
        $failure = 'Mileage and year must be numeric';
    }
    // check if make is entered
     elseif (strlen($_POST['make']) < 1 ) {
        $failure = 'Make is required';
    } else {
        // performimg insert statement for adding the values into the database
        $stmt = $pdo->prepare('INSERT INTO autos (make, year, mileage) VALUES ( :make, :year, :mileage)');
        $stmt->execute(array(
                ':make' => $_POST['make'],
                ':year' => $_POST['year'],
                ':mileage' => $_POST['mileage'])
        );
        $success = 'Record inserted';
    }
}
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
    <h1>Tracking Autos for <?php echo $_GET['name']; ?></h1>
    <?php
    if ($failure !== false) {
        // Look closely at the use of single and double quotes
        echo('<p style="color: red;">' . htmlentities($failure) . "</p>\n");
    }
    if ($success !== true) {
        // Look closely at the use of single and double quotes
        echo('<p style="color: green;">' . htmlentities($success) . "</p>\n");
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
    </form>

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
</div>
</body>