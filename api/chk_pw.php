<?php
include_once "db.php";

// 寫法一
// $acc=$_GET['acc'];
// echo $res = $User->count(['acc'=>$acc]);

// 寫法二
// 資料庫有帳號的話會返回1 沒有的話會返回0
$chk=$User->count($_POST);

if($chk){
    echo $chk;
    // 把帳號存到session
    $_SESSION['user']=$_POST['acc'];
}else{
    echo 0;
}
?>