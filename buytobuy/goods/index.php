<?php
     ini_set("display_errors", "On");
     require_once "../method/connect.php";

     $id = $_GET['id'];

     $select = $connect -> prepare("SELECT *  FROM goods WHERE id = :id");
     $select -> execute(array(':id' => $id));

     $result = $select -> fetch(PDO::FETCH_ASSOC);
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <div class="container">
       <div class="row">
         <table border="1">
           <tr><td>名稱<td><?php echo $result['name']; ?>
           <tr> <img src=<?php echo $result['picture']; ?> alt="" height="150" width="150">
           <tr><td>價錢<td><?php echo $result['price']; ?>
           <tr><td>內容<td><?php echo $result['content']; ?>
           <tr><td>購買數<td><?php echo $result['buynum']; ?>
           <tr><td>上架日期<td><?php echo $result['uptime']; ?>
         </table>
       </div>
     </div>
   </body>
 </html>
