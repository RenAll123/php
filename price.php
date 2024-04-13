<html>

<head>

</head>

<body>
    <font size="6">
        <b>歡迎蒞臨本網頁</b>
    </font>
    <br /><br />
    <form action="#" method="post">

        <font size="4">
            請輸入每公里的票價:<input type="text" name="price" required><br />
            <br><input type="submit" value="送出"><input type="reset" value="取消">

            <br><br>
            <HR><br>
        </font>


    </form>


</body>

</html>
<?php

if (isset($_POST["price"])) {
    $price = $_POST["price"];

    $station = array("基隆", "七堵", "台北", "新竹", "台中", "彰化", "嘉義", "臺南", "高雄", "屏東");
    $km = array(0, 6.0, 28.3, 106.4, 193.3, 210.9, 291.8, 353.2, 399.8, 420.8);


    $keelung = [];
    $seven = [];
    $taipei = [];
    $hsinchu = [];
    $taichung = [];
    $changhua = [];
    $chiayi = [];
    $tainan = [];
    $kaohsiung = [];
    $pingtung = [];
    for ($i = 0; $i < 10; $i++) {
        if (abs($km[$i] - $km[0]) <= 10 && abs($km[$i] - $km[0]) != 0)
            $keelung[$i] = 10;
        else
            $keelung[$i] = abs($km[$i] - $km[0]);

        if (abs($km[$i] - $km[1]) <= 10 && abs($km[$i] - $km[1]) != 0)
            $seven[$i] = 10;
        else
            $seven[$i] = abs($km[$i] - $km[1]);

        if (abs($km[$i] - $km[2]) <= 10 && abs($km[$i] - $km[2]) != 0)
            $taipei[$i] = 10;

        else
            $taipei[$i] = abs($km[$i] - $km[2]);

        if (abs($km[$i] - $km[3]) <= 10 && abs($km[$i] - $km[3]) != 0)
            $hsinchu[$i] = 10;
        else
            $hsinchu[$i] = abs($km[$i] - $km[3]);

        if (abs($km[$i] - $km[4]) <= 10 && abs($km[$i] - $km[4]) != 0)
            $taichung[$i] = 10;
        else
            $taichung[$i] = abs($km[$i] - $km[4]);

        if (abs($km[$i] - $km[5]) <= 10 && abs($km[$i] - $km[5]) != 0)
            $changhua[$i] = 10;
        else
            $changhua[$i] = abs($km[$i] - $km[5]);

        if (abs($km[$i] - $km[6]) <= 10 && abs($km[$i] - $km[6]) != 0)
            $chiayi[$i] = 10;
        else
            $chiayi[$i] = abs($km[$i] - $km[6]);

        if (abs($km[$i] - $km[7]) <= 10 && abs($km[$i] - $km[7]) != 0)
            $tainan[$i] = 10;
        else
            $tainan[$i] = abs($km[$i] - $km[7]);

        if (abs($km[$i] - $km[8]) <= 10 && abs($km[$i] - $km[8]) != 0)
            $kaohsiung[$i] = 10;
        else
            $kaohsiung[$i] = abs($km[$i] - $km[8]);

        if (abs($km[$i] - $km[9]) <= 10 && abs($km[$i] - $km[9]) != 0)
            $pingtung[$i] = 10;
        else
            $pingtung[$i] = abs($km[$i] - $km[9]);
    }


    echo "<font size='6'> <b>以下為票價表</b></font>";

    echo "<table width=800 height=50 cellpadding=5 border>";
    /*1*/
    echo "<tr><td>X</td><td>基隆</td><td>七堵</td><td>台北</td><td>新竹</td><td>台中</td><td>彰化</td><td>嘉義</td><td>臺南</td><td>高雄</td><td>屏東</td></tr>";
    /*2*/
    echo "<tr><td>基隆</td><td>X</td><td bgcolor='grey'>" . round(round($price * $keelung[1]) * 0.5) . "</td><td bgcolor='grey'>" . round(round($price * $keelung[2]) * 0.5) . "</td><td  bgcolor='grey'>" . round(round($price * $keelung[3]) * 0.5) . "</td><td  bgcolor='grey'>" . round(round($price * $keelung[4]) * 0.5) . "</td><td  bgcolor='grey'>" . round(round($price * $keelung[5]) * 0.5) . "</td><td  bgcolor='grey'>" . round(round($price * $keelung[6]) * 0.5) . "</td><td  bgcolor='grey'>" .  round(round($price * $keelung[7]) * 0.5) . "</td><td  bgcolor='grey'>" .  round(round($price * $keelung[8]) * 0.5) . "</td><td  bgcolor='grey'>" . round(round($price * $keelung[9]) * 0.5) . "</td></tr>";
    /*3*/
    echo "<tr><td>七堵</td><td>" . round($price * $seven[0]) . "</td><td>X</td><td bgcolor='grey'>" .  round(round($price * $seven[2]) * 0.5) . "</td><td  bgcolor='grey'>" .  round(round($price * $seven[3]) * 0.5) . "</td><td  bgcolor='grey'>" .  round(round($price * $seven[4]) * 0.5) . "</td><td  bgcolor='grey'>" .  round(round($price * $seven[5]) * 0.5) . "</td><td  bgcolor='grey'>" .  round(round($price * $seven[6]) * 0.5) . "</td><td  bgcolor='grey'>" .  round(round($price * $seven[7]) * 0.5) . "</td><td  bgcolor='grey'>" .  round(round($price * $seven[8]) * 0.5) . "</td><td  bgcolor='grey'>" .  round(round($price * $seven[9]) * 0.5) . "</td></tr>";
    /*4*/
    echo "<tr><td>台北</td><td>" . round($price * $taipei[0]) . "</td><td>" . round($price * $taipei[1]) . "</td><td>X</td><td  bgcolor='grey'>" . round(round($price * $taipei[3]) * 0.5) . "</td><td  bgcolor='grey'>" . round(round($price * $taipei[4]) * 0.5) . "</td><td  bgcolor='grey'>" . round(round($price * $taipei[5]) * 0.5) . "</td><td  bgcolor='grey'>" . round(round($price * $taipei[6]) * 0.5) . "</td><td  bgcolor='grey'>" . round(round($price * $taipei[7]) * 0.5) . "</td><td  bgcolor='grey'>" . round(round($price * $taipei[8]) * 0.5) . "</td><td  bgcolor='grey'>" . round(round($price * $taipei[9]) * 0.5) . "</td></tr>";
    /*5*/
    echo "<tr><td>新竹</td><td>" . round($price * $hsinchu[0]) . "</td><td>" . round($price * $hsinchu[1]) . "</td><td>" . round($price * $hsinchu[2]) . "</td><td>X</td><td  bgcolor='grey'>" . round(round($price * $hsinchu[4]) * 0.5) . "</td><td  bgcolor='grey'>" . round(round($price * $hsinchu[5]) * 0.5) . "</td><td  bgcolor='grey'>" . round(round($price * $hsinchu[6]) * 0.5) . "</td><td  bgcolor='grey'>" . round(round($price * $hsinchu[7]) * 0.5) . "</td><td  bgcolor='grey'>" . round(round($price * $hsinchu[8]) * 0.5) . "</td><td  bgcolor='grey'>" . round(round($price * $hsinchu[9]) * 0.5) . "</td></tr>";
    /*6*/
    echo "<tr><td>台中</td><td>" . round($price * $taichung[0]) . "</td><td>" . round($price * $taichung[1]) . "</td><td>" . round($price * $taichung[2]) . "</td><td>" . round($price * $taichung[3]) . "</td><td>X</td><td  bgcolor='grey'>" . round(round($price * $taichung[5]) * 0.5) . "</td><td  bgcolor='grey'>" . round(round($price * $taichung[6]) * 0.5) . "</td><td  bgcolor='grey'>" . round(round($price * $taichung[7]) * 0.5) . "</td><td  bgcolor='grey'>" . round(round($price * $taichung[8]) * 0.5) . "</td><td  bgcolor='grey'>" . round(round($price * $taichung[9]) * 0.5) . "</td></tr>";
    /*7*/
    echo "<tr><td>彰化</td><td>" . round($price * $changhua[0]) . "</td><td>" . round($price * $changhua[1]) . "</td><td>" . round($price * $changhua[2]) . "</td><td>" . round($price * $changhua[3]) . "</td><td>" . round($price * $changhua[4]) . "</td><td>X</td><td  bgcolor='grey'>" . round(round($price * $changhua[6]) * 0.5) . "</td><td  bgcolor='grey'>" . round(round($price * $changhua[7]) * 0.5) . "</td><td  bgcolor='grey'>" . round(round($price * $changhua[8]) * 0.5) . "</td><td  bgcolor='grey'>" . round(round($price * $changhua[9]) * 0.5) . "</td></tr>";
    /*8*/
    echo "<tr><td>嘉義</td><td>" . round($price * $chiayi[0]) . "</td><td>" . round($price * $chiayi[1]) . "</td><td>" . round($price * $chiayi[2]) . "</td><td>" . round($price * $chiayi[3]) . "</td><td>" . round($price * $chiayi[4]) . "</td><td>" . round($price * $chiayi[5]) . "</td><td>X</td><td  bgcolor='grey'>" . round(round($price * $chiayi[7]) * 0.5) . "</td><td  bgcolor='grey'>" . round(round($price * $chiayi[8]) * 0.5) . "</td><td  bgcolor='grey'>" . round(round($price * $chiayi[9]) * 0.5) . "</td></tr>";
    /*9*/
    echo "<tr><td>臺南</td><td>" . round($price * $tainan[0]) . "</td><td>" . round($price * $tainan[1]) . "</td><td>" . round($price * $tainan[2]) . "</td><td>" . round($price * $tainan[3]) . "</td><td>" . round($price * $tainan[4]) . "</td><td>" . round($price * $tainan[5]) . "</td><td>" . round($price * $tainan[6]) . "</td><td>X</td><td  bgcolor='grey'>" . round(round($price * $tainan[8]) * 0.5) . "</td><td  bgcolor='grey'>" . round(round($price * $tainan[9]) * 0.5) . "</td></tr>";
    /*10*/
    echo "<tr><td>高雄</td><td>" . round($price * $kaohsiung[0]) . "</td><td>" . round($price * $kaohsiung[1]) . "</td><td>" . round($price * $kaohsiung[2]) . "</td><td>" . round($price * $kaohsiung[3]) . "</td><td>" . round($price * $kaohsiung[4]) . "</td><td>" . round($price * $kaohsiung[5]) . "</td><td>" . round($price * $kaohsiung[6]) . "</td><td>" . round($price * $kaohsiung[7]) . "</td><td>X</td><td  bgcolor='grey'>" . round(round($price * $kaohsiung[9]) * 0.5) . "</td></tr>";
    /*11*/
    echo "<tr><td>屏東</td><td>" . round($price * $pingtung[0]) . "</td><td>" . round($price * $pingtung[1]) . "</td><td>" . round($price * $pingtung[2]) . "</td><td>" . round($price * $pingtung[3]) . "</td><td>" . round($price * $pingtung[4]) . "</td><td>" . round($price * $pingtung[5]) . "</td><td>" . round($price * $pingtung[6]) . "</td><td>" . round($price * $pingtung[7]) . "</td><td>" . round($price * $pingtung[8]) . "</td><td>X</td></tr>";
}
?>