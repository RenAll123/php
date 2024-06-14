<?php
// process_order.php

// 数据库连接信息
$host = 'localhost';
$db = 'myshop';
$user = 'root';
$pass = 'password';
$charset = 'utf8mb4';

// 创建数据库连接
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . $e->getMessage()]);
    exit();
}

// 获取传入的订单数据
$orderData = json_decode(file_get_contents('php://input'), true);

if ($orderData) {
    $pdo->beginTransaction();

    try {
        // 插入订单信息
        $stmt = $pdo->prepare('INSERT INTO orders (memberName, email, phone, remarks, transactionTime, totalAmount) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->execute([
            $orderData['memberName'],
            $orderData['email'],
            $orderData['phone'],
            $orderData['remarks'],
            $orderData['transactionTime'],
            $orderData['totalAmount']
        ]);

        // 获取插入的订单ID
        $orderId = $pdo->lastInsertId();

        // 插入订单项信息
        $stmt = $pdo->prepare('INSERT INTO order_items (orderId, productName, productPrice, quantity, total) VALUES (?, ?, ?, ?, ?)');

        foreach ($orderData['cart'] as $item) {
            $stmt->execute([
                $orderId,
                $item['productName'],
                $item['productPrice'],
                $item['quantity'],
                $item['total']
            ]);
        }

        // 提交事务
        $pdo->commit();

        // 返回成功响应
        echo json_encode(['success' => true]);

    } catch (\Exception $e) {
        // 回滚事务
        $pdo->rollBack();
        echo json_encode(['success' => false, 'message' => 'Transaction failed: ' . $e->getMessage()]);
    }

} else {
    echo json_encode(['success' => false, 'message' => 'Invalid order data']);
}
?>
