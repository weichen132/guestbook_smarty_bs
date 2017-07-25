<?php
/* Smarty version 3.1.30, created on 2017-07-25 14:33:47
  from "C:\xampp\htdocs\0725\guestbook\application\views\home\home.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5976e64b3aa592_46801663',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3cb399e3b13e43ecc8fe807adf20b55314d953dc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\0725\\guestbook\\application\\views\\home\\home.html',
      1 => 1500964242,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5976e64b3aa592_46801663 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<!-- 以home。php的路径为参考路径 -->
<link href="../../../libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<table class="table table-bordered table-striped text-center">
	<tr><td>用户名</td><td>用户邮箱</td><td>注册时间</td><td>操作</td></tr>
	<!-- //$data把数据赋值给变量，这样静态页面就可以接受它 -->
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
		<tr>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->username;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->email;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->regTime;?>
</td>
			<td>
				<a>修改</a>
				<a href='delete.php?id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
'>删除</a>
			</td>
		</tr>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</table>
<!--html显示分页,home.php用smarty->assign存了-->
<div class="page"><?php ob_start();
echo $_smarty_tpl->tpl_vars['page']->value;
$_prefixVariable1=ob_get_clean();
echo $_prefixVariable1;?>
</div>
<style>
	.page{
		text-align:center;
	}
</style>

</body>
</html><?php }
}
