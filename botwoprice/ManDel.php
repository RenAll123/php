<?php
// 連接資料庫
$link = @mysqli_connect(
    'localhost',    // MySQL主機名稱
    'root',         // 使用者名稱
    'password',             // 密碼
    'myshop'       // 預設使用的資料庫名稱
);

if (!$link) {
    die("無法開啟資料庫!<br/>");
}

// 確認接收到的No值
if (isset($_GET['No'])) {
    $No = intval($_GET['No']);

    // 刪除SQL語法
    $SQL = "DELETE FROM product WHERE No = $No";

    // 執行刪除查詢
    if (mysqli_query($link, $SQL)) {
        echo "資料刪除成功!";
    } else {
        echo "資料刪除失敗: " . mysqli_error($link);
    }
} else {
    echo "未接收到正確的No值!";
}

// 關閉資料庫連接
mysqli_close($link);

// 返回主頁面
header("Location: ManshowDB.php");
exit;
?>
