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
             <li><a href="../order/">訂單管理</a></li>
             <li><a href="../gdlist/">商品管理</a></li>
             <li><a href="../index.php">商品上傳</a></li>
             <li><a href="../member/">會員管理</a></li>
             <li><a href="../board.php">顧客意見</a></li>
              <li><a href="../../index.php">首頁</a></li>

           </ul>
        </div>
        <div class="col-md-10">
          <div class="table-responsive">
            <?php
               ini_set("display_errors", "On");
               require_once "../../method/connect.php";

               $select = $connect -> prepare("SELECT * FROM member");
               $select -> execute();
               ?>

               <table class="table table-striped">
                 <thead>
                   <td>會員編號<td>會員信箱<td>會員密碼<td>會員姓名<td>會員電話<td>會員地址
              <?foreach (($select -> fetchall(PDO::FETCH_ASSOC)) as $result) { ?>
                       <tr>
                         <td><?echo $result['id'];?>
                         <td><?echo $result['mail'];?>
                         <td><?echo $result['password'];?>
                         <td><?echo $result['name'];?>
                         <td><?echo $result['phone'];?>
                         <td><?echo $result['addr'];?>
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
