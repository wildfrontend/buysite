<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php require_once "../../method/bootstrap.html" ?>
    <title>訂單管理</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-2 sidebar">
           <ul class="nav nav-sidebar">
             <li><a href="./">訂單管理</a></li>
             <li><a href="../gdlist/">商品管理</a></li>
             <li><a href="../index.php">商品上傳</a></li>
              <li><a href="../index.php">首頁</a></li>
           </ul>
        </div>
        <div class="col-md-10">
          <div class="table-responsive">
            <?php
               ini_set("display_errors", "On");
               require_once "../../method/connect.php";

               $select = $connect -> prepare("SELECT * FROM ordertab");
               $select -> execute();?>

               <table class="table table-striped">
                 <thead>
                   <td>訂單編號<td>商品名稱<td>商品數量<td>商品價格<td>商品總價<td>會員名稱<td>會員電話<td>會員地址
              <?foreach (($select -> fetchall(PDO::FETCH_ASSOC)) as $result) { ?>
                       <tr>
                         <td><?echo $result['id'];?>
                         <td><?echo $result['gdname'];?>
                         <td><?echo $result['gdnum'];?>
                         <td><?echo $result['gdprice'];?>
                         <td><?echo $result['gdtotal'];?>
                         <td><?echo $result['mbname'];?>
                         <td><?echo $result['mbphone'];?>
                         <td><?echo $result['mbaddr'];?>
             <?}
             ?>
              </table>
          </div>

        </div>
      </div>
    </div>
  </body>
</html>
