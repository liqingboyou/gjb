<?php
header("content-type:text/html; charset=utf8");
if (!isset ($_SESSION)) {
	ob_start();
	session_start();
}
 $hostname="localhost:3306"; //mysql地址
 $basename="wp_aaqbee_com"; //mysql用户名
 $basepass="kN2diWknjbRX5BJN"; //mysql密码
 $database="wp_aaqbee_com"; //mysql数据库名称

 $conn=mysql_connect($hostname,$basename,$basepass)or die("error!"); //连接mysql              
 mysql_select_db($database,$conn); //选择mysql数据库
 mysql_query("set names 'utf8'");//mysql编码
?>
