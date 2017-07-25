<?php
//导入smarty配置文件
include '../../../smarty.init.php';
//连接数据库，config.php里面的常量
$pdo=new PDO("mysql:host=".HOST.";dbname=".DBNAME,USERNAME,PWD);
//var_dump($pdo);
$pdo->exec("set names utf8");

if($_GET['id']){
    $sql="delete from member where id=".$_GET['id'];
    $result=$pdo->exec($sql);
    if($result){
        header("location:home.php");
    }else{
        echo "删除失败";
    }
}else{
    //echo ROOT;
    header("location:home.php");
}

?>