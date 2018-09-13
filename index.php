<?php
require_once ('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>国金宝被害人信息登记平台</title>
<link href="style.css" rel="stylesheet" type="text/css" />

<script language="javascript">
function chk(theForm){
	if (theForm.member_user.value.replace(/(^\s*)|(\s*$)/g, "") == ""){
		alert("账号不能为空！");
		theForm.member_user.focus();   
		return (false);   
	}		
	
	if (theForm.member_password.value.replace(/(^\s*)|(\s*$)/g, "") == ""){
		alert("密码不能为空！");
		theForm.member_password.focus();   
		return (false);   
	}	
	
	if (theForm.member_password.value != theForm.pass.value){
		alert("两次输入密码不一样！");
		theForm.pass.focus();   
		return (false);   
	}	
		 
	if (theForm.member_name.value.replace(/(^\s*)|(\s*$)/g, "") == "" || theForm.member_name.value.replace(/[\u4e00-\u9fa5]/g, "")){
		alert("真实姓名不能为空且必须为中文！");   
		theForm.member_name.focus();   
		return (false);   
	}
}
</script>

<?php

if($_POST["submit"]){
if(empty($_POST['member_user']))
	echo "<script>alert('账号不能为空');location='?tj=register';</script>";
else if(empty($_POST['member_password']))
	echo "<script>alert('密码不能为空');location='?tj=register';</script>";
else if($_POST['member_password']!=$_POST['pass'])
	echo "<script>alert('两次密码不一样');location='?tj=register';</script>";

else{
$_SESSION['member']=$_POST['member_user'];
$sql="insert into member values('".$_POST['member_user']."','".md5($_POST['member_password'])."','".$_POST['member_name']."',
'".date('Y-m-d')."',

'".$_POST['member_sex']."','".$_POST['member_qq']."','".$_POST['member_phone']."','".$_POST['member_email']."',

'".$_POST['member_csny']."','".$_POST['member_sfzh']."','".$_POST['member_mz']."','".$_POST['member_yxdz']."',
'".$_POST['member_cszb']."','".$_POST['member_jkzm']."','".$_POST['member_sybx']."','".$_POST['member_zu']."'

)";

$result=mysql_query($sql)or die(mysql_error());
if($result)
echo "<script>alert('恭喜你注册成功,马上进入主页面');location='member.php';</script>";
else
{
	echo "<script>alert('注册失败');location='index.php';</script>";
	mysql_close();
}
	}
}
?>
</head>
<body>

<table width="386" height="28" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#AAAAAA">
  <tr>
    <td align="center" bgcolor="#FFFFFF">国金宝被害人信息登记平台</td>
  </tr>
</table>

<?php if($_GET['tj'] == 'register'){ ?>
<form id="theForm" name="theForm" method="post" action="" onSubmit="return chk(this)" runat="server" style="margin-top:3px;">
  <table width="386" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#B3B3B3">
    <tr>
      <td colspan="2" align="center" bgcolor="#EBEBEB">登记信息&nbsp;&nbsp;以下各项内容请准确填写</td>
    </tr>
    <tr>
      <td width="70" align="right" bgcolor="#FFFFFF">账&nbsp;&nbsp;&nbsp;号:</td>
      <td bgcolor="#FFFFFF"><input name="member_user" type="text" id="member_user" size="20" style="width:140px" />
	   (由数字或字母组成)</td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">密&nbsp;&nbsp;&nbsp;码:</td>
      <td bgcolor="#FFFFFF"><input name="member_password" type="password" id="member_password" size="20" />
      (由数字或字母组成)</td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">确认密码:</td>
      <td bgcolor="#FFFFFF"><input name="pass" type="password" id="pass" size="20" />
       (再次输入密码)</td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">真实姓名:</td>
      <td bgcolor="#FFFFFF"><input name="member_name" type="text" id="member_name" size="20" style="width:140px"/>
      <label> (必须为中文)</label></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">性&nbsp;&nbsp;&nbsp;别:</td>
      <td align="left" bgcolor="#FFFFFF">
          <input name="member_sex" type="radio" id="0" value="男" checked="checked" />
          男
          <input type="radio" name="member_sex" value="女" id="1" />
          女&nbsp;</label></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">QQ&nbsp;号码:</td>
      <td bgcolor="#FFFFFF"><input name="member_qq" type="text" id="member_qq" size="20"  style="width:140px" /></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">联系电话:</td>
      <td bgcolor="#FFFFFF"><input name="member_phone" type="text" id="member_phone" size="20"  style="width:140px" /></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">电子邮箱:</td>
      <td bgcolor="#FFFFFF"><input name="member_email" type="text" id="member_email" size="20" style="width:140px"/></td>
    </tr>

    <tr>
      <td align="right" bgcolor="#FFFFFF">出生年月:</td>
      <td bgcolor="#FFFFFF"><input name="member_csny" type="text" id="member_csny" size="20" style="width:140px"/></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">身份证号:</td>
      <td bgcolor="#FFFFFF"><input name="member_sfzh" type="text" id="member_sfzh" size="20" style="width:140px"/></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">民&nbsp;&nbsp;&nbsp;族:</td>
      <td bgcolor="#FFFFFF"><input name="member_mz" type="text" id="member_mz" size="20" style="width:140px"/></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">地址:</td>
      <td bgcolor="#FFFFFF"><input name="member_yxdz" type="text" id="member_yxdz" size="20" style="width:140px"/></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">投资金额:</td>
      <td bgcolor="#FFFFFF"><input name="member_cszb" type="text" id="member_cszb" size="20" style="width:140px"/></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">途径:</td>
      <td bgcolor="#FFFFFF"><input name="member_jkzm" type="text" id="member_jkzm" size="20" style="width:140px"/></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">用途:</td>
      <td bgcolor="#FFFFFF"><input name="member_sybx" type="text" id="member_sybx" size="20"style="width:140px"/></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">备&nbsp;&nbsp;&nbsp;注:</td>
      <td bgcolor="#FFFFFF"><input name="member_zu" type="text" id="member_zu"  style="width:260px;height:20px"/></td>
    </tr>

    <tr>
      <td colspan="2" height="32" align="center" bgcolor="#FFFFFF" ><input type="submit" name="submit" id="submit" value="确定无误并提交" > &nbsp;&nbsp;
<input type="button" value="取消填写并返回" onclick="javascript:history.back();"></td>
    </tr>
  </table>
</form>
<?php
} 
	if($_GET['tj']== ''){
?>
<?php
if($_POST["submit2"]){
$name=$_POST['name'];
$pw=md5($_POST['password']);
$sql="select * from member where member_user='".$name."'"; 
$result=mysql_query($sql) or die("账号不正确");
$num=mysql_num_rows($result);
if($num==0){
	echo "<script>alert('账号不存在');location='index.php';</script>";
	}
while($rs=mysql_fetch_object($result))
{
	if($rs->member_password!=$pw)
	{
		echo "<script>alert('密码不正确');location='index.php';</script>";
		mysql_close();
	}
	else 
	{
		$_SESSION['member']=$_POST['name'];
		header("Location:member.php");
		mysql_close();
		}
	}
}
?>
<form action="" method="post" name="regform" onSubmit="return Checklogin();" style="margin-top:2px;">
<table width="280" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#B3B3B3">
  <tr>
    <td colspan="2" align="center" bgcolor="#EBEBEB" class="font">用户登录</td>
  </tr>
    <tr>
      <td width="80" align="right" bgcolor="#FFFFFF" class="font">账&nbsp;号:</td>
      <td bgcolor="#FFFFFF" class="font"><input name="name" type="text" id="name" style="width:155px;height:22px"></td>
    </tr>
    <tr>
      <td width="80" align="right"  bgcolor="#FFFFFF" class="font">密&nbsp;码:</td>
      <td bgcolor="#FFFFFF" class="font"><input name="password" type="password" id="name" style="width:155px;height:22px"> </td>
    </tr>
    <tr>
    <td colspan="2" align="center"  bgcolor="#FFFFFF" class="font">
<input name="submit2" type="submit" value="登录查看"/>&nbsp;&nbsp;&nbsp;
<input type="button"   value="现在登记" onclick="location.href='index.php?tj=register'" />
</td>
  </tr>
</table>
</form>
<?php } ?>

</body>
</html>