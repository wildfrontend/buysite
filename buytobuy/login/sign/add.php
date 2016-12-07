<?php
     ini_set("display_errors","On");

     $account = $_POST['mail'];
     $password = $_POST['password'];
     $member = $_POST['name'];
     $phone = $_POST['phone'];
     $addr = $_POST['addr'];

     require_once "../../method/connect.php";

     $insert = $connect -> prepare("INSERT INTO member(account,password,member,phone,addr)
       VALUES(?,?,?,?,?)");
     $insert -> execute(array($account,$password,$member,$phone,$addr));

    header("location:../?sig_suc=註冊成功");

 ?>
