<?php
$host = 'localhost'; //This is the local server running on XAMPP
$data = 'task_management'; //This is the database name
$user = 'root'; //This is the user name for the database
$pass = ''; //This is the password for the  user
$chrs = 'utf8mb4'; //This is the encryption type
$attr = "mysql:host=$host;dbname=$data;charset=$chrs";
$opts = 
[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try
{
     $pdo = new PDO($attr, $user, $pass, $opts);
}
catch (PDOException $e)
{
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
?>