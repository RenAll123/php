<?php
$link = @mysqli_connect('localhost', 'root', 'password', 'myshop');
if (!$link) {
    error_log("無法開啟資料庫: " . mysqli_connect_error());
    die("資料庫連接失敗<br/>");
}

$SQL = "SELECT productName, SUM(quantity) AS totalQuantity FROM order_items GROUP BY productName";
$result = mysqli_query($link, $SQL);

if (!$result) {
    error_log("查詢失敗: " . mysqli_error($link));
    die("查詢失敗<br/>");
}

$productNames = [];
$totalQuantities = [];

while ($row = mysqli_fetch_assoc($result)) {
    $productNames[] = $row['productName'];
    $totalQuantities[] = $row['totalQuantity'];
}

// 重置結果集指標為第一行
mysqli_data_seek($result, 0);

mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>產品銷售圖</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['產品名稱', '購買總數'],
                <?php
                    while($row = mysqli_fetch_assoc($result)) {
                        $productName = $row['productName'];
                        $totalQuantity = $row['totalQuantity'];
                        echo "['$productName', $totalQuantity],";
                    }
                ?>
            ]);

            var options = {
                title: '產品銷售總數',
                pieHole: 0.4,
                pieSliceText: 'value',
                backgroundColor: { fill:'transparent' },
                legend: {
                    textStyle: { color: 'black' },
                },
                slices: {
                    0: { color: '#FFA07A' },
                    1: { color: '#FFD700' },
                    2: { color: '#FF69B4' },
                    3: { color: '#BA55D3' },
                    4: { color: '#87CEFA' },
                },
                chartArea: {
                    width: '90%',
                    height: '80%'
                }
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart-container'));

            chart.draw(data, options);
        }
    </script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(45deg, #ff9a9e 0%, #ffdde1 50%, #ffa4b6 100%);
            overflow: hidden;
            position: relative;
        }

        #chart-container {
            width: 600px;
            height: 400px;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            background-color: #fff;
            padding: 20px;
            animation: fadeIn 1s ease;
            transform: translateY(50px);
            opacity: 0;
            transition: transform 0.5s ease, opacity 0.5s ease;
        }

        #chart-container.loaded {
            transform: translateY(0);
            opacity: 1;
        }

        .floating-shapes {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .shape {
            position: absolute;
            border-radius: 20%;
            background: rgba(255, 255, 255, 0.4);
            animation: float 15s infinite;
        }

        .shape:nth-child(1) {
            width: 100px;
            height: 100px;
            top: 20%;
            left: 10%;
            animation-duration: 18s;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 70px;
            height: 70px;
            top: 50%;
            left: 25%;
            animation-duration: 15s;
            animation-delay: 3s;
        }

        .shape:nth-child(3) {
            width: 90px;
            height: 90px;
            top: 70%;
            left: 45%;
            animation-duration: 20s;
            animation-delay: 6s;
        }

        .shape:nth-child(4) {
            width: 60px;
            height: 60px;
            top: 30%;
            left: 70%;
            animation-duration: 22s;
            animation-delay: 9s;
        }

        .shape:nth-child(5) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 85%;
            animation-duration: 17s;
            animation-delay: 12s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes float {
            0% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(180deg);
            }
            100% {
                transform: translateY(0) rotate(360deg);
            }
        }

        /* 新增形狀和動畫 */
        .shape::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: inherit;
            border-radius: inherit;
            animation: scale 6s infinite ease-in-out;
            opacity: 0.5;
        }

        @keyframes scale {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.2);
            }
        }

    </style>
</head>
<body>
    <div id="chart-container"></div>
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('chart-container').classList.add('loaded');
        });
    </script>
</body>
</html>
