<!-- Creating a Database and User

Create DATABASE misc;

GRANT ALL ON misc.* To fred'@'localhost' IDENTIFIED BY 'zap';
GRANT ALL ON misc.* To fred'@'127.0.0.1' IDENTIFIED BY 'zap';

USE misc; -->

<!-- Creating a table
CREATE TABLE users (
    user_id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(128),
    email VARCHAR(128),
    password VARCHAR(128),
    INDEX(email)
)ENGINE = INNODB CHARACTER SET = utf8; -->

<!-- Inserting a few records
INSERT INTO users (name,email,password) VALUES ('Chuck','csev@umich.edu','123');
INSERT INTO users (name,email,password) VALUES ('Glenn','gg@umich.edu','456'); -->

<!-- database connection
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=misc','fred','zap'); -->

<?php
echo("<pre>");
echo("<br>");

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=misc','fred','zap');
$stmt = $pdo -> query("SELECT * FROM users");

while ( $row = $stmt -> fetch(PDO::FETCH_ASSOC) ) {
    print_r($row);
}
echo("</pre>");
echo("<br>");
?>

<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=misc','fred','zap');
$stmt = $pdo -> query("SELECT name, email, password FROM users");

echo('<table border="1">');
while ( $row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
    echo("<tr><td>");
    echo($row['name']);
    echo("</td><td>");
    echo($row['email']);
    echo("</td><td>");
    echo($row['password']);
    echo("</td><tr>");
}
echo("</table>");
echo("<br>");

?>