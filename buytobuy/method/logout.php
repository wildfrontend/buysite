<?php
   session_start();
   unset($_SESSION["member"]);
   header("location:../index.php");
 ?>
