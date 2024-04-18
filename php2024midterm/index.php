<html>

<head>
<meta charset="utf-8">
<title>高大資管論文投稿系統</title>
</head>

<body>
    <?php
    error_reporting(0);
    session_start();
    if ($_SESSION["login"] != null) {
        session_destroy();
    }
    ?>
    <form method="post" action="check.php">

        <?php
        if (isset($_COOKIE["ChairID"])) {
            echo"<h1>高大資管論文投稿系統</h1>";
            setcookie("chairID", $chairID, time() + (60 * 60 * 24 * 7));
            setcookie("chairPWD", $chairPWD, time() + (60 * 60 * 24 * 7));
            setcookie("chairRO", $chairRO, time() + (60 * 60 * 24 * 7));
            echo "<br/>";
            print"請選擇您的角色:";
            echo"<select name='role'".$_COOKIE["chairRO"].">";
            echo"<option valve='Chair' selected='True'>",'Chair',"</option>";
            echo"<option valve='Reviewer' >",'Reviewer',"</option>";
            echo"<option valve='Author' >",'Author',"</option>";
            echo"</select></br>";

            echo "帳號:<input type = 'text'name='id' value='" . $_COOKIE["chairID"] . "'><br/>";
            echo "密碼:<input type = 'password' name='pwd' value='" . $_COOKIE["chairPWD"] . "'><br/>";
            echo "<input type='submit'>";
            echo "<input type='reset'><br />";
        } else if (isset($_COOKIE["ReviewerID"])) {
            echo"<h1>高大資管論文投稿系統</h1>";
            setcookie("reviewerID", $reviewerID, time() + (60 * 60 * 24 * 7));
            setcookie("reviewerPWD", $reviewerPWD, time() + (60 * 60 * 24 * 7));
            setcookie("reviewerRO", $reviewerRO, time() + (60 * 60 * 24 * 7));
            echo "<br/>";
            
            print"請選擇您的角色:";
            echo"<select name='role'".$_COOKIE["reviewerRO"].">";
            echo"<option valve='Chair' selected='True'>",'Chair',"</option>";
            echo"<option valve='Reviewer' >",'Reviewer',"</option>";
            echo"<option valve='Author' >",'Author',"</option>";
            echo"</select></br>";

            echo "帳號:<input type = 'text'name='id' value='" . $_COOKIE["reviewerID"] . "'><br/>";
            echo "密碼:<input type = 'password' name='pwd' value='" . $_COOKIE["reviewerPWD"] . "'><br/>";
            echo "<input type='submit'>";
            echo "<input type='reset'><br />";
        }else if(isset($_COOKIE["AuthorID"])){
            echo"<h1>高大資管論文投稿系統</h1>";
            setcookie("authorID", $authorID, time() + (60 * 60 * 24 * 7));
            setcookie("authorPWD", $authorPWD, time() + (60 * 60 * 24 * 7));
            setcookie("authorRO", $authorRO, time() + (60 * 60 * 24 * 7));
            echo "<br/>";
            
            print"請選擇您的角色:";
            echo"<select name='role'".$_COOKIE["authorRO"].">";
            echo"<option valve='Chair' selected='True'>",'Chair',"</option>";
            echo"<option valve='Reviewer' >",'Reviewer',"</option>";
            echo"<option valve='Author' >",'Author',"</option>";
            echo"</select></br>";

            echo "帳號:<input type = 'text'name='id' value='" . $_COOKIE["authorID"] . "'><br/>";
            echo "密碼:<input type = 'password' name='pwd' value='" . $_COOKIE["authorPWD"] . "'><br/>";
            echo "<input type='submit'>";
            echo "<input type='reset'><br />";
        }else {
            echo"<h1>高大資管論文投稿系統</h1>";
            print"請選擇您的角色:";
            echo"<select name='role'>";
            echo"<option valve='Chair' selected='True'>",'Chair',"</option>";
            echo"<option valve='Reviewer' >",'Reviewer',"</option>";
            echo"<option valve='Author' >",'Author',"</option>";
            
            echo"</select></br>";
            echo "<font size='5'>帳號:<input type = 'text'name='id'> </font><br/>";
            echo "<font size='5'>密碼:<input type = 'password'name='pwd'> </font><br/><br>";
            echo "<input type='submit'>";
            echo "<input type='reset'><br />";
        }
        ?>

    </form>
</body>

</html>