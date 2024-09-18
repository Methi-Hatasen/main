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


// รับค่าสถานะใหม่จาก URL
$store_id = $_POST["store_id"];
$newStatus = $_POST["status"];

// เขียนคำสั่ง SQL สำหรับการอัปเดตสถานะ
$sql = "UPDATE store SET status = '$newStatus' WHERE store_id = '$store_id'";

// รันคำสั่ง SQL
if (mysqli_query($con, $sql)) {
    header("Location: update_store.php"); // กลับไปยังหน้า update_store.php
    exit();
} else {
    echo "อัปเดตสถานะล้มเหลว: " . mysqli_error($con);
}

// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($con);

?>
