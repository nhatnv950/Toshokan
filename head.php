
<img src="images/abc.jpg" width="1170" height="170" style="padding: 0px 0px 0px 110px;"/><br>
 <div class="search">
		<form action="search.php" method="post">
		<table align="center" >
          <tr>
            <td width="20" align="center">
              <select name="seltype" id="seltype">
                <option value="name">タイトル</option>
                <option value="price">価格</option>
                <option value="time">入庫時間</option>
                <option value="type">タイプ</option>
              </select>            </td>
            <td width="25" align="center">
              <input type="text" name="coun" id="coun" />
			 </td>
            <td width="15" align="center">
              <input type="submit" name="button" id="button" value="検索する" onClick="return q_cont();" />         
			</td>
          </tr>
        </table>
		</form>
		</div>
	<div class="menu1">
      <table width="200px"><ul>
        <li style="margin-left:-20px;"><img src="./images/1.png" height="30" width="40" style="padding: 12px 0px 0px 20px;"><a href="index.php" title="ホーム">図書一覧</a>
		 
        <li><img src="./images/book-icon.png" height="30" width="40" style="padding: 12px 0px 0px 20px;"><a href="index.php?proid=<?php echo urlencode('語学');?>" title="語学">語学系</a></li>
        <li><img src="./images/book-icon.png" height="30" width="40" style="padding: 12px 0px 0px 20px;"><a href="index.php?proid=<?php echo urlencode('商学');?>" title="商学">商学</a></li>
        <li><img src="./images/book-icon.png" height="30" width="40" style="padding: 12px 0px 0px 20px;"><a href="index.php?proid=<?php echo urlencode('プログラミング');?>" title="プログラミング">プログラミング系</a></li>
        <li><img src="./images/book-icon.png" height="30" width="40" style="padding: 12px 0px 0px 20px;"><a href="index.php?proid=<?php echo urlencode('技術');?>" title="技術">技術系</a></li>
        <li><img src="./images/book-icon.png" height="30" width="40" style="padding: 12px 0px 0px 20px;"><a href="index.php?proid=<?php echo urlencode('経済');?>" title="経済">経済系</a></li>
		
		</li>
		<li style="margin-left:-20px;"><img src="./images/7.png" height="30" width="30" style="padding: 12px 0px 0px 20px;"><a href="landing.php"  title="ログイン画面"></a>&nbsp;&nbsp;<?php 
		if ($_SESSION['id']){
			echo "<a href='landing.php?tj=out'  title='ログアウト画面'>ログアウト</a>";

		}
         else {
			
			echo "<a href='landing.php' >ログイン</a>";
		}

		?>
		
		</li>
		</table>
        </div>
      </ul>

