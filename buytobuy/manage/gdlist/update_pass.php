<?php
   ini_set("display_errors", "On");
   date_default_timezone_set("Asia/Taipei");
   $id = $_GET['id'];
   //接收表單資料
   $name = $_POST['name'];
   $gdpic = $_FILES['gdpic'];
   $fileName  = $gdpic['tmp_name'];
   $price = $_POST['price'];
   $content = $_POST['content'];
   $uptime  = date("Y-m-d H:i:s");
   //將圖片轉成網址
   if($_FILES["fileName"]["error"]==0){
       $client_id = "5b982131a30h952e";
       $handle = fopen($fileName,"r");
       $data = fread($handle,filesize($fileName));
       $pvars  = array('image' => base64_encode($data));
       $timeout = 30;
       $curl = curl_init();
       curl_setopt($curl,CURLOPT_URL,'https://api.imgur.com/3/image.json');
       curl_setopt($curl,CURLOPT_TIMEOUT,$timeout);//讀取時間30秒為上限
       curl_setopt($curl,CURLOPT_HTTPHEADER,array('Authorization: Client-ID ' . $client_id));
       curl_setopt($curl,CURLOPT_POST,1);
       curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, false);//關閉SSL安全
       curl_setopt($curl,CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($curl,CURLOPT_POSTFIELDS, $pvars);
       $out = curl_exec($curl);
       curl_close ($curl);
       $pms = json_decode($out,true);
       $filelink=$pms['data']['link'];
   }else {
       echo"fileErrorCode:".$_FILES["file"]["error"];
   }
   //更新資料
      require_once "../../method/connect.php";
   $update = $connect -> prepare("UPDATE goods SET name = ?,picture = ?,price = ?,content = ?, uptime = ? WHERE id = ?");
   $update -> execute(array($name,$filelink,$price,$content,$uptime,$id));

   header("location:./");
?>
