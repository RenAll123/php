<html>
<head>
<meta charset="utf-8">
</head>
<form method="post" action="showreview.php">
<?php

session_start();
error_reporting(0);
if ($_SESSION["login"] == "reviewer") {

    echo "<h1>Reviewer您好，歡迎進入論文評論網頁</h1></br>";
    echo"論文評審決定:";
    echo"<input type='radio' name='teacher' value='Accept' checked='True'/>Accept";
    echo"<input type='radio' name='teacher' value='Minor Revision'/ >Minor Revision";
    echo"<input type='radio' name='teacher' value='Major Revision' />Major Revision";
    echo"<input type='radio' name='teacher' value='Reject' />Reject</br>";
    echo"論文評論評語:<textarea name='comment' rows='20'cols='50'>";
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