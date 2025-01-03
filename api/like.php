<?php
include_once "db.php";

$id=$_POST['id'];
$user=$_SESSION['user'];

$news=$News->find($id);

$chk=$Log->count(['news'=>$id,'user'=>$user]);
// 可以不用設定變數，直接寫成一行
// $chk=$Log->count(['news'=>$_POST['id'],'user'=>$_SESSION['user']]); 


if($chk>0){
    $Log->del(['news'=>$id,'user'=>$user]);
    // $news['likes']=$news['likes']-1; 簡化寫法--
    $news['likes']--;
}else{
    $Log->save(['news'=>$id,'user'=>$user]);
    $news['likes']++;
}

$News->save($news);
?>