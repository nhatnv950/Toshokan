<?php
	ob_start();
	session_start(); 
	$conn= mysqli_connect('localhost','root','','library2018') or 
        die(mysqli_connect_error()); 
	if($conn==null)
	{
		echo "mysqlにつながってない";
		exit; 
	}
	mysqli_set_charset($conn, 'utf8');
?>
<?php
	
	$sql="select * from ninki";
	$books=mysqli_query($conn,$sql);
	

?>
<div class="scroll">

 <table width="150" border="1" cellspacing="0" cellpadding="0">
 
            <tr>
           <td style="background-color:#DDDDDD;text-align: center;" >人気ランキング</td>        
            </tr>
            <tr>
			
                <td style="background-color:#FFFFCC;"><marquee height="500" behavior="scroll" direction="up" scrolldelay="100" scrollamount="5" onMouseOver="this.stop();" onMouseOut="this.start();">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0"　> 
<?php
while($rows=mysqli_fetch_array($books)){

?>							
                    <tr>
					<td align="center">
						<?php
					echo '<img src="admin/uploads/'.$rows['ninki_images'].'" width="80" height="100" left="20px"/>';
					?>
					</td></tr>
                    <tr><td align="center"><b><?php echo $rows['ninki_name']."<br>";?></b></br></br></br>

                            </marquee>
                     </td></tr>   
					 <?php
	}
?>
                    </table>
			    </td>
				
            </tr>
			
			</div>
			


			