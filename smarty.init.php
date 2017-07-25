<?php
//开启session
session_start();
//设置错误报告的级别
error_reporting(E_ALL^E_NOTICE^E_DEPRECATED);
//设置默认时区
date_default_timezone_set("PRC");
/*配置smarty*/
//echo __FILE__;//文件的名称，和完整的物理路径
//echo dirname(__FILE__);//,完整的物理路径

define("ROOT", dirname(__FILE__));//项目的根目录
//带入smarty类
include ROOT.'/libs/smarty/Smarty.class.php';
//带入配置文件
include ROOT.'/application/configs/config.php';
$smarty=new Smarty();
/* echo "<pre>";
var_dump($smarty);
echo "</pre>"; */
//自定义模板目录，这样静态页面，就不用放在默认的templates里面
$smarty->template_dir=ROOT."/application/views";
//自定义编译目录，放php文件
$smarty->compile_dir=ROOT."/application/run";
?>