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
    $SQL = "SELECT * FROM order_items WHERE id = $id";
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
        $orderId = intval($_POST['orderId']);
        $productName = mysqli_real_escape_string($link, $_POST['productName']);
        $productPrice = floatval($_POST['productPrice']);
        $quantity = intval($_POST['quantity']);
        $total = floatval($_POST['total']);

        // 更新SQL語法
        $SQL = "UPDATE order_items SET orderId=$orderId, productName='$productName', productPrice=$productPrice, quantity=$quantity, total=$total WHERE id=$id";

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
    <title>修改訂單項目資料</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&family=Roboto:wght@400;500&family=Pacifico&display=swap" rel="stylesheet">
    <style>
        /* 省略樣式部分 */
    </style>
</head>
<body>
    <h1>修改訂單項目資料</h1>
    <form method="POST" action="">
        <label for="orderId">訂單ID:</label>
        <input type="number" id="orderId" name="orderId" value="<?php echo htmlspecialchars($row['orderId']); ?>" required>

        <label for="productName">產品名稱:</label>
        <input type="text" id="productName" name="productName" value="<?php echo htmlspecialchars($row['productName']); ?>" required>

        <label for="productPrice">產品價格:</label>
        <input type="number" id="productPrice" name="productPrice" step="0.01" value="<?php echo htmlspecialchars($row['productPrice']); ?>" required>

        <label for="quantity">數量:</label>
        <input type="number" id="quantity" name="quantity" value="<?php echo htmlspecialchars($row['quantity']); ?>" required>

        <label for="total">總金額:</label>
        <input type="number" id="total" name="total" step="0.01" value="<?php echo htmlspecialchars($row['total']); ?>" required>

        <button type="submit" class="button">保存修改</button>
    </form>
</body>
</html>
