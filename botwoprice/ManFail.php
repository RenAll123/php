<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>錯誤頁面</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Raleway', sans-serif;
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
        }

        h1 {
            color: #d32f2f;
            font-family: 'Roboto', sans-serif;
        }

        p {
            color: #555;
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>帳號密碼有誤</h1>
        <p>請等待4秒再重新嘗試</p>
        <?php
        header("Refresh:4; url=ManIdex.php");
        ?>
    </div>
</body>
</html>
