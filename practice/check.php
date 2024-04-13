<?php

session_start();


$adminID = "root";
$adminPWD = "admin";

$userID = "user";
$userPWD = "free";


$id = $_POST["id"];
$pwd = $_POST["pwd"];

if (($adminID == $id) && ($adminPWD == $pwd)) {
    $_SESSION["login"] = "admin";
    setcookie("adminID",$adminID);
    setcookie("adminPWD",$adminPWD);
    header("Location:admin.php");
} else if (($userID == $id) && ($userPWD == $pwd)) {
    $_SESSION["login"] = "user";
    setcookie("userID",$userID);
    setcookie("userPWD",$userPWD);
    header("Location:user.php");
} else {
    $_SESSION["login"] = "fail";
    echo "帳號密碼錯誤<br>3秒後將返回登入頁面";
    header("Refresh:3;url=login.php");
}
?>
