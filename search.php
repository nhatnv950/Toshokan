<?php
include("./config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF8" />
<link rel="stylesheet" href="images/css.css" type="text/css">
</head>
<body>
<table width="799" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" class="table" >
      
      <tr>
        <td width="7%" height="35" align="center" bgcolor="#FFFFFF">ID</td>
        <td width="28%" align="center" bgcolor="#FFFFFF">タイトル</td>
        <td width="12%" align="center" bgcolor="#FFFFFF">価格</td>
        <td width="24%" align="center" bgcolor="#FFFFFF">入庫時間</td>
        <td width="12%" align="center" bgcolor="#FFFFFF">タイプ</td>
      </tr>
<?php
	$pagesize=10;
	$sql = "select * from yx_books where ".$_POST[seltype]." like ('%".$_POST[coun]."%')";
	$rs=mysqli_query($conn,$sql) or die();
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
	$sql="select * from yx_books where ".$_POST[seltype]." like ('%".$_POST[coun]."%') order by id desc limit $startno,$pagesize";
	$rs=mysqli_query($conn,$sql);
?>
     <?php
	while($rows=mysqli_fetch_assoc($rs))
	{
	?>
<tr align="center">
<td class="td_bg" width="7%"><?php echo $rows["id"]?></td>
<td class="td_bg" width="28%" height="26"><?php echo $rows["name"]?></td>
<td class="td_bg" width="12%" height="26"><?php echo $rows["price"]?></td>
<td class="td_bg" width="24%" height="26"><?php echo $rows["uploadtime"]?></td>
<td class="td_bg" width="12%" height="26"><?php echo $rows["type"]?></td>

</tr>
	<?php
	}
?>
	    <tr>
      <th height="25" colspan="6" align="center" class="bg_tr">
	  <?php
	if($pageno==1)
	{
	?>
    ホームページ | 前のページ | <a href="?pageno=<?php echo $pageno+1?>">次のページ</a> |  <a href="?pageno=<?php echo $_POST[seltype]?>最後ページ</a>
    <?php
	}
	else if($pageno==$pagecount) 
	{
	?>
                                                                              
    <a href="?pageno=1">ホームページ</a> | <a href="?pageno=<?php echo $pageno-1?>">前のページ</a> | 次のページ | 最後ページ
    <?php
	}
	else
	{
	?>
    <a href="?pageno=1">ホームページ</a> | <a href="?pageno=<?php echo $pageno-1?>">前のページ</a> |  <a href="?pageno=<?php echo $pageno+1?>" class="forumRowHighlight">次のページ</a> |  <a href="?pageno=<?php echo $pagecount?>">最後ページ</a>
    <?php
	}
?>
	 &nbsp;ページ：<?php echo $pageno ?>/<?php echo $pagecount ?>ページ&nbsp;<?php echo $recordcount?>冊 
	
	</th>
	  </tr>
</table>
</body>
</html>