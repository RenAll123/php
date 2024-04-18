<html>
<head>
<meta charset="utf-8">
</head>
<?php

session_start();
echo"<h1>輸入的帳密錯誤</h1><br/>";
echo"<h1>3秒後會回到登入首頁</h1>";
header("Refresh:3;index.php");
?>

</html>