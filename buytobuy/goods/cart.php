<?php
ini_set("display_errors", "On");
include "../method/wfcart.php";  // 插入購物車的PHP類別檔
session_start();  // 啟用交談期
$cart =& $_SESSION['wfcart']; // 指向購物車物件
if( !is_object($cart) ) $cart = new wfCart();
$msg = "";
// 檢查是否是表單送回
if ( isset($_POST["Order"]) ) {
   // 新增至購物車
   $id = $_POST["id"];
   $title = $_POST["name"];
   $price = $_POST["price"];
   $quantity = $_POST["num"];
   if ( $quantity == "" ) $quantity = 1;
   $cart -> add_item($id,$quantity,$price,$title);
   $msg = "<font color='red'>已將選購商品".$title;
   $msg .= "放入購物車!</font><br/>";
 }
 ?>
