<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php require_once "../method/bootstrap.html" ?>
    <title>商品上傳</title>
  </head>
  <body>
    <div class="jumbotron">
      <img src="http://i.imgur.com/lyIDL5K.jpg" alt="" style="width:auto">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-2 sidebar">
          <div class="panel panel-default">
            <div class="panel-heading">功能選單</div>
            <div class="panel-body">
              <ul class="nav nav-sidebar">
                <li><a href="./order/">訂單管理</a></li>
                <li><a href="./gdlist/">商品管理</a></li>
                <li><a href="./member/">會員管理</a></li>
                <li><a href="index.php">商品上傳</a></li>
                <li><a href="board.php">顧客意見</a></li>
                <li><a href="../index.php">首頁</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-10">
          <div class="panel panel-default">
            <div class="panel-heading">商品上傳</div>
            <div class="panel-body">
              <?php
                 ini_set("display_errors", "On");
                 require_once "../method/connect.php";

                 $select = $connect -> prepare("SELECT * FROM board");
                 $select -> execute();

                 foreach (($select -> fetchall(PDO::FETCH_ASSOC)) as $result) {?>
                         <table class="table">
                           <tr>
                             <td>編號<td>留言<td>顧客<td>日期
                          <tr>
                               <td><?echo $result['id'];?><td><?echo $result['message'];?><td><?echo $result['mail'];?><td><?echo $result['date'];?>
                         </table>
                <? }
               ?>
            </div>
        </div>
      </div>
    </div>
  </body>
</html>
