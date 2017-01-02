<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php require_once "../../method/bootstrap.html" ?>
    <title>會員詳情</title>
  </head>
  <body>
    <?php
      ini_set("display_errors", "On");
      require_once "../../method/connect.php";

      $id = $_GET['id'];

      $select = $connect -> prepare("SELECT * FROM goods WHERE id = ?");
      $select -> execute(array($id));

      $result = $select -> fetch(PDO::FETCH_ASSOC);
     ?>
     <table class="table">
        <thead>
          <h3>商品資料</h3>
        </thead>
       <tr><td>編號<td>名稱<td>價格
       <tr><td><?php echo $result['id'] ?><td><?php echo $result['name'] ?><td><?php echo $result['price'] ?>
     </table>
  </body>
</html>
