<?php
/**
 * Created by PhpStorm.
 * User: y
 * Date: 2016/7/12
 * Time: 23:05
 */
define('WB_KEY','1140811644');
define('WB_SEC','322098d73baa7569b11c1bd798456be7');
define('CALLBACK','http://test.jiajiajiali.applinzi.com/callback.php');
function debug($val,$dump = false,$exit = true){
	//自动获取调试函数名称$func
	if($dump){
		$func = 'var_dump';
	}else{
		$func = is_array($val)||is_object($val)? 'print_r' : 'printf';
	}
	//输出到html
	header('Content-type:text/html;charset=utf-8');
	echo '<pre>debug output:<hr />';
	$func($val);
	echo '</pre>';
	if($exit)exit;
}