<?php
$server = $_ENV['DB_SERVER'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$database = $_ENV['DB_DATABASE'];

$conn = mysql_connect($server, $username, $password);
if (!$conn) {
    die("Connection failed: " . mysql_error());
}

mysql_select_db($database, $conn);
mysql_query("SET NAMES gbk");
?>