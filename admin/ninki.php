<?php
include("../config.php");
require_once('ly_check.php');
$sql="INSERT INTO ninki (id,ninki_images,ninki_name)

SELECT id,images,name
FROM yx_books 
where id=".$_GET[id];
$arry=mysqli_query($conn,$sql);

if($arry){
echo "<script> alert('選びました');location='list.php';</script>";
}
else
echo "失敗しました";
?>