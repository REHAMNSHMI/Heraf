<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "work_shop";  // تأكد من أن هذا هو اسم قاعدة البيانات الصحيحة

// إنشاء اتصال باستخدام mysqli
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
} 

// تعيين مجموعة الأحرف إلى utf8 لضمان دعم النصوص العربية
$conn->set_charset("utf8");

// معالجة إرسال الرسالة عبر الفورم
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استلام البيانات من الفورم
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // التحقق من أن البيانات غير فارغة
    if (!empty($phone) && !empty($message)) {
        // استخدام جملة Prepared Statements لتأمين البيانات
        $stmt = $conn->prepare("INSERT INTO contact (phone, message) VALUES (?, ?)");
        $stmt->bind_param("ss", $phone, $message);
        
        if ($stmt->execute()) {
            echo "تم إرسال الرسالة بنجاح!";
        } else {
            echo "حدث خطأ في إرسال الرسالة: " . $stmt->error;
        }

        // إغلاق البيان بعد تنفيذ الاستعلام
        $stmt->close();
    } else {
        echo "الرجاء إدخال جميع البيانات المطلوبة!";
    }
}

// إغلاق الاتصال بقاعدة البيانات بعد الانتهاء من جميع العمليات
$conn->close();
?>
