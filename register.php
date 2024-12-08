<?php
// الاتصال بقاعدة البيانات
$servername = "localhost"; // اسم السيرفر
$username = "root";       // اسم المستخدم
$password = "";           // كلمة المرور
$dbname = "work_shop";    // اسم قاعدة البيانات

$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// عند إرسال النموذج
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // تحضير الاستعلام
    $stmt = $conn->prepare("INSERT INTO users (name, phone, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $phone, $email);  // ربط المعاملات

    if ($stmt->execute()) {
        echo "تم التسجيل بنجاح! شكرًا لك.";
    } else {
        echo "حدث خطأ أثناء التسجيل: " . $conn->error;
    }
    $stmt->close();
}

$conn->close();
?>
