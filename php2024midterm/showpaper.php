<html>
<head>
<meta charset="utf-8">
</head>

<?php

session_start();
error_reporting(0);
$title=$_POST['title'];
$name=$_POST['name'];
$email=$_POST['email'];
$summary=$_POST['summary'];
if ($_SESSION["login"] == "author") {

    echo "<h1>您好，恭喜你成功投稿</h1></br>";
    echo"論文標題:";
    print$title;
    echo"<br/>";
    echo"作者姓名:";
    echo"<br/>";
    print $name;
    echo"<br/>";
    echo"作者email:";
    echo"<br/>";
    print $email;
    echo"<br/>";
    echo"論文摘要:";
    echo"<br/>";
    print $summary;
    echo"<br/>";
    echo "<a href='logout.php'>Logout</a>";
} else {
    echo "<font size='6'>非法登入<br>3秒後將返回登入頁面</font>";
    header("Refresh:3;url=index.php");
}
?>

<html>