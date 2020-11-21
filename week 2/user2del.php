<?php
require_once "pdo.php";

if ( isset($_POST['user_id']) ) {
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
    <p>Delete A User</p>
    <form method="post">
        <p>ID to Delete:<input type="text" name="user_id"></p>
        <p><input type="submit" value="Delete"></p>
    </form>
</body>
</html>