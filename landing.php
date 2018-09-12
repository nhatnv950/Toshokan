<?php
include("config.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>図書館貸し出しシステム.3</title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<?php
if($_GET['tj'] == 'out'){
 session_destroy();
 echo "<script language=javascript>window.location='landing.php'</script>";
}
?>
<?php
if($_POST['submit']){
if(isset($_SESSION['id'])) {
	echo "<script language=javascript>window.location='index.php'</script>";
   exit;
}
$nickname=$_POST['username'];
$password=$_POST['password'];
$password=md5($password);

$sql="select * from user where name='$nickname' and password='$password'";
$re=mysqli_query($conn,$sql);
$result=mysqli_fetch_array($re);
if(!empty($result)) {
	//セッション保存
	$_SESSION['id']=$result['id'];
	$_SESSION['username']=$result['username'];
	echo "<script language=javascript>alert('{$nickname}さんログインしました');window.location='index.php'</script>";
}
else { 
	echo "<script language=javascript>alert('失敗しました');</script>";
	}
}
?>
<body>
<div class="menu">
<?php include("head.php");?>
<form  name="myform" method="post" onSubmit="return CheckPost()" action="" style="margin-bottom:5px;">
<table width="782" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="30" colspan="2" bgcolor="#FFFFFF">ユーザ登録画面</td>
    </tr>
  <tr>
    <td width="337" align="right" bgcolor="#FFFFFF">名前:
      </td>
    <td width="422" bgcolor="#FFFFFF"><input type="text" name="username"></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF">パスワード:
      </td>
    <td bgcolor="#FFFFFF"><input type="password" name="password"></td>
  </tr>
  <tr>
		<td align="right" bgcolor="#FFFFFF"><a href="reg.php"> 新規登録</a>
      </td>
    <td bgcolor="#FFFFFF"><input type="submit" name="submit" value="ログイン"></td>
  </tr>
</table>
</form>
</div>
</body>
</html>