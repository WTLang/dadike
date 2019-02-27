<?php
	session_start();
	//var_dump($_SESSION['code']);
	//var_dump($_POST);
	if(strtolower($_POST['verify']) !== strtolower($_SESSION['code'])){
		echo "验证失败";
	}else{
		echo "验证成功,查询数据库，验证账号密码";
	}
?>