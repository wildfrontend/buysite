<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    ini_set("display_errors", "On");
    require_once "../method/connect.php";
    error_reporting(E_ERROR | E_WARNING);    // 設定報告等級
    include "../method/wfcart.php"; // 插入購物車的PHP類別檔

    session_start();  // 啟用交談期
    $cart =& $_SESSION['wfcart']; // 指向購物車物件
     $order_date  = date("Y-m-d H:i:s");//
    if(!is_object($cart)) $cart = new wfCart();

    if($cart->itemcount > 0) { // 檢查購物車是否有商品
        // 顯示購物車的內容
        foreach($cart->get_contents() as $item) {

              $insert = $connect -> prepare("INSERT INTO ordertab (
                                                                           member_id,
                                                                           order_date,
                                                                           total
                                                                           ) VALUES(
                                                                             ?,?,?
                                                                           )");
               $insert -> execute(array(
                                                                 $_SESSION['member']['id'],
                                                                 $order_date,
                                                                 number_format($cart->total,2)
                                                            ));
              $select = $connect -> prepare("SELECT id FROM ordertab WHERE member_id = :mbid");

              $select -> execute(array(':mbid' => $_SESSION['member']['id'] ));
              $result = $select-> fetch(PDO::FETCH_ASSOC);

              $insert = $connect -> prepare("INSERT INTO orderdetail (
                                                             id,
                                                             goods_id,
                                                             goods_amount,
                                                             goods_total
                                                            ) VALUES(
                                                                    ?,?,?,?
                                                           )");
             $insert -> execute(array($result['id'],$item['id'],$item['qty'],number_format($item['subtotal'],2)));
            }

    }else {
           echo "目前購物車沒有選購商品!";
   }
   header("Location: index.php?suc=購買成功");
 ?>
  </body>
</html>
