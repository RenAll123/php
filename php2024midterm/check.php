<?php

session_start();


$chairID = "chair";
$chairPWD = "123";

$reviewerID = "reviewer";
$reviewerPWD = "234";

$authorID = "author";
$authorPWD = "345";


$id = $_POST["id"];
$pwd = $_POST["pwd"];

if (($_POST["role"]=="Chair") && ($chairID == $id) && ($chairPWD == $pwd)) {
    $_SESSION["login"] = "chair";
    setcookie("ChairRO",$chairRO);
    setcookie("ChairID",$chairID);
    setcookie("ChairPWD",$chairPWD);
    header("Location:chair.php");
} else if (($_POST["role"]=="Reviewer") && ($reviewerID == $id) && ($reviewerPWD == $pwd)) {
    $_SESSION["login"] = "reviewer";
    setcookie("ReviewerRO",$reviewerRO);
    setcookie("ReviewerID",$reviewerID);
    setcookie("ReviewerPWD",$reviewerPWD);
    header("Location:reviewer.php");
} else if (($_POST["role"]=="Author") && ($authorID == $id) && ($authorPWD == $pwd)){
    $_SESSION["login"] = "author";
    setcookie("AuthorRO",$authorRO);
    setcookie("AuthorID",$authorID);
    setcookie("AuthorPWD",$authorPWD);
    header("Location:author.php");
}else
{
    $_SESSION["login"] = "fail";
    header("Location:fail.php");
}
?>
