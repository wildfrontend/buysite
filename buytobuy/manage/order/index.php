<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php require_once "../../method/bootstrap.html" ?>
    <title>訂單管理</title>
  </head>
  <body>
    <div class="jumbotron">
      <img src="http://i.imgur.com/lyIDL5K.jpg" alt="" style="width:auto">
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2 sidebar">
           <ul class="nav nav-sidebar">
             <li><a href="./">訂單管理</a></li>
             <li><a href="../gdlist/">商品管理</a></li>
             <li><a href="../index.php">商品上傳</a></li>
             <li><a href="../board.php">顧客意見</a></li>
              <li><a href="../index.php">首頁</a></li>
           </ul>
        </div>
        <div class="col-md-10">
          <div class="table-responsive">
            <?php
               ini_set("display_errors", "On");
               require_once "../../method/connect.php";

               $select = $connect -> prepare("SELECT ordertab.id,ordertab.member_id,orderdetail.goods_id,orderdetail.goods_amount,orderdetail.goods_total,order_date,drive
                 FROM ordertab,member,orderdetail
                 WHERE  ordertab.member_id = member.id
                 AND ordertab.id = orderdetail.id");
               $select -> execute();
               ?>

               <table class="table table-striped">
                 <thead>
                   <td>訂單編號<td>會員編號<td>商品編號<td>商品個數<td>支付總價<td>訂單日期<td>配送
              <?foreach (($select -> fetchall(PDO::FETCH_ASSOC)) as $result) { ?>
                       <tr>
                         <td><?echo $result['id'];?>
                         <td><a href="./mb_detail.php?id=<?echo $result['member_id'];?>" target="_blank"><?echo $result['member_id'];?></a>
                              <td><a target="_blank" href="./gd_detail.php?id=<?echo $result['goods_id'];?>" ><?echo $result['goods_id'];?></a>
                         <td><?echo $result['goods_amount'];?>
                         <td><?echo $result['goods_total'];?>
                         <td><?echo $result['order_date'];?>
                         <td><?if ($result['drive']==0) {
                              echo "未出貨";
                         }else {
                           echo "已出貨";
                         }?>
                         <td><a href="drive.php?id=<?echo$result['id']; ?>">送貨</a>
                         <td><a href="delete.php?id=<?echo$result['id']; ?>">刪除</a>

             <?}
             ?>
              </table>
          </div>

        </div>
      </div>
    </div>
  </body>
</html>
