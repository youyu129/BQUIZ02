<?php
include_once "db.php";

$id=$_POST['id'];
$user=$_SESSION['user'];

$chk=$Log->count(['news'=>$id,'user'=>$user]);
// 可以不用設定變數，直接寫成一行
// $chk=$Log->count(['news'=>$_POST['id'],'user'=>$_SESSION['user']]); 


if($chk>0){
    $Log->del(['news'=>$id,'user'=>$user]);
}else{
    $Log->save(['news'=>$id,'user'=>$user]);
}
?>