<?php
include_once 'class/Database.php';
include_once 'class/abstract/DB.php';

$servername = "localhost";
$username = "root";
$password = "coderslab";
$baseName = "Paczkolab";

$dsn = "mysql:host=$servername;dbname=$baseName;charset=utf8";


$conn = new Database($dsn, $username, $password);



DB::$conn = $conn;
