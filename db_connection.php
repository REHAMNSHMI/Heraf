<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "work_shop";

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("الاتصال فشل: " . $conn->connect_error);
}

// تعيين مجموعة الأحرف إلى utf8 (أو utf8mb4 إذا كانت مدعومة)
$conn->set_charset('utf8mb4_general_ci');  // هنا قم بتغيير السطر إلى utf8 إذا استمرت المشكلة
?>
