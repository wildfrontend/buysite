<?php
     ini_set("display_errors", "On");
     date_default_timezone_set("Asia/Taipei");
     require_once "../method/connect.php";

     ini_set("display_errors", "On");
     include "../method/wfcart.php";  // 插入購物車的PHP類別檔
     session_start();  // 啟用交談期
     $cart =& $_SESSION['wfcart']; // 指向購物車物件
     if( !is_object($cart) ) $cart = new wfCart();
     $msg = "";
     // 檢查是否是表單送回
     if ( isset($_POST["Order"]) ) {
        // 新增至購物車
        $id = $_POST["id"];
        $title = $_POST["name"];
        $price = $_POST["price"];
        $quantity = $_POST["num"];
        if ( $quantity == "" ) $quantity = 1;
        $cart -> add_item($id,$quantity,$price,$title);
        $msg = "<font color='red'>已將選購商品".$title;
        $msg .= "放入購物車!</font><br/>";
      }

     $id = $_GET['id'];

     $select = $connect -> prepare("SELECT *  FROM goods WHERE id = :id");
     $select -> execute(array(':id' => $id));

     $result = $select -> fetch(PDO::FETCH_ASSOC);
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <?php require_once "../method/bootstrap.html" ?>
     <title></title>
   </head>
   <body>
     <div class="container">
       <div class="row">
         <div class="panel panel-primary">
           <div class="panel-heading">
             <h2><?php echo $result['name']; ?></h2>
           </div>
           <div class="panel-body">
             <div class="row">
               <div class="thumbnail col-md-6">
                 <img src=<?php echo $result['picture']; ?> alt="" style="float:left">
               </div>
               <div class="col-md-6">
                 <ul class="list-group">
                   <li class="list-group-item">商品描述:<?php echo $result['content']; ?></li>
                   <li class="list-group-item">價格:<?php echo $result['price']; ?>元</li>
                   <li class="list-group-item">人氣:<?php echo $result['pop']; ?></li>
                   <li class="list-group-item">上架日期:<?php echo $result['uptime']; ?></li>
                   <li class="list-group-item">數量:
                     <form class="" action="index.php?id=<?echo $result['id']?>" method="post">
                       <input type="number" size = "5" name="num" value="1">
                       <input type="hidden" name="name" value="<?echo$result['name']?>">
                       <input type="hidden" name="price" value="<?echo$result['price']?>">
                       <input type="hidden" name="id" value="<?echo$result['id']?>">
                       <?php if ($_SESSION['member']!=NULL) {?>
                            <td><input type="submit" name="Order" value="購買" class="btn-primary">
                       <?}else {?>
                           <td><?php echo '購買前請先登入' ?>
                       <?} ?>
                      </form>
                   </li>
                   <li class="list-group-item">
                                  <a href="../">回首頁</a>
                                   <?php echo $msg ?>
                                   <a href="./buygood.php">購物車</a>
                 </ul>
               </div>
             </div>


          </div>
            </div>
          </div>
           </div>
         </div>
       </div>
     </div>
   </body>
 </html>
