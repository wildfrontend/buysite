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
                <li><a href="../index.php">首頁</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-10">
          <div class="panel panel-default">
            <div class="panel-heading">商品上傳</div>
            <div class="panel-body">
              <form class="" action="./upload.php" method="post"enctype="multipart/form-data">
                 <table>
                   <tr><td>商品名稱:<td><input type="text" name="gdname" value="">
                   <tr><td>商品圖片:<td><input type="file" name="gdpic" value="">
                   <tr><td>商品敘述:<td><textarea name="gdcontent" rows="8" cols="80"></textarea>
                   <tr><td>商品價格:<td><input type="number" name="gdprice" value="">
                   <tr><td colspan="2"><input type="submit" name="" value="送出">
                 </table>
              </form>
            </div>
        </div>
      </div>
    </div>
  </body>
</html>
