<?php

// เชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectsmartcard";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}


// ดึงข้อมูลจากฟอร์ม
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$password = $_POST["password"];
$tell = $_POST["tell"];
$role = $_POST["role"];
$status = $_POST["status"];


// ตรวจสอบว่า username และ email ซ้ำหรือไม่
$sql = "SELECT * FROM admin WHERE email = '$email' OR lastname = '$lastname'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
  echo "Username หรือ Email นี้ถูกใช้งานแล้ว";
  exit;
}

// เข้ารหัสรหัสผ่าน
// $password = md5($password);

// บันทึกข้อมูลลงฐานข้อมูล
$sql = "INSERT INTO admin (firstname, lastname, email, password, tell, role, status) VALUES ('$firstname', '$lastname', '$email', '$password', '$tell', '$role', '$status')";
mysqli_query($con, $sql);

// แจ้งเตือนการลงทะเบียนสำเร็จ
echo "ลงทะเบียนสำเร็จ";
header("location: register.php");



?>

