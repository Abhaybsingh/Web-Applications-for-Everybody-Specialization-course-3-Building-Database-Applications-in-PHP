<?php
//mysqli
$mysqli = new mysqli("example.com","user","password","database");
$result = $mysqli -> query("SELECT 'Hello, dear MySql user!' AS _message FROM DUAL");
$row = $result -> fetch_assoc();
echo(htmlentities($row['_message']));

//PDO
//oop
$pdo = new PDO('mysql:host=example.com;dbname=database','user','password');
$statement = $pdo -> query ("SELECT ' Hello, dear MySQL user!' AS _message FROM DUAL");
$row = $statement -> fetch(PDO::fetch_assoc);
echo(htmlentities($row['_message']));

//mysql
//n oop
$c = mysql_connect("example.com", "user", "password");
mysql_select_db("datebase");
$result = mysql_query("SELECT 'Hello, dear MySql user!' AS _message FROM DUAL");
$row = mysql_fetch_assoc($result);
echo(htmlentities($row['_message']))
?>