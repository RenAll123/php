<html>
<head>
<meta charset="utf-8">
</head>
<form method="post" action="showpaper.php">
<?php

session_start();
error_reporting(0);
if ($_SESSION["login"] == "author") {

    echo "<h1>Author您好，歡迎進入論文投稿網頁</h1></br>";
    echo"論文標題:";
    echo"<input type = 'text' name='title'><br/>";
    echo"作者姓名:";
    echo"<input type = 'text' name='name'><br/>";
    echo"作者Email:";
    echo"<input type = 'email' name='email'><br/>";
    echo"論文摘要:<textarea name='summary' rows='20'cols='50'>";
    echo"</textarea></br>";
    echo "<input type='submit'>";
    echo"</br>";
    echo "<a href='logout.php'>Logout</a>";
} else {
    echo "<font size='6'>非法登入<br>3秒後將返回登入頁面</font>";
    header("Refresh:3;url=index.php");
}
?>
</form>
<html>