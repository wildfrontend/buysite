<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv=X-UA-Compatible content="IE=edge">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name=description content="">
    <meta name=author content="">
    <link rel=icon href=/Content/AssetsBS3/img/favicon.ico>
    <link href=https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css rel=stylesheet>
    <link href=/Content/AssetsBS3/examples/justified-nav.css rel=stylesheet>
    <script src=/Scripts/AssetsBS3/ie-emulation-modes-warning.js></script>
    <link rel="stylesheet" href="style.css">
    <title>主頁</title>
  </head>
  <body>
    <div id="shop_head" class=masthead >
        <div role=navigation>
          <ul class="nav  nav-justified">
            <li  class=active><a href="#">首頁</a></li>
            <li><a href="#">登入</a></li>
            <li><a href="#">登出</a></li>
            <li><a href="#">上傳商品</a></li>
          </ul>
        </div>
    </div>
    <div class="container">
     <div class="col-md-3">
        <p>商品列表</p>
        <p>商品搜尋</p>
     </div>
     <div class="col-md-9">
       <?php
           ini_set("display_errors", "On");
           require_once "./method/connect.php";

           $select = $connect -> prepare("SELECT * FROM goods");
           $select -> execute();
           foreach (($select -> fetchall(PDO::FETCH_ASSOC)) as $result) {?>

             <div class="col-md-4"style = border-style:dashed>
               <ol>
                 <li><?php echo $result['name']; ?>
                 <li><a href="./goods?id=<?php echo $result['id']; ?>"><img src = <?
                   echo $result['picture']!='' ? $result['picture'] : "https://avatars.plurk.com/8893255-big4.jpg"
           ?> width ="150" height ="150"></a>
                 <li><?php echo $result['price']; ?>
               </ol>
             </div>
         <?
           }
        ?>
     </div>
  </div>
  </body>
</html>
