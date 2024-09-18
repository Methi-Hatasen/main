<?php

// ตรวจสอบข้อมูล login
$email = $_POST["email"];
$password = $_POST["password"];

// เชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectsmartcard";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}


// SQL query
$sql_store = "SELECT * FROM store WHERE email = '$email' AND password = '$password'";

// Get result
$result_store = mysqli_query($conn, $sql_store);

if (mysqli_num_rows($result_store) > 0) {
  // ผู้ใช้เป็นร้านค้า
  session_start();
  $_SESSION["email"] = $email;
  header("Location: store.php");
} else {
  // ไม่พบผู้ใช้
  header("location: login.php");
}

mysqli_close($conn);

?>
