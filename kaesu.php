<?php 
require ('config.php');
	if ($_SESSION['id']==""){
			echo "<script language=javascript>alert('登録してください');window.location='landing.php'</script>";
			exit();
		}
	$book_id=$_GET[book_id];	
	
	$returnsql="delete from lend where book_id='$book_id' and user_id=".$_SESSION['id'];
	mysqli_query($conn,$returnsql) or die ("失敗しました：". mysqli_connect_error());
	$booksql="update yx_books set leave_number=leave_number+1 where id='$book_id'";
	mysqli_query($conn,$booksql) or die ("失敗しました：". mysqli_connect_error());
	echo "<script language=javascript>alert('返しました');window.location='index.php'</script>";
?>