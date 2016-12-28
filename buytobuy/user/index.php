<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php require_once "../method/bootstrap.html" ?>
    <title></title>
  </head>
  <body>
      <div class="jumbotron">
        <img src="http://i.imgur.com/lyIDL5K.jpg" alt="" style="width:auto">
      </div>
      <div id="shop_head" class=masthead>
          <div role=navigation>
            <div class="panel panel-default">
              <div class="panel-body">
                <ul class="nav  nav-justified">
                  <li  class=active><a href="../" class="thumbnail">首頁</a></li>
                  <li><a href="../login" class="thumbnail">登入</a></li>
                  <li><a href="../method/logout.php" class="thumbnail">登出</a></li>
                  <li><a href="./" class="thumbnail">會員頁面</a>
                </ul>
              </div>
            </div>
          </div>
      </div>
      <div class="container">
         <div class="col-md-12">
           <?php
               ini_set("display_errors", "On");
               require_once "../method/connect.php";

               $id = $_GET['id'];


               $select = $connect -> prepare("SELECT ordertab.id,member.mail,goods.name,orderdetail.goods_amount,ordertab.total,order_date,drive
                 FROM ordertab,member,orderdetail,goods
                 WHERE member.id = :id
                 AND ordertab.member_id = member.id
                 AND ordertab.id = orderdetail.id
                 AND orderdetail.goods_id = goods.id");
               $select -> execute(array(':id' => $id));

               ?>
               <table class="table table-striped">
                 <thead>
                   <td>訂單編號<td>會員編號<td>商品名稱<td>商品個數<td>支付總價<td>訂單日期<td>配送
              <?foreach (($select -> fetchall(PDO::FETCH_ASSOC)) as $result) { ?>
                       <tr>
                         <td><?echo $result['id'];?>
                         <td><?echo $result['mail'];?>
                         <td><?echo $result['name'];?>
                         <td><?echo $result['goods_amount'];?>
                         <td><?echo $result['total'];?>
                         <td><?echo $result['order_date'];?>
                         <td><?if ($result['drive']==0) {
                              echo "未出貨";
                         }else {
                           echo "已出貨";
                         }
                }
             ?>
              </table>
         </div>
       </div>
  </body>
</html>
