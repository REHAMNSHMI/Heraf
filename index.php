<?php
include 'db_connection.php';  // التأكد من استيراد ملف الاتصال بقاعدة البيانات

$message = ''; // تعريف المتغير الخاص برسائل النجاح أو الفشل

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // التأكد من ملء الحقول
    if (!empty($name) && !empty($phone) && !empty($email)) {

        // استخدام Prepared Statements لتأمين الاستعلام ضد SQL Injection
        $stmt = $conn->prepare("INSERT INTO users (name, phone, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $phone, $email); // ربط المتغيرات بالاستعلام المحضر
        
        if ($stmt->execute()) {
            // في حال نجاح التسجيل
            $message = "تم التسجيل بنجاح! سيتم نقلك إلى صفحة الحجز.";
            header("Location: bookings.php"); // إعادة التوجيه إلى صفحة الحجز بعد النجاح
            exit();
        } else {
            // في حال حدوث خطأ
            $message = "حدث خطأ أثناء التسجيل: " . $conn->error;
        }

        $stmt->close();  // إغلاق الاستعلام المحضر
    } else {
        // إذا كانت الحقول فارغة
        $message = "يرجى ملء جميع الحقول!";
    }
}

mysqli_close($conn);  // إغلاق الاتصال بقاعدة البيانات
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل جديد</title>
</head>
<body>
    <h1>تسجيل جديد</h1>

    <?php
    // عرض الرسائل
    if ($message) {
        echo "<p>$message</p>";
    }
    ?>

    <form action="index.php" method="POST">
        <label for="name">الاسم:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="phone">رقم الهاتف:</label>
        <input type="tel" id="phone" name="phone" required><br>

        <label for="email">البريد الإلكتروني:</label>
        <input type="email" id="email" name="email" required><br>

        <button type="submit" name="save">تسجيل</button>
    </form>
</body>
</html>

