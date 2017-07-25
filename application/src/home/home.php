<?php
//导入smarty配置文件
include '../../../smarty.init.php';
//连接数据库，config.php里面的常量
$pdo=new PDO("mysql:host=".HOST.";dbname=".DBNAME,USERNAME,PWD);
//var_dump($pdo);
$pdo->exec("set names utf8");



//分页开始//
/*查询数据库里面，多少条数据，总记录数，分页查询*/
$total=$pdo->query("select * from member")->rowCount();
//echo $total;
//每页显示数据的条数
$pageSize=3;
//总共要分的页数=数据库条数/每页显示的条数
$pageTotal=ceil($total/$pageSize);//ceil取大值--3页
//动态的改变，第几页，第1页就显示第一个的数据
//当前页等于查询字符串中的page值，
if($_GET['page']){
    $page=$_GET['page'];
    if($page>=$pageTotal){//当前页，大于 总页数
        $page=$pageTotal;
    }
}else{
    $page=1;
}
//分页结束///

$sql="select * from member order by id  limit ".($page-1)*$pageSize.",".$pageSize;
$result=$pdo->query($sql);
$data=$result->fetchAll(PDO::FETCH_OBJ);
//pagination:bootstrap的分页类
$str="<ul class='pagination pagination-lg'> ";
if($page==1){//到了第一页不能点
    //前一页
    $str.="<li class='disabled'><a href='?page=".($page-1)."'>&laquo;</a></li>";
}else{
    //前一页
    $str.="<li><a href='?page=".($page-1)."'>&laquo;</a></li>";
}
for($i=1;$i<=$pageTotal;$i++){
    if($page==$i){//$page等于，循环的下标
        $str.="<li class='active'><a href='?page=".$i."'>".$i."</a></li>";
    }else{
        $str.="<li><a href='?page=".$i."'>".$i."</a></li>";
    }
    
}
if($page==$pageTotal){//最后一页能点击
    //后一页
    $str.="<li class='disabled'><a href='?page=".($page+1)."'>&raquo;</a></li>";
}else{
    //后一页
    $str.="<li><a href='?page=".($page+1)."'>&raquo;</a></li>";
}

$str.="</ul>";
/* echo $str; */
$smarty->assign("page", $str);
/* echo "<pre>";
var_dump($data);
echo "</pre>"; */
//把数据赋值给变量，这样静态页面就可以接受它
$smarty->assign("data", $data);
//指定要显示的静态页面。配置文件中修改了template_dir的默认路径。不用像0724-mm2哪样放在templates里面
$smarty->display("home/home.html");
?>