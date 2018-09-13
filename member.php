<?php 
require_once ('config.php'); 
//判断用户权限
if(empty($_SESSION['member'])){
	echo "<script>alert('请进行登陆或注册');location='index.php';</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html";charset=gbk />
<title>登记信息</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<table width="350" height="8" border="0" align="center"  cellpadding="3" cellspacing="0"  >
 <tr> <td height="6"> 
</td </tr>
</table>


<?php
//注销操作
if($_GET["tj"]=="destroy"){
session_destroy();
echo "<script>alert('注销成功');location='index.php';</script>";}
?>

<?php
//用户修改
if($_GET["tj"]=="modify") {
if($_POST["submit"]){
	mysql_query($sql="update member set member_qq='".$_POST['member_qq']."',member_phone='".$_POST['member_phone']."',member_email='".$_POST['member_email']."'
,member_sfzh='".$_POST['member_sfzh']."'
,member_bmsj='".date('Y-m-d')."'
,member_cszb='".$_POST['member_cszb']."'
,member_jkzm='".$_POST['member_jkzm']."'
,member_sybx='".$_POST['member_sybx']."'
,member_zu='".$_POST['member_zu']."' 

where member_user='".$_SESSION['member']."'");
	echo "<script>alert('修改成功');location='member.php';</script>";
} ?>
<?php
//显示用户
$sql="select * from member where member_user='".$_SESSION['member']."'";
$rs=mysql_fetch_array(mysql_query($sql));
?>



<table width="350" border="0" align="center"  cellpadding="3" cellspacing="1" bgcolor="#B3B3B3">
  <tr>
    <td align="center"  bgcolor="#EBEBEB">修改登记信息</td>
  </tr>
</table>


<form method="post" action="" style="margin-top:3px; margin-bottom:3px;">
<table width="350" height="212" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#B3B3B3">
  <tr>
    <td width="100" height="26" align="right" bgcolor="#FFFFFF">账&nbsp;&nbsp;号：</td>
    <td  bgcolor="#FFFFFF"><? echo $rs['member_user'];?></td>
  </tr>
  <tr>
    <td height="28" align="right" bgcolor="#FFFFFF">姓&nbsp;&nbsp;名：</td>
    <td align="left" bgcolor="#FFFFFF"><? echo $rs['member_name'];?></td>
  </tr>
  <tr>
    <td height="26" align="right" bgcolor="#FFFFFF">性&nbsp;&nbsp;别：</td>
    <td align="left" bgcolor="#FFFFFF"><? echo $rs['member_sex'];?></td>
  </tr>
  <tr>
    <td height="28" align="right" bgcolor="#FFFFFF">QQ&nbsp;号：</td>
    <td align="left" bgcolor="#FFFFFF"><input name="member_qq" type="text" id="member_qq" value="<? echo $rs['member_qq'];?>" maxlength="12"/></td>
  </tr>
  <tr>
    <td height="28" align="right" bgcolor="#FFFFFF">联系电话：</td>
    <td align="left" bgcolor="#FFFFFF"><input name="member_phone" type="text" id="member_phone" value="<? echo $rs['member_phone'];?>" maxlength="15"/></td>
  </tr>
  <tr>
    <td height="28" align="right" bgcolor="#FFFFFF">电子邮箱：</td>
    <td align="left" bgcolor="#FFFFFF"><input name="member_email" type="text" id="member_email" value="<? echo $rs['member_email'];?>" maxlength="30"/></td>
  </tr>
  <tr>
    <td height="28" align="right" bgcolor="#FFFFFF">身份证号：</td>
    <td align="left" bgcolor="#FFFFFF"><input name="member_sfzh" type="text" id="member_sfzh" value="<? echo $rs['member_sfzh'];?>" maxlength="30"/></td>
  </tr>
  <tr>
    <td height="28" align="right" bgcolor="#FFFFFF">投资金额：</td>
    <td align="left" bgcolor="#FFFFFF"><input name="member_cszb" type="text" id="member_cszb" value="<? echo $rs['member_cszb'];?>" maxlength="30"/></td>
  </tr>

  <tr>
    <td height="28" align="right" bgcolor="#FFFFFF">途径：</td>
    <td align="left" bgcolor="#FFFFFF"><input name="member_jkzm" type="text" id="member_jkzm" value="<? echo $rs['member_jkzm'];?>" maxlength="30"/></td>
  </tr>
  <tr>
    <td height="28" align="right" bgcolor="#FFFFFF">用途：</td>
    <td align="left" bgcolor="#FFFFFF"><input name="member_sybx" type="text" id="member_sybx" value="<? echo $rs['member_sybx'];?>" maxlength="30"/></td>
  </tr>
  <tr>
    <td height="26" align="right" bgcolor="#FFFFFF">提交日期：</td>
    <td align="left" bgcolor="#FFFFFF"><? echo $rs['member_bmsj'];?></td>
  </tr>

  <tr>
    <td height="36" align="right" bgcolor="#FFFFFF">备&nbsp;&nbsp;注：</td>
    <td align="left" bgcolor="#FFFFFF"><input name="member_zu" type="text" id="member_zu" value="<? echo $rs['member_zu'];?>" maxlength="60"/></td>
  </tr>

  <tr>
    <td height="28" colspan="2" align="center" bgcolor="#FFFFFF">
<input type="reset" name="button" id="button" value="重置" />&nbsp;&nbsp;&nbsp;
<input type="submit" name="submit" id="submit" value="提交" />&nbsp;&nbsp;&nbsp;
<input type="button" value="返回" onclick="location.href='member.php'" >

</td>
    </tr>
</table>
</form>

<?php } ?>
<?php
if($_SESSION['member'])                 
{?>
<table width="350" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#B3B3B3">
  <tr>
    <td width="327" align="center" bgcolor="#EBEBEB" class="font"><a href='?tj=destroy'>注销本次登录</a>&nbsp;&nbsp;<?php echo "<a href='?tj=modify'>修改个人信息</a>";?>&nbsp;&nbsp;
<?php if($_SESSION['member']=="admin"){?> <a href="admin_index.php">后台管理</a>
<?php }?>
</td>
  </tr>
</table>
<table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="3"></td>
  </tr>
</table>
<?php
$result=mysql_query("select * from member where member_user='".$_SESSION['member']."'"); 
while($rs=mysql_fetch_array($result)){
?>
<table width="330" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#B3B3B3">
  <tr>
    <td width="90" align="right" bgcolor="#FFFFFF">账&nbsp;&nbsp;号</td>
    <td bgcolor="#FFFFFF"><? echo $rs['member_user']; ?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF">姓&nbsp;&nbsp;名</td>
    <td bgcolor="#FFFFFF"><? echo $rs['member_name']; ?></td>
  </tr>


  <tr>
    <td align="right" bgcolor="#FFFFFF">联系电话</td>
    <td bgcolor="#FFFFFF"><? echo $rs['member_phone']; ?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF">投资金额</td>
    <td bgcolor="#FFFFFF"><? echo $rs['member_cszb']; ?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF">提交日期</td>
    <td bgcolor="#FFFFFF"><? echo $rs['member_bmsj']; ?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF">备&nbsp;&nbsp;注</td>
    <td bgcolor="#FFFFFF"><? echo $rs['member_zu']; ?></td>
  </tr>

</table>

<table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="8"></td>
  </tr>
</table>

<table width="330"  border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
<td align="center" bgcolor="#FFFFFF">信息已经采集到数据库，部分项目未显示</td>
    
  </tr>
  <tr>
<td align="center" height="28" valign="bottom" bgcolor="#FFFFFF"> 登记信息…</td>
</tr>
</table>
<?php } 
}
?>
</body>
</html>