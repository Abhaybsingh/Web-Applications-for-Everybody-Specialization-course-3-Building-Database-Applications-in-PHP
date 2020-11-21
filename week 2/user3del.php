<?php
require_once "pdo.php";

if ( isset($_POST['user_id']) && isset($_POST['delete']) ) {
    $sql = "DELETE FROM users WHERE user_id = :zip";

    echo("<pre>");
    echo($sql);
    echo("<pre>");

    $stmt = $pdo -> prepare($sql);
    $stmt -> execute (array(':zip' => $_POST['user_id']));
}
?>

<html>
<head>
</head>
<body>
    <table border="1">
        <?php
            $stmt = $pdo -> query("SELECT name,email,password,user_id FROM users");
            while ( $row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
                echo("<tr><td>");
                echo($row['name']);
                echo("</td><td>");
                echo($row['email']);
                echo("</td><td>");
                echo($row['password']);
                echo("</td><td>");
                echo('<form method="post"><input type="hidden" ');
                echo('name="user_id" value="'.$row['user_id'].' "> ');
                // echo("<br>");
                echo('<input type="submit" name="delete" value="Del">');
                // echo('name="delete" value="Del">');
                // echo("<br>");
                echo("</td><tr>");
            }
        ?>
    </table>
    <p>Delete A User</p>
    <form method="post">
        <p>ID to Delete:<input type="text" name="user_id"></p>
        <p><input type="submit" value="Delete"></p>
    </form>
</body>
</html>