<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>訂單資料庫</title>
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

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        th:hover {
            background-color: #e0e0e0;
        }

        tr {
            transition: background-color 0.3s;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        input[type="number"], select {
            width: 100%;
            padding: 8px;
            margin: 4px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        input[type="number"]:focus, select:focus {
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

        .button-delete {
            background-color: #f44336; /* Red */
        }

        .button-edit {
            background-color: #008CBA; /* Blue */
        }

        .button:hover {
            transform: scale(1.1);
        }

        .button-delete:hover {
            background-color: #e53935; /* Darker Red */
        }

        .button-edit:hover {
            background-color: #007bb5; /* Darker Blue */
        }

        .button-container {
            margin-top: 20px;
            text-align: center;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>
    <h1>訂單資料庫</h1>
    <?php
    // 连接数据库
    $link = mysqli_connect('localhost', 'root', 'password', 'myshop');
    if (!$link) {
        die("無法連接資料庫!<br/>");
    } else {
        echo "資料庫連接成功!<br/>";
    }

    // 查询 orders 表数据
    $SQL = "SELECT orders.id AS order_id, orders.memberName, orders.email, orders.phone, orders.remarks, orders.transactionTime, orders.totalAmount, order_items.id AS item_id, order_items.productName, order_items.productPrice, order_items.quantity, order_items.total 
            FROM orders 
            JOIN order_items 
            ON orders.id = order_items.orderId";
    $result = mysqli_query($link, $SQL);

    echo '<table>';
    echo '<tr><th>訂單編號</th><th>會員名稱</th><th>電子郵件</th><th>電話</th><th>備註</th><th>交易時間</th><th>總金額</th><th>產品名稱</th><th>產品價格</th><th>數量</th><th>小計</th></tr>';

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row["order_id"]."</td><td>".$row["memberName"]."</td><td>".$row["email"]."</td><td>".$row["phone"]."</td><td>".$row["remarks"]."</td><td>".$row["transactionTime"]."</td><td>".$row["totalAmount"]."</td><td>".$row["productName"]."</td><td>".$row["productPrice"]."</td><td>".$row["quantity"]."</td><td>".$row["total"]."</td>";
        echo "</tr>";
    }
    echo "</table>";

    mysqli_close($link);
    ?>

<div class="button-container">
    <a href="piechart.php" class="button">畫圖分析</a>
    <a href="ManLogout.php" class="button">離開</a>
</div>

</body>
</html>
