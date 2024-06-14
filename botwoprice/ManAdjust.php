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

    // 獲取當前資料
    $SQL = "SELECT * FROM product WHERE No = $No";
    $result = mysqli_query($link, $SQL);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        die("未找到資料!");
    }

    // 提交表單後處理更新
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $Name = mysqli_real_escape_string($link, $_POST['Name']);
        $number = intval($_POST['number']);
        $price = floatval($_POST['price']);

        // 更新SQL語法
        $SQL = "UPDATE product SET Name='$Name', number=$number, price=$price WHERE No=$No";

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
    die("未接收到正確的No值!");
}

// 關閉資料庫連接
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>修改產品資料</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&family=Roboto:wght@400;500&family=Pacifico&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Raleway', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            background: linear-gradient(135deg, #a8edea, #fed6e3);
            height: 100vh;
            margin: 0;
            animation: changeBackground 10s infinite alternate;
        }

        @keyframes changeBackground {
            0% {
                background: linear-gradient(135deg, #a8edea, #fed6e3);
            }
            50% {
                background: linear-gradient(135deg, #fed6e3, #a8edea);
            }
            100% {
                background: linear-gradient(135deg, #a8edea, #fed6e3);
            }
        }

        h1 {
            font-family: 'Pacifico', cursive;
            color: #000000;
            margin: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        form {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 50%;
            margin-top: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin: 4px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus, input[type="number"]:focus {
            border-color: #ff69b4;
            box-shadow: 0 0 5px rgba(255, 105, 180, 0.5);
        }

        .button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        .button:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <h1>修改產品資料</h1>
    <form method="POST" action="">
        <label for="Name">產品名稱:</label>
        <input type="text" id="Name" name="Name" value="<?php echo htmlspecialchars($row['Name']); ?>" required>

        <label for="number">庫存數:</label>
        <input type="number" id="number" name="number" value="<?php echo htmlspecialchars($row['number']); ?>" required>

        <label for="price">單價:</label>
        <input type="number" id="price" name="price" step="1" value="<?php echo htmlspecialchars($row['price']); ?>" required>

        <button type="submit" class="button">保存修改</button>
    </form>
</body>
</html>
