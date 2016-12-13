<?php
     $link = array(
                               'host' => "localhost",
                               'port' => "3306",
                               'account' => "root",
                               'password' => "root",
                               'dbname' => "buysite"
                              );

     $dbconnect =  'mysql:host='.$link['host'].';port='.$link['port'].';dbname='.$link['dbname'];
      // echo $dbconnect ;
      // try 判斷是否連上 否:顯示訊息
      try {
        $connect = new PDO($dbconnect,$link['account'],$link['password']);
        $connect -> query("SET NAMES 'utf8'");
        $connect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      } catch (Exception $e) {
            echo "Connection failed: ".$e->getMessage();
             exit();
      }

?>
