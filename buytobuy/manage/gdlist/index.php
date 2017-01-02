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
    <div class="container">
      <div class="row">
        <div class="col-md-2 sidebar">
           <ul class="nav nav-sidebar">
             <li><a href="../order/">訂單管理</a></li>
             <li><a href="./">商品管理</a></li>
             <li><a href="../index.php">商品上傳</a></li>
             <li><a href="../member/">會員管理</a></li>
             <li><a href="../board.php">顧客意見</a></li>
              <li><a href="../index.php">首頁</a></li>
           </ul>
        </div>
        <div class="col-md-10">
          <div class="table-responsive">
            <?php
               ini_set("display_errors", "On");
               error_reporting(E_ERROR | E_WARNING);
               require_once "../../method/connect.php";

               $select = $connect -> prepare("SELECT * FROM goods");
               $select -> execute();?>

               <table class="table table-striped">
                 <thead>
                   <td>商品編號<td>商品名稱<td>商品圖片<td>商品價格<td>商品敘述<td>商品人氣<td>商品上架時間
              <?foreach (($select -> fetchall(PDO::FETCH_ASSOC)) as $result) { ?>
                       <tr>
                         <td><?echo $result['id'];?>
                         <td><?echo $result['name'];?>
                         <td><img src=" <?echo $result['picture'];?>" alt="" width="100px" height="100px">
                         <td><?echo $result['price'];?>
                         <td><?echo $result['content'];?>
                         <td><?echo $result['pop'];?>
                         <td><?echo $result['uptime'];?>
                         <td><a href="update.php?id=<?echo $result['id'];?>">修改</a>
                         <td><a href="delete.php?id=<?echo $result['id'];?>">刪除</a>
             <?}
             ?>
              </table>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
