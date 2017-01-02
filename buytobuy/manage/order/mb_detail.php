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

      $select = $connect -> prepare("SELECT * FROM member WHERE id = ?");
      $select -> execute(array($id));

      $result = $select -> fetch(PDO::FETCH_ASSOC);
     ?>
     <table class="table">
        <thead>
          <h3>會員資料</h3>
        </thead>
       <tr><td>編號<td>信箱<td>姓名<td>電話<td>地址
       <tr><td><?php echo $result['id'] ?><td><?php echo $result['mail'] ?><td><?php echo $result['name'] ?><td><?php echo $result['phone'] ?><td><?php echo $result['addr'] ?>
     </table>
  </body>
</html>
