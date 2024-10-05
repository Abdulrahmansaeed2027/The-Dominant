<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $target_dir = "PDF/";
    $target_file = $target_dir . basename($_FILES["pdf"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // تحقق من نوع الملف
    if ($fileType != "pdf") {
        echo "عذرًا، فقط ملفات PDF مسموح بها.";
        $uploadOk = 0;
    }

    // تحقق مما إذا كان $uploadOk قد تم تعيينه على 0 بواسطة خطأ
    if ($uploadOk == 0) {
        echo "عذرًا، لم يتم رفع ملفك.";
    // إذا كان كل شيء على ما يرام، حاول رفع الملف
    } else {
        if (move_uploaded_file($_FILES["pdf"]["tmp_name"], $target_file)) {
            echo "تم رفع الملف ". htmlspecialchars(basename($_FILES["pdf"]["name"])). " بنجاح.";
        } else {
            echo "عذرًا، حدث خطأ أثناء رفع ملفك.";
        }
    }
}
?>
