<?php include("config.php");?>
<html>
<body>
<?php
		$book_id=$_GET['book_id'];
		if ($book_id==""){
			echo "<script language=javascript>alert('ID正しくありません');window.location='index.php'</script>";
			exit();
		}
		else {
		?>
	<?php
	
		if ($_SESSION['id']==""){
			echo "<script language=javascript>alert('登録してください');window.location='landing.php'</script>";
			exit();
		}else{
		
		$now = date("Y-m-d");
		$lendsql="insert into lend(book_id, book_title, lend_time, user_id) values('$book_id','$title','$now','".$_SESSION['id']."')";
		mysqli_query($conn,$lendsql) or die ("失敗しました：". mysqli_connect_error());
		
		mysqli_query("update yx_books set total=total-1 where id='$book_id'",$conn);
		echo "<script language=javascript>alert('借りました');window.location='index.php'</script>";
		?>
<?php
}
	}
?>
</body>
</html>