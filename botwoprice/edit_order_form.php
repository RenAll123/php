<?php
// 連接資料庫
$link = @mysqli_connect(
    'localhost',    // MySQL主機名稱
    'root',         // 使用者名稱
    'password',             // 密碼
    'myshop'       // 預設使用的資料庫名稱
);

if (!$link) {
    die("無法開啟資料庫!<br/>" . mysqli_connect_error());
}

// 確認接收到的id值
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    echo "接收到的ID: $id<br>";

    // 獲取當前資料
    $SQL = "SELECT * FROM orders WHERE id = $id";
    echo "執行的SQL: $SQL<br>";
    $result = mysqli_query($link, $SQL);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            // 表單處理邏輯放在這裡
        } else {
            die("未找到資料!");
        }
    } else {
        echo "SQL錯誤: " . mysqli_error($link);
    }

    // 提交表單後處理更新
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $memberName = mysqli_real_escape_string($link, $_POST['memberName']);
        $email = mysqli_real_escape_string($link, $_POST['email']);
        $phone = mysqli_real_escape_string($link, $_POST['phone']);
        $remarks = mysqli_real_escape_string($link, $_POST['remarks']);
        $transactionTime = mysqli_real_escape_string($link, $_POST['transactionTime']);
        $totalAmount = floatval($_POST['totalAmount']);

        // 更新SQL語法
        $SQL = "UPDATE orders SET memberName='$memberName', email='$email', phone='$phone', remarks='$remarks', transactionTime='$transactionTime', totalAmount=$totalAmount WHERE id=$id";

        // 執行更新查詢
        if (mysqli_query($link, $SQL)) {
            echo "資料更新成功!";
            // 返回主頁面
            header("Location: ManshowDB.php");
            exit;
        } else {
            echo "資料更新失敗: " . mysqli_error($link);
        }
    }
} else {
    die("未接收到正確的id值!");
}

// 關閉資料庫連接
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>修改訂單資料</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&family=Roboto:wght@400;500&family=Pacifico&display=swap" rel="stylesheet">
    <style>
        /* 省略樣式部分 */
    </style>
</head>
<body>
    <h1>修改訂單資料</h1>
    <form method="POST" action="">
        <label for="memberName">會員名稱:</label>
        <input type="text" id="memberName" name="memberName" value="<?php echo htmlspecialchars($row['memberName']); ?>" required>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>

        <label for="phone">電話:</label>
        <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($row['phone']); ?>" required>

        <label for="remarks">備註:</label>
        <input type="text" id="remarks" name="remarks" value="<?php echo htmlspecialchars($row['remarks']); ?>" required>

        <label for="transactionTime">交易時間:</label>
        <input type="text" id="transactionTime" name="transactionTime" value="<?php echo htmlspecialchars($row['transactionTime']); ?>" required>

        <label for="totalAmount">總金額:</label>
        <input type="number" id="totalAmount" name="totalAmount" step="0.01" value="<?php echo htmlspecialchars($row['totalAmount']); ?>" required>

        <button type="submit" class="button">保存修改</button>
    </form>
</body>
</html>
