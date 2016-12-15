<?php
     ini_set("display_errors","On");

     $mail = $_POST['mail'];
     $password = $_POST['password'];
     $name = $_POST['name'];
     $phone = $_POST['phone'];
     $addr = $_POST['addr'];

     require_once "../../method/connect.php";

     $insert = $connect -> prepare("INSERT INTO member(mail,password,name,phone,addr)
       VALUES(?,?,?,?,?)");
     $insert -> execute(array($mail,$password,$name,$phone,$addr));

    header("location:../?sig_suc=註冊成功");

 ?>
