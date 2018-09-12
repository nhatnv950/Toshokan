<?php
include("config.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>図書館貸し出しシステム</title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<script language="javascript"> 
    function checkreg()
    { 			
		if (form1.name.value=="")
		{
	        alert("名前を入力してください");
			form1.name.focus();
			return false;
	    }
		if (form1.password.value=="" )
		{
	        alert("パスワードを入力してください");
			form1.password.focus();
			return false;
	    }
		if (form1.pwd.value=="" )
		{
	        alert("確認パスワードを入力してください");
			form1.pwd.focus();
			return false;
	    }
		
		if (form1.password.value!=form1.pwd.value && form1.password.value!="")
		{
			alert("パスワードもう一度入力してください");
			form1.password.focus();
			return false;
		}
		if (form1.email.value=="")
		{
	        alert("メールアドレスを入力してください");
			form1.email.focus();
			return false;
	    }
		else if (form1.email.value.charAt(0)=="." ||
			form1.email.value.charAt(0)=="@"||
			form1.email.value.indexOf('@', 0) == -1 ||
			form1.email.value.indexOf('.', 0) == -1 ||
			form1.email.value.lastIndexOf("@")==form1.email.value.length-1 ||
			form1.email.value.lastIndexOf(".")==form1.email.value.length-1)
		{
			alert("正しいメールアドレスを入力してくさい");
			form1.email.select();
			return false;
		}
		return true;

    }	
</script>
<?php 
if($_POST['submit']){
$name=$_POST['name'];
$password=$_POST['password'];

$email=$_POST['email'];
$tel=$_POST['tel'];
$address=$_POST['address'];
$password=md5($password);
$sql="insert into user(name, password, email, tel, address) values('$name','$password','$email', '$tel','$address')";
mysqli_query($conn,$sql) or die ("失敗しました: ". mysqli_connect_error());

$result=mysqli_query($conn,"select last_insert_id()");
$re_arr=mysqli_fetch_array($result);
$id=$re_arr[0];
$_SESSION['user'] = $user;
$user=$id;
echo ( "<script language=javascript>alert('新規しました。');window.location='index.php'</script>");
}
?>
<body>
<div class="menu">
<?php include("head.php");?>
<form name="form1" method="post" action="" enctype='multipart/form-data' onSubmit="return checkreg()" >
  <table width="782" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
    <tr> 
      <th colspan="2" bgcolor="#FFFFFF"><font size="5">新規登録画面</font></th>
    </tr>    
    <tr> 
      <td width="364" align="right" bgcolor="#FFFFFF">名前：</td>
      <td width="403" bgcolor="#FFFFFF"> 
        <input type="text" name="name">
    </tr>
    <tr> 
      <td align="right" bgcolor="#FFFFFF">パスワード:</td>
      <td bgcolor="#FFFFFF"> 
        <input type="password" name="password">        
    </tr>
	<tr> 
      <td align="right" bgcolor="#FFFFFF">確認パスワード：</td>
      <td bgcolor="#FFFFFF"> 
        <input type="password" name="pwd">        
    </tr>
	<tr> 
      <td align="right" bgcolor="#FFFFFF">メールアドレス：</td>
      <td bgcolor="#FFFFFF"> 
        <input type="text" name="email">        
    </tr>
	 <tr> 
      <td align="right" bgcolor="#FFFFFF">電話番号:</td>
      <td bgcolor="#FFFFFF"> 
        <input type="text" name="tel">
    </tr>
	<tr> 
      <td align="right" bgcolor="#FFFFFF">住所:</td>
      <td bgcolor="#FFFFFF"> 
        <input type="text" name="address">
    </tr>    
    <tr> 
      <td  align=right bgcolor="#FFFFFF" > 
        <input type="submit" name="submit" value="新規">
      </td>
      <td align=left bgcolor="#FFFFFF"> 
        <input type="reset" name="submit" value="書き直す">
      </td>
    </tr>
  </table>
</form>
</div>
</body>
</html>