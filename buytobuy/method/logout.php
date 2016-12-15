<?php
   session_start();
   unset($_SESSION["member"]);
   header("location:".$_SERVER["HTTP_REFERER"]);
 ?>
