<?php
session_start();

$chairID = "pekoisourleader";
$chairPWD = "peko123";

$id = $_POST["id"];
$pwd = $_POST["pwd"];

if (($chairID == $id) && ($chairPWD == $pwd)) {
    $_SESSION["login"] = "chair";
    setcookie("chairID", $chairID);
    setcookie("chairPWD", $chairPWD);
    header("Location: ManChair.php");
    exit();  // 立即結束腳本執行，確保重定向生效
} else {
    $_SESSION["login"] = "fail";
    // 顯示錯誤訊息的HTML
    echo '<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>錯誤頁面</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: "Raleway", sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #a8edea, #fed6e3);
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
            text-align: center;
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-30px);
            }
            60% {
                transform: translateY(-15px);
            }
        }

        h1 {
            color: #d32f2f;
            font-family: "Roboto", sans-serif;
        }

        p {
            color: #555;
            font-family: "Roboto", sans-serif;
        }

        #countdown {
            font-weight: bold;
            color: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>帳號密碼錯誤</h1>
        <p> <span id="countdown">3</span> 秒後將返回登入頁面</p>
    </div>
    <script>
        // 倒數計時
        var seconds = 3;
        var countdownElement = document.getElementById("countdown");

        function updateCountdown() {
            if (seconds > 0) {
                seconds--;
                countdownElement.textContent = seconds;
            }
        }

        setInterval(updateCountdown, 1000);
    </script>
</body>
</html>';
    header("Refresh:3;url=ManIndex.php");
    exit();  // 立即結束腳本執行，確保顯示訊息並重定向
}
?>
