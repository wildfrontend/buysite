<?php
     ini_set("display_errors", "ON");
     require_once "../method/connect.php";
     date_default_timezone_set("Asia/Taipei");
     session_start();

     $message = $_POST['message'];
     $date = date("Y-m-d H:i:s");

     $insert = $connect -> prepare("INSERT INTO board(message,mail,date)VALUES(?,?,?)");
     $insert -> execute(array($message,$_SESSION['member']['mail'],$date));

      header("location:".$_SERVER["HTTP_REFERER"]);
 ?>
