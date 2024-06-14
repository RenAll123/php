<?php
session_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>管理者介面</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Raleway', sans-serif;
            background: linear-gradient(135deg, #a8edea, #fed6e3);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 30px 50px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
            text-align: center;
            width: 90%;
            max-width: 400px;
        }

        .container h1 {
            margin-bottom: 30px;
            font-size: 26px;
            font-family: 'Raleway', sans-serif;
            color: #333;
        }

        .container p {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .container a {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 12px 30px;
            margin: 10px 5px;
            border: none;
            border-radius: 25px;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
            font-family: 'Roboto', sans-serif;
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.2);
        }

        .container a:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .container a.logout {
            background-color: #6c757d;
            box-shadow: 0 4px 8px rgba(108, 117, 125, 0.2);
        }

        .container a.logout:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <?php
    if ($_SESSION["login"] == "chair") {
        echo "<div class='container'>";
        echo "<h1>Login Success</h1>";
        echo "<p>Welcome Manager !!</p>";
        echo "<a href='ManshowDB.php'>進入產品資料庫</a>";
        echo "<a href='ManshowDB_2.php'>進入訂單資料庫</a>";
        echo "<a href='ManLogout.php' class='logout'>Logout</a>";
        echo "</div>";
    } else {
        header("Refresh:3;url=ManFail.php");
    }
    ?>
</body>
</html>
