<?php
include_once "db.php";

// 寫法一
// $acc=$_GET['acc'];
// echo $res = $User->count(['acc'=>$acc]);

// 寫法二
echo $User->count($_GET);
?>