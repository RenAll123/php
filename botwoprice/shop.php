<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商店</title>
    <!--改ICON-->
    <link rel="icon" href="home.ico" type="image/x-icon">
    <!--改字體-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=LXGW+WenKai+Mono+TC&family=Noto+Serif+TC:wght@200..900&display=swap" rel="stylesheet">
    <!--STYLE--> 
    <link rel="stylesheet" href="style_mouse.css">   
    <link rel="stylesheet" href="style_title.css">
    <link rel="stylesheet" href="style_shop.css">
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
    </br></br></br></br></br>
    <!--商品-->
    <div class="container">
        <header>
            <div class="title">YUMMY LIST</div>
            <div class="icon-cart">
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 15a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0h8m-8 0-1-4m9 4a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-9-4h10l2-7H3m2 7L3 4m0 0-.792-3H1"/>
                </svg>
                <span>0</span>
            </div>
        </header>
        <div class="listProduct"></div>
    </div>
    <div class="cartTab">
        <h1>購物車</h1>
        <div class="listCart"></div>
        <div class="btn">
            <button class="close">關閉</button>
            <button class="checkOut">下單</button>
        </div>
    </div>
    <script src="app.js"></script> 
    <!--滑鼠-->
    <div class="cursor"></div>
    <script>
        var cursor = document.querySelector(".cursor");
        document.addEventListener("mousemove",function(e){
            cursor.style.cssText = "left: " + e.clientX + "px; top: " + e.clientY + "px;";
        });

        // 添加事件监听器，使得点击下单按钮时跳转到订单页面
        document.querySelector('.checkOut').addEventListener('click', () => {
            window.location.href = 'order.php';
        });
    </script>
</body>
</html>
