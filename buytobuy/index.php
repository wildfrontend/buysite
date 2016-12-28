<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php require_once "./method/bootstrap.html" ?>
    <link rel="stylesheet" href="style.css">
    <title>主頁</title>
  </head>
  <body style="backgroud-color: #F9F5F0 ">
    <div class="jumbotron">
      <img src="http://i.imgur.com/lyIDL5K.jpg" alt="" style="width:auto">
    </div>
    <div id="shop_head" class=masthead>
        <div role=navigation>
          <div class="panel panel-default">
            <div class="panel-body">
              <ul class="nav  nav-justified">
                <li  class=active><a href="./" class="thumbnail">首頁</a></li>
                <li><a href="./login" class="thumbnail">登入</a></li>
                <li><a href="method/logout.php" class="thumbnail">登出</a></li>
                <?php
                    session_start();
                    if ($_SESSION['member']['mail']=='leo5916267@gmail.com') {?>
                          <li><a href="./manage" class="thumbnail">管理員介面</a></li>
                  <?  }
                  if ($_SESSION['member'] != NULL) {?>
                    <li><a href="./user?id=<?echo $_SESSION['member']['id']?>" class="thumbnail">會員頁面</a>
                  <?  }
                ?>
              </ul>
            </div>
          </div>
        </div>
    </div>
    <div class="container-fluid">
     <div class="col-md-3">
       <div class="panel panel-default">
         <div class="panel-body">
           <p><?php if (isset($_SESSION['member']['mail'])) {
             echo $_SESSION['member']['mail']."歡迎光臨";
           } ?></p>
           <p>商品列表</p>
           <form class="" action="search.php" method="post">
             <input type="text" name="searchGood" value="">
             <input type="submit" name="" value="搜尋">
           </form>
         </div>
       </div>
     </div>
     <div class="col-md-9">
       <?php
           ini_set("display_errors", "On");
           require_once "./method/connect.php";

           $select = $connect -> prepare("SELECT * FROM goods");
           $select -> execute();
           foreach (($select -> fetchall(PDO::FETCH_ASSOC)) as $result) {?>

             <div class="col-md-4">
                    <ul class="list-group">
                      <li class="list-group-item">商品:<?php echo $result['name']; ?>
                      <li class="list-group-item"><a href="./goods?id=<?php echo $result['id']; ?>" class="thumbnail"><img src = <?
                        echo $result['picture']!='' ? $result['picture'] : "https://avatars.plurk.com/8893255-big4.jpg"
                ?> width ="150" height ="150"></a>
                      <li class="list-group-item">價格:<?php echo $result['price']; ?>
             </div>
         <?
           }
        ?>
     </div>
  </div>
  </body>
</html>
