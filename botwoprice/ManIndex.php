<?php
session_start();
?>
<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <title>管理者登入系統</title>
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
            position: relative;
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

        .container {
            background-color: #fff;
            padding: 30px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            border-radius: 20px;
            text-align: center;
            width: 90%;
            max-width: 400px;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .container h1 {
            margin-bottom: 20px;
            font-size: 26px;
            font-family: 'Raleway', sans-serif;
            color: #333;
        }

        .container input[type="text"],
        .container input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 25px;
            box-sizing: border-box;
            background-color: #f9f9f9;
            font-family: 'Roboto', sans-serif;
            transition: all 0.3s ease;
            outline: none;
        }

        .container input[type="text"]:focus,
        .container input[type="password"]:focus {
            border-color: #007bff;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.4);
        }

        .container input[type="submit"],
        .container input[type="reset"] {
            width: 45%;
            background-color: #007bff;
            color: #fff;
            padding: 12px 0;
            margin: 20px 5px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            font-family: 'Roboto', sans-serif;
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.2);
        }

        .container input[type="reset"] {
            background-color: #6c757d;
            box-shadow: 0 4px 8px rgba(108, 117, 125, 0.2);
        }

        .container input[type="submit"]:hover,
        .container input[type="reset"]:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .container input[type="reset"]:hover {
            background-color: #5a6268;
        }

        .back-to-shopping {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            font-family: 'Roboto', sans-serif;
            box-shadow: 0 4px 8px rgba(40, 167, 69, 0.2);
            animation: fadeInButton 1s ease-in-out;
        }

        @keyframes fadeInButton {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .back-to-shopping:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }

        .back-to-shopping:focus {
            outline: none;
        }
    </style>
</head>

<body>
    <button class="back-to-shopping" onclick="window.location.href='shop.php'">返回購物</button>
    <div class="container">
        <h1>管理者登入系統</h1>
        <?php
        error_reporting(0);
        if ($_SESSION["login"] != null) {
            session_destroy();
        }
        ?>
        <form method="post" action="ManCheck.php">
            <?php
            if (isset($_COOKIE["chairID"])) {
                setcookie("chairID", $chairID, time() + (60 * 60 * 24 * 7));
                setcookie("chairPWD", $chairPWD, time() + (60 * 60 * 24 * 7));
                echo "<input type='text' name='id' value='" . $_COOKIE["chairID"] . "' placeholder='請輸入id'><br/>";
                echo "<input type='password' name='pwd' value='" . $_COOKIE["chairPWD"] . "' placeholder='請輸入password'><br/>";
            } else {
                echo "<input type='text' name='id' placeholder='請輸入id'><br/>";
                echo "<input type='password' name='pwd' placeholder='請輸入password'><br/>";
            }
            ?>
            <input type="submit" value="登入">
            <input type="reset" value="重設">
        </form>
    </div>
</body>

</html>
