<?php
      ini_set("display_errors", "On");
     date_default_timezone_set("Asia/Taipei");

     $name = $_POST['gdname'];
     $gdpic = $_FILES['gdpic'];
     $fileName  = $gdpic['tmp_name'];
     $content = $_POST['gdcontent'];
     $price = $_POST['gdprice'];
     $uptime  = date("Y-m-d H:i:s");

     if($_FILES["fileName"]["error"]==0){
         $client_id = "5b982131a30952e";
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


      require_once "../method/connect.php";
     $insert = $connect -> prepare( "INSERT INTO
                         goods (
                                 name,
                                 picture,
                                 content,
                                 price,
                                 uptime
                               ) VALUES (
                                 ?,?,?,?,?
                               )");
     $insert -> execute(
             array( $name,
                          $filelink,
                          $content,
                          $price,
                          $uptime
                        ));
     header("location:".$_SERVER["HTTP_REFERER"]);
 ?>
 ?>
