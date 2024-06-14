<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 连接数据库
    $link1 = mysqli_connect('localhost', 'root', 'password', 'myshop');
    if (!$link1) {
        die("无法连接到数据库!<br/>");
    }

    // 获取表单数据
    $orderId = $_POST['orderId'];
    $memberName = $_POST['memberName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $remarks = $_POST['remarks'];
    $transactionTime = $_POST['transactionTime'];
    $totalAmount = $_POST['totalAmount'];
    $created_at = $_POST['created_at'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $quantity = $_POST['quantity'];
    $total = $_POST['total'];

    // 更新订单数据
    $updateOrderSQL = "UPDATE orders SET memberName='$memberName', email='$email', phone='$phone', remarks='$remarks', transactionTime='$transactionTime', totalAmount='$totalAmount', created_at='$created_at' WHERE id='$orderId'";
    mysqli_query($link1, $updateOrderSQL);

    // 更新订单项数据
    $updateOrderItemSQL = "UPDATE order_items SET productName='$productName', productPrice='$productPrice', quantity='$quantity', total='$total' WHERE orderId='$orderId'";
    mysqli_query($link1, $updateOrderItemSQL);

    // 关闭数据库连接
    mysqli_close($link1);

    // 重定向回显示页面
    header("Location: ManshowDB_2.php");
    exit();
} else {
    // 获取订单ID
    $orderId = $_GET['No'];

    // 连接数据库
    $link1 = mysqli_connect('localhost', 'root', 'password', 'myshop');
    if (!$link1) {
        die("无法连接到数据库!<br/>");
    }

    // 获取订单数据
    $orderSQL = "SELECT * FROM orders WHERE id='$orderId'";
    $orderResult = mysqli_query($link1, $orderSQL);
    $order = mysqli_fetch_assoc($orderResult);

    // 获取订单项数据
    $orderItemSQL = "SELECT * FROM order_items WHERE orderId='$orderId'";
    $orderItemResult = mysqli_query($link1, $orderItemSQL);
    $orderItem = mysqli_fetch_assoc($orderItemResult);

    // 关闭数据库连接
    mysqli_close($link1);
}
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>修改訂單資料</title>
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

        h1 {
            font-family: 'Pacifico', cursive;
            color: #000000;
            margin: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        form {
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            padding: 20px;
            width: 80%;
            max-width: 600px;
        }

        input[type="text"], input[type="number"], textarea {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus, input[type="number"]:focus, textarea:focus {
            border-color: #ff69b4;
            box-shadow: 0 0 5px rgba(255, 105, 180, 0.5);
        }

        .button {
            background-color: #4CAF50;
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

        .button-container {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>修改訂單資料</h1>
    <form method="POST" action="">
        <input type="hidden" name="orderId" value="<?php echo $order['id']; ?>">
        <label for="memberName">會員姓名</label>
        <input type="text" id="memberName" name="memberName" value="<?php echo $order['memberName']; ?>" required>
        
        <label for="email">電子郵件</label>
        <input type="text" id="email" name="email" value="<?php echo $order['email']; ?>" required>
        
        <label for="phone">電話</label>
        <input type="text" id="phone" name="phone" value="<?php echo $order['phone']; ?>" required>
        
        <label for="remarks">備註</label>
        <textarea id="remarks" name="remarks"><?php echo $order['remarks']; ?></textarea>
        
        <label for="transactionTime">交易時間</label>
        <input type="text" id="transactionTime" name="transactionTime" value="<?php echo $order['transactionTime']; ?>" required>
        
        <label for="totalAmount">總金額</label>
        <input type="number" id="totalAmount" name="totalAmount" value="<?php echo $order['totalAmount']; ?>" required>
        
        <label for="created_at">創建時間</label>
        <input type="text" id="created_at" name="created_at" value="<?php echo $order['created_at']; ?>" required>
        
        <h2>訂單項目</h2>
        
        <label for="productName">產品名稱</label>
        <input type="text" id="productName" name="productName" value="<?php echo $orderItem['productName']; ?>" required>
        
        <label for="productPrice">產品價格</label>
        <input type="number" id="productPrice" name="productPrice" value="<?php echo $orderItem['productPrice']; ?>" required>
        
        <label for="quantity">數量</label>
        <input type="number" id="quantity" name="quantity" value="<?php echo $orderItem['quantity']; ?>" required>
        
        <label for="total">總計</label>
        <input type="number" id="total" name="total" value="<?php echo $orderItem['total']; ?>" required>
        
        <div class="button-container">
            <button type="submit" class="button">保存修改</button>
        </div>
    </form>
</body>
</html>
