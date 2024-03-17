<meta charset="utf-8">
<html>
<h1>報名資訊</h1>
<?php
    if($_POST["sName"]!=""){
        $sName=$_POST["sName"];
        echo "你的名字:" .$sName. "<br/>";
        $sId=$_POST["sId"];
        echo "你的學號:" .$sId. "<br/>";
        $sDate=$_POST["sDate"];
        echo "你的生日:" .$sDate. "<br/>";
        $sGender=$_POST["sGender"];
        echo "性別:" .$sGender. "<br/>";
        $sEmail=$_POST["sEmail"];
        echo "電子郵件:" .$sEmail. "<br/>";
        $sTel=$_POST["sTel"];
        echo "電話號碼:" .$sTel. "<br/>";
        $sLevel=$_POST["sLevel"];
        echo "系級:" .$sLevel. "<br/>";
        $sJoin=$_POST["sJoin"];
        echo "參加意願:" .$sJoin. "<br/>";
    }else{
        echo "沒有輸入資料";
    }
?>
</html>
