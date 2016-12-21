<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>商品修改</title>
    <?php require_once"../../method/bootstrap.html" ?>
  </head>
  <body>
    <?php
      ini_set("display_errors", "On");
      require_once "../../method/connect.php";
      $id = $_GET['id'];
      //顯示預設商品內容
      $select =  $connect -> prepare("SELECT * FROM goods WHERE id = ?");
      $select -> execute(array($id));
      $result = $select -> fetch(PDO::FETCH_ASSOC);
     ?>
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-body">
          <form class="" action="./update_pass.php?id=<?echo $id?>" method="post"enctype="multipart/form-data">
            <div class="input-group">
              <input type="text" name="name" value="<?echo$result['name']?>" placeholder="商品名稱">
            </div>
            <div class="input-group">
              <input type="file" name="gdpic" value="">
            </div>
            <div class="input-group">
              <input type="number" name="price" value="<?echo$result['price']?>" placeholder="商品價格">
            </div>
            <div class="input-group">
              <input type="textarea" name="content" value="<?echo$result['content']?>" placeholder="商品敘述">
            </div>
            <button type="submit" name="button" class="btn btn-success">修改</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
