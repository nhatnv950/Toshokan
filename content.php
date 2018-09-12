
<div class ="content">

	<?php
	$pagesize=9;
	if(!urldecode($_GET[proid])){
	$sql="select * from yx_books order by id desc";
	}else{
	$sql="select * from yx_books where type='".urldecode($_GET[proid])."'";
	}
	$rs=mysqli_query($conn,$sql);
	$recordcount=mysqli_num_rows($rs);
	$pagecount=($recordcount-1)/$pagesize+1;
	$pagecount=(int)$pagecount;
	$pageno=$_GET["pageno"];
	if($pageno=="")
	{
		$pageno=1;
	}
	if($pageno<1)
	{
		$pageno=1;
	}
	if($pageno>$pagecount)
	{
		$pageno=$pagecount;
	}
	$startno=($pageno-1)*$pagesize;
	if(!urldecode($_GET[proid])){
	$sql="select * from yx_books order by id desc limit $startno,$pagesize";
	}else{
	$sql="select * from yx_books where type='".urldecode($_GET[proid])."' order by id desc limit $startno,$pagesize";
	}
	$rs=mysqli_query($conn,$sql);
?>

    <?php
	while($rows=mysqli_fetch_assoc($rs))
	{
	?>
	<li>
	<div class="tooltip">
	<?php
	
	
					echo '<img src="admin/uploads/'.$rows['images'].'" width="80" height="100" left="20px" style="padding-left: 20px;"/>';
					?> 
					
					<div class="tooltip_text"><td><?php
					echo '<img src="admin/uploads/'.$rows['images'].'" width="80" height="100"/><br>';?>
					<b>タイトル：</b><?php echo $rows['name']."<br>";?>
					<b>価格：</b><?php echo $rows["price"]."<br>"; ?>
					<b>内容：</b><?php echo $rows["detail"]."<br>"; ?>
					<b>登録時間：</b><?php echo $rows["uploadtime"]."<br>"; ?>
					<b>タイプ：</b><?php echo $rows["type"]."<br>"; ?>
					<b>在庫数：</b><b style="color:red"><?php echo $rows["total"]."<br>"; ?></b>
					<b>著者：</b><?php echo $rows["writer"]."<br>"; ?>
					<b>出版者：</b><?php echo $rows["publisher"]."<br>";?>
					<b>ISBN：</b><?php echo $rows["ISBN"];
					
					?>
					</td>
					</div>
					</div>
					
        <p style="color:blue;margin-left:20px;margin-top:2px;width: 100px;height: 50px;"><b><?php echo $rows["name"];?></b>
					

	  <?php 
	  $rs2=mysqli_query($conn,"select * from lend where book_id='".$rows['id']."' and user_id='".$_SESSION['id']."'");
	  $rows2=mysqli_fetch_assoc($rs2);
	  if($rows2['book_id']){
	  echo "<br><font color='red'>( 借りてる )</font>&nbsp;&nbsp;<a href=kaesu.php?book_id=$rows[id]><button>返す</button></a>";
	 
	  }else{
	  	if($rows["leave_number"]==0){
		echo "<font color='red'><br>在庫なし</font>";
		}else{
	  echo "<a href=kasu.php?book_id=$rows[id]><br><button>借りる</button></a>";
	  }
	  	}
	  ?>
	  </p></li>
       
	<?php
	}
?>


</table>

<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1">

  <tr>
  <td height="35" align="center">
  <?php
	if($pageno==1)
	{
	?>
	<br>
    ホームページ | 前のページ | <a href="index.php?proid=<?php echo urlencode($_GET[proid]);?>&pageno=<?php echo $pageno+1?>">次のページ</a> | <a href="index.php?proid=<?php echo urlencode($_GET[proid]);?>&pageno=<?php echo $pagecount?>">最後ページ</a>
    <?php
	}
	else if($pageno==$pagecount)
	{
	?>
    <a href="index.php?proid=<?php echo urlencode($_GET[proid]);?>&pageno=1">ホームページ</a> | <a href="index.php?proid=<?php echo urlencode($_GET[proid]);?>&pageno=<?php echo $pageno-1?>">前のページ</a> | 次のページ | 最後ページ
    <?php
	}
	else
	{
	?>
    <a href="index.php?proid=<?php echo urlencode($_GET[proid]);?>&pageno=1">ホームページ</a> | <a href="index.php?proid=<?php echo urlencode($_GET[proid]);?>&pageno=<?php echo $pageno-1?>">前のページ</a> | <a href="index.php?proid=<?php echo urlencode($_GET[proid]);?>&pageno=<?php echo $pageno+1?>" class="forumRowHighlight">次のページ</a> | <a href="?pageno=<?php echo $pagecount?>">最後ページ</a>
    <?php
	}
?>
    &nbsp;ページ：<?php echo $pageno ?>/<?php echo $pagecount ?>ページ&nbsp;<?php echo $recordcount?>冊</td>
  </tr>
</table></td></tr>
</table>
</div>
          