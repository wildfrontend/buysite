<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>主頁</title>
  </head>
  <body>
    <a href="./login/">登入</a>
      <?php

        session_start();
        var_dump($_SESSION['member'])
       ?>
  </body>
</html>
