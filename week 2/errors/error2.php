<?php

require_once "pdo.php";

$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $pdo -> prepare("SELECT * FROM users where user_id = :xyz");
$stmt -> execute(array(":xyz" => $_GET['user_id']));
$row = $stmt -> fetch(PDO:: FETCH_ASSOC);
if ($row === false) {
    echo("<p>user_id not found</p>");
} else {
    echo("<p>user_id found</p>");
}
?>