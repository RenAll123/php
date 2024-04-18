<html>
<head>
<meta charset="utf-8">
</head>

<?php

session_start();
error_reporting(0);
$teacher=$_POST['teacher'];
$comment=$_POST['comment'];
if ($_SESSION["login"] == "reviewer") {

    echo "<h1>您好，恭喜你成功評論</h1></br>";
    echo"論文評審:";
    print$teacher;
    echo"<br/>";
    echo"評語:";
    echo"<br/>";
    print $comment;
    echo"<br/>";
    echo "<a href='logout.php'>Logout</a>";
} else {
    echo "<font size='6'>非法登入<br>3秒後將返回登入頁面</font>";
    header("Refresh:3;url=index.php");
}
?>

<html>