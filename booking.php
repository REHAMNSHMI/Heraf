<?php
// التأكد من أن جميع الحقول تم ملؤها قبل معالجة البيانات
if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['date']) && isset($_POST['activity'])) {
    // ربط البيانات القادمة من النموذج بالمتغيرات
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $activity = $_POST['activity'];

    // إعداد الاتصال بقاعدة البيانات (تأكد من إعدادات الاتصال الخاصة بك)
    $conn = new mysqli('localhost', 'username', 'password', 'work_shop');
    if ($conn->connect_error) {
        die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
    }

    // إدخال البيانات في الجدول bookings
    $sql = "INSERT INTO bookings (activity, booking_date, phone) VALUES ('$activity', '$date', '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo "تمت إضافة الحجز بنجاح!";
    } else {
        echo "خطأ في إدخال البيانات: " . $conn->error;
    }

    // غلق الاتصال بعد الانتهاء
    $conn->close();
} else {
    echo "يرجى ملء جميع الحقول!";
}
?>
