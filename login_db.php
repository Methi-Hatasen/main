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
$sql_admin = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";


// Get result
$result_admin = mysqli_query($conn, $sql_admin);


// ตรวจสอบว่าผู้ใช้มีอยู่หรือไม่
if (mysqli_num_rows($result_admin) > 0) {
  // ผู้ใช้เป็นแอดมิน
  session_start();
  $_SESSION["email"] = $email;
  
  $user = mysqli_fetch_assoc($result_admin);
  if ($user['role'] === 'admin-main') {
    // แอดมินหลัก
    header("Location: admin.php");
  } elseif ($user['role'] === 'admin-regular') {
    // แอดมินธรรมดา
    header("Location: admin_regular.php");
  }
} else {
  // ไม่พบผู้ใช้
  header("location: login.php");
}

mysqli_close($conn);

?>
