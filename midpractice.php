<html>
<head>
<meta charset="utf-8"/>
<title>超派飲料店</title>
</head>
<body>
<h1>歡迎來到超派飲料店！！！</h1>
<form action="#" method="post">
<table border="1">
<tr>
    <th id="type">項目</th>
    <th id="price">價錢</th>
    <th id="type">項目</th>
    <th id="price">價錢</th>
</tr>
<tr>
    <td headers="type">綠茶</td>
    <td headers="price">25</td>
    <td headers="type">奶茶</td>
    <td headers="price">30</td>
</tr>
<tr>
    <td headers="type">紅茶</td>
    <td headers="price">25</td>
    <td headers="type">阿華田</td>
    <td headers="price">40</td>
</tr>
<tr>
    <td headers="type">青茶</td>
    <td headers="price">20</td>
    <td headers="type">拿鐵</td>
    <td headers="price">55</td>
</tr>
<tr>
    <td headers="type">烏龍</td>
    <td headers="price">30</td>
    <td headers="type">可樂</td>
    <td headers="price">25</td>
</tr>
<tr>
    <td headers="type">多多</td>
    <td headers="price">35</td>
    <td headers="type">檸檬汁</td>
    <td headers="price">45</td>
</tr>
</table>
<hr/>
姓名:<input type="text" name="User" size="15" required/><br/>
<label for="drink">選擇飲料：</br></label>
<label for="item1">綠茶:</label>
    <input type="number" id="item1" name="item1_quantity" min="0" value="0"> 杯<br><br>
<label for="item1">奶茶:</label>
    <input type="number" id="item2" name="item2_quantity" min="0" value="0"> 杯<br><br>
<label for="item1">紅茶:</label>
    <input type="number" id="item3" name="item3_quantity" min="0" value="0"> 杯<br><br>





<input type="submit" value="確認訂購">
</form>
</body>


</html>
<html>
<?php
//獲取表單的資料
$name=$_POST['User'];
// 定義每個品項的價格（假設固定價格）
$prices = array(
    '綠茶' => 25,   // 咖啡的價格為 50 元
    '奶茶' => 30,
    '紅茶' => 25      
    // 可以添加更多品項價格，根據實際需求
);
$order_details = array();//詳細資料

$total_price=0;//價格
$total_quantity=0;//總數量

$item1_quantity = isset($_POST['item1_quantity']) ? intval($_POST['item1_quantity']) : 0;
$item2_quantity = isset($_POST['item2_quantity']) ? intval($_POST['item2_quantity']) : 0;
$item3_quantity = isset($_POST['item3_quantity']) ? intval($_POST['item3_quantity']) : 0;


if ($item1_quantity > 0 && isset($prices['綠茶'])) {
    $total_price += $item1_quantity * $prices['綠茶'];
    $total_quantity+=$item1_quantity;
    $order_details[] = array('品項' => '綠茶','價格' => $prices['綠茶'], '數量' => $item1_quantity);
}
if ($item2_quantity > 0 && isset($prices['奶茶'])) {
    $total_price += $item2_quantity * $prices['奶茶'];
    $total_quantity+=$item2_quantity;
    $order_details[] = array('品項' => '奶茶', '價格' => $prices['奶茶'],'數量' => $item2_quantity);
}
if ($item3_quantity > 0 && isset($prices['紅茶'])) {
    $total_price += $item3_quantity * $prices['紅茶'];
    $total_quantity+=$item3_quantity;
    $order_details[] = array('品項' => '紅茶', '價格' => $prices['紅茶'],'數量' => $item3_quantity);
}
echo "<h1>訂單訊息：</h1>";
echo"<table border='1'>";
echo "<tr><th>品項</th><th>價格</th><th>數量</th></tr>";

foreach ($order_details as $item) {
    echo "<tr>";
    echo "<td>{$item['品項']}</td>";
    echo"<td>{$item['價格']}</td>";
    echo "<td>{$item['數量']}</td>";
    echo "</tr>";
}
echo "</table>";
echo "<h1>訂購人:$name</h1>";
echo "<h1>訂單資訊：飲料共{$total_quantity}杯,金額共{$total_price}元</h1>";


setcookie("*_quantity","",time()-3600);

?>

</html>