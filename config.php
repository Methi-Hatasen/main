<?php
$host = 'junction.proxy.rlwy.net';
$port = '35549';
$dbname = 'railway';
$username = 'root';
$password = 'JULUkkKytfpHJTdqjOVRMnSyxiPpiyAJ';

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


?>