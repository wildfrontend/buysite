<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php require_once "../method/bootstrap.html" ?>
    <link rel="stylesheet" href="style.css">
    <title>主頁</title>
  </head>
  <body background= "http://episode.cc/Content/storyimage/CEE7EA4C-%E8%83%8C%E6%99%AF.jpg">
    <div class="jumbotron" style="background-image:url(http://i.imgur.com/lyIDL5K.jpg);width:aut;background-position:center;height:300px">
    </div>
    <div class="container-fluid">
      <div role=navigation>
        <div class="panel panel-default">
          <div class="panel-body">
            <ul class="nav  nav-justified">
              <li  class=active><a href="../" class="thumbnail">首頁</a></li>
              <li><a href="../method/logout.php" class="thumbnail">登出</a></li>
              <?php
                  session_start();
                if ($_SESSION['member'] != NULL) {?>
                  <li><a href="../user?id=<?echo $_SESSION['member']['id']?>" class="thumbnail">會員頁面</a>
                <?  }else { ?>
                  <li><a href="../login" class="thumbnail">登入</a></li>
                <?}
              ?>
            </ul>
          </div>
        </div>
      </div>
     <div class="col-md-3">
       <div class="panel panel-primary">
         <div class="panel-heading"><p><?php if (isset($_SESSION['member']['mail'])) {
           echo $_SESSION['member']['mail']."歡迎光臨";
         } ?></p></div>
         <div class="panel-body">
           <p>留言給店家</p>
           <form class="" action="board.php" method="post">
             <input type="text" name="message" value="">
             <input type="submit" name="" value="送出">
           </form>
         </div>
       </div>
     </div>
     <div class="col-md-9">
       <div class="panel panel-primary">
         <div class="panel-heading">
            <h2>訂單狀況</h2>
         </div>
         <div class="panel-body">
           <?php
               ini_set("display_errors", "On");
               require_once "../method/connect.php";

               $id = $_GET['id'];

               $select = $connect -> prepare("SELECT ordertab.id,member.mail,goods.name,orderdetail.goods_amount,orderdetail.goods_total,order_date,drive
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
                         <td><?echo $result['goods_total'];?>
                         <td><?echo $result['order_date'];?>
                         <td><?if ($result['drive']==0) {
                              echo "未出貨";
                         }else {
                           echo "已出貨";
                         }
                }
             ?>
         </div>
       </div>

     </div>
  </div>
  </body>
</html>
