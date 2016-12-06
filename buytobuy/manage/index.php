<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>上傳商品</title>
  </head>
  <body>
     <form class="" action="./upload.php" method="post"enctype="multipart/form-data">
        <table>
          <tr><td>商品名稱<td><input type="text" name="gdname" value="">
          <tr><td>商品圖片<td><input type="file" name="gdpic" value="">
          <tr><td>商品敘述<td><textarea name="gdcontent" rows="8" cols="80"></textarea>
          <tr><td>商品價格<td><input type="number" name="gdprice" value="">
          <tr><td colspan="2"><input type="submit" name="" value="送出">
        </table>
     </form>
  </body>
</html>
