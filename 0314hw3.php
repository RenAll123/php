<html>

<head>

<meta charset="utf-8">
<title>資管晚會報名表單</title>

</head>
<body bgcolor="aqua">
<form action="info.php" method="post">

<form>
<h1>資管晚會報名表</h1>
姓名:<input type="text" name="sName" placeholder="Please enter your name"><br/>
學號:<input type="text" name="sId" placeholder="Please enter your id"><br/>
出生年月日:
<input type="date" name="sDate" value=""></br>
性別:
<select name="sGender">
    <option value="男">男
    <option value="女">女
</select><br/>
電子郵件:<input type="email" name="sEmail" placeholder="Please enter your email"><br/>
電話號碼:<input type="tel" name="sTel" placeholder="Please enter your number"><br/>
系級:
<select name="sLevel">
    <option value="113">113
    <option value="114">114
    <option value="115">115
    <option value="116">116
</select></br>
報名意願:
<select name="sJoin">
    <option value="Yes">參加
    <option value="No">下次一定
</select></br>

有什麼想說的嗎ヾ(•ω•`)o:</br>
<textarea name="sComment" value="" rows="10" cols="20">
</textarea></br>

<input type="submit" value="填寫完畢">
<input type="reset" value="重新填寫">
</form>

</body>
</html>