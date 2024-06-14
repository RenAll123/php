<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>不二價屋</title>
    <!--改ICON-->
        <link rel="icon" href="home.ico" type="image/x-icon">
    <!--改字體-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=LXGW+WenKai+Mono+TC&family=Noto+Serif+TC:wght@200..900&display=swap" rel="stylesheet">
    <!--STYLE-->
        <link rel="stylesheet" href="style_mouse.css">
        <link rel="stylesheet" href="style_title.css">
        <link rel="stylesheet" href="style_front.css">
</head>
<body>
    <!--封面-->
        <nav>
            <div class="menu">
                <div class="logo">
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley">不二價屋</a>
                </div>
                <ul>
                    <li><a href="index.php">首頁</a></li>
                    <li><a href="shop.php">商品目錄</a></li>
                    <li><a id="nav-cart">購物車</a></li>
                    <li><a href="order.php">下單頁面</a></li>
                    <li><a href="ManIndex.php">管理者頁面</a></li>
                </ul>
            </div>
        </nav>
    <!--內容物-->  
        <div class="img"></div>
        <div class="center">
            <div class="title">~歡迎來到~</div>
            <div class="sub_title">PEKO的私房菜單</div>
            <div class="btns">
                <button id="Button_User" onclick="page_User()">開始購物</button>
                <button id="Button_Manager" onclick="page_Manager()">管理者這邊走</button>
            </div>
        </div>
        <script>
            function page_User() {
            window.location.href = 'shop.php';
            }
            function page_Manager() {
            window.location.href = 'ManIndex.php';
            }
        </script>
    <!--滑鼠-->
        <div class="cursor"></div>
        <script>
            var cursor = document.querySelector(".cursor");
            document.addEventListener("mousemove",function(e){
                cursor.style.cssText = "left: " + e.clientX + "px; top: " + e.clientY + "px;";
            });
        </script>
</body>
</html>