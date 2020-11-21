<?php
require_once "pdo.php";

$failure = FALSE;

if ( ! isset($_GET['name']) || strlen($_GET['name']) < 1  ) {
    die('Name parameter missing');
}

if ( isset($_POST['logout']) ) {
    header('Location: index.php');
    return;
}

if (isset($_POST['add']) && 
    isset($_POST['make']) && 
    isset($_POST['year']) && isset($_POST['mileage'])) {

    if ( strlen($_POST['make']) < 1 ) {
        $failure = "Make is required";
    } 
    else {
        if ( is_numeric($_POST['year']) && is_numeric($_POST['mileage'])) {

            // echo('<p>Adding data in database...</p>');

            $sql = "INSERT INTO autos (make, year, mileage) VALUES (:make, :year, :mileage)";

            $stmt = $pdo->prepare($sql);
            $stmt -> execute(array(
                ':make' => $_POST['make'], 
                ':year' => $_POST['year'],
                ':mileage' => $_POST['mileage']));

            $failure = "Record inserted";
        }
        else {
            $failure = "Mileage and year must be numeric";
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Abhay Singh Automobile Tracker</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    </head>
<body>
    <div class="container">
        <h1>Tracking Autos for</h1>
        <?php
            if ( $failure !== false ) {
                echo('<p style="color: red;">'.htmlentities($failure)."</p>\n");
            }
        ?>
        <form method="post">
            <p>Make:<input type="text" name="make" size="60"/></p>
            <p>Year:<input type="text" name="year"/></p>
            <p>Mileage:<input type="text" name="mileage"/></p>
            <input type="submit" name="add" value="Add">
            <input type="submit" name="logout" value="Logout">
        </form>
        
        <?php
            echo('<ul>');
            $stmt = $pdo -> query("SELECT auto_id,make,year,mileage FROM autos");
            if ($failure !== FALSE) {

                echo('<h2>Automobiles</h2>');
                while ( $row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
                    echo("<li>"." ".$row['year']." ".$row['make']." / ".$row['mileage']."</li>");
                }
            }
            echo('</ul>');
        ?>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
</body>
</html>