<?php
    ini_set("display_errors", "On");
    require_once "../method/connect.php";

   $account = $_POST['account'];
   $password = $_POST['password'];

   $select = $connect -> prepare("SELECT * FROM member WHERE mail = :acc AND password = :pw");
   $select -> execute(array(':acc' => $account,':pw' => $password));

   $result = $select -> fetch(PDO::FETCH_ASSOC) ;


      if ($result['mail']==$account&&$result['password']==$password) {
           session_start();
           $_SESSION['member'] = $result;
           header("location:../");
      }elseif ($result['password']!=$password||$result['mail']!=$account) {
                  header("location:./?error=帳密錯誤");
      }elseif ($result['password']!=''||$result['mail']!='') {
                  header("location:./?error=輸入不完全");
      }

 ?>
