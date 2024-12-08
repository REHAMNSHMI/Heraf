<?php
include 'db_connection.php'; // استيراد الاتصال بقاعدة البيانات

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['feedback'])) {
    // استقبال البيانات
    $rating = $_POST['rating'];
    $comments = $_POST['comments'];

    // التحقق من صحة البيانات
    if (!empty($rating)) {
        // استعلام الإدخال
        $sql = "INSERT INTO feedback (rating, comments) VALUES ('$rating', '$comments')";

        if ($conn->query($sql) === TRUE) {
            echo "شكراً على تقييمك!";
        } else {
            echo "خطأ أثناء إرسال التقييم: " . $conn->error;
        }
    } else {
        echo "يرجى إدخال تقييم!";
    }
}

// إغلاق الاتصال
$conn->close();
?>
