<?php
    ini_set("display_errors", "On");
    require_once "../../method/connect.php";
    $id = $_GET['id'];

    $delete = $connect -> prepare("UPDATE ordertab SET drive = 1  WHERE id = :id");
    $delete -> execute(array(':id' => $id));

    header("location:".$_SERVER["HTTP_REFERER"]);
 ?>
