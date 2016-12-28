<?php
    ini_set("display_errors", "On");
    require_once "../../method/connect.php";
    $id = $_GET['id'];

    $delete = $connect -> prepare("DELETE FROM member WHERE id = :id");
    $delete -> execute(array(':id' => $id));

    header("location:".$_SERVER["HTTP_REFERER"]);
 ?>
