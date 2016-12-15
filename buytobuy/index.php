<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php require_once "./method/bootstrap.html" ?>
    <link rel="stylesheet" href="style.css">
    <title>主頁</title>
  </head>
  <body>
    <div id="shop_head" class=masthead >
        <div role=navigation>
          <ul class="nav  nav-justified">
            <li  class=active><a href="./">首頁</a></li>
            <li><a href="./login">登入</a></li>
            <li><a href="method/logout.php">登出</a></li>
            <?php
                session_start();
                if ($_SESSION['member']['mail']==root) {?>
                      <li><a href="./manage">上傳商品</a></li>
              <?  }
             ?>

          </ul>
        </div>
    </div>
    <div class="container">
     <div class="col-md-3">
        <p><?php if (isset($_SESSION['member']['mail'])) {
          echo $_SESSION['member']['mail']."歡迎光臨";
        } ?></p>
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

             <div class="col-md-4"style = border-style:dashed;border-collapse: separate;>
               <ul>
                 <li><?php echo $result['name']; ?>
                 <li><a href="./goods?id=<?php echo $result['id']; ?>"><img src = <?
                   echo $result['picture']!='' ? $result['picture'] : "https://avatars.plurk.com/8893255-big4.jpg"
           ?> width ="150" height ="150"></a>
                 <li><?php echo $result['price']; ?>
               </ul>
             </div>
         <?
           }
        ?>
     </div>
  </div>
  <div class="jumbotron">
  <h1>Hello, world!</h1>
  <p>...</p>
  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
</div>
  </body>
</html>
