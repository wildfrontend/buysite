<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<?php require_once "../method/bootstrap.html" ?>
<title>shoppingcart.php</title>
</head>
<body>
<center><table border="0" class="table">
<tr>
   <td>功能<td>商品編號<td>商品名稱<td>訂價<td>數量<td>小計
<?php
   ini_set("display_errors", "On");
// 設定報告等級
error_reporting(E_ERROR | E_WARNING);
include "../method/wfcart.php"; // 插入購物車的PHP類別檔
session_start();  // 啟用交談期
$cart =& $_SESSION['wfcart']; // 指向購物車物件
if(!is_object($cart)) $cart = new wfCart();
$flag = false;
if($cart->itemcount > 0) { // 檢查購物車是否有商品
   // 顯示購物車的內容
   foreach($cart->get_contents() as $item) {?>
</tr><?
	    echo "<td><a href='delete.php?Id=".$item['id']."'>";
      echo "刪除</a></td>";
      // 顯示選購的商品資料
			echo "<td>".$item['id']."</td>";
		  echo "<td>".$item['info']."</td>";
		  echo "<td>".number_format($item['price'],2)."</td>";
		  echo "<td>".$item['qty']."</td>";
		  echo "<td>".number_format($item['subtotal'],2)."</td>";
	 }
	 echo "<tr><td colspan='6' align='right'>";
   echo "總金額 = NT$".number_format($cart->total,2)."元</td></tr>";
}
else {
	 echo "目前購物車沒有選購商品!";
}
?>
</table>
<hr/> | <a href="../index.php">網路商店</a>
| <a href="bill.php">結帳</a> |
</center>
</body>
</html>
