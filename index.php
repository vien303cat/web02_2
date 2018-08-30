<?php include_once("head.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>健康促進網</title>
<link href="./home_files/css.css" rel="stylesheet" type="text/css">
<script src="./home_files/jquery-1.9.1.min.js"></script>
<script src="./home_files/js.js"></script>
</head>

<body>
<div id="alerr" style="background:rgba(51,51,51,0.8); color:#FFF; min-height:100px; width:300px; position:fixed; display:none; z-index:9999; overflow:auto;">
	<pre id="ssaa"></pre>
</div>
<iframe name="back" style="display:none;"></iframe>
	<div id="all">
    	<div id="title">
		<?php 
    $sql = "select * from date where date_day = '".$nowtime."'";
	$c1  = mysqli_query($link,$sql);
	$c2  = mysqli_fetch_assoc($c1);
	$day = $c2["date_txt"];
	$sql = "select sum(date_txt) as allday from date ";
	$c1  = mysqli_query($link,$sql);
	$c2  = mysqli_fetch_assoc($c1);
	$allday = $c2["allday"];
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left"><?=$m?> 月 <?=$d?> 號 <?=$l?> | 今日瀏覽: <?=$day?> | 累積瀏覽: <?=$allday?></td>
    <td align="right"><a href='index.php'>回首頁</a></td>
  </tr>
</table> 
	</div>
        <div id="title2">
		<img src="02B01.jpg" alt="健康促進網-回首頁" title="健康促進網-回首頁"/> 
        </div>
        <div id="mm">
        	<div class="hal" id="lef">
				<?php if(!empty($_SESSION["member"]) && $_SESSION["member"] == "admin"){ ?>
					<a class="blo" href="?do=mem">帳號管理</a>
               	 	<a class="blo" href="#">分類網誌</a>
               	 	<a class="blo" href="?do=newsadmin">最新文章管理</a>
               	 	<a class="blo" href="#">講座管理</a>
					<a class="blo" href="?do=queadmin">問卷管理</a>
				<?php }else{ ?>
					<a class="blo" href="?do=po">分類網誌</a>
               	 	<a class="blo" href="?do=news">最新文章</a>
               	 	<a class="blo" href="?do=pop">人氣文章</a>
               	 	<a class="blo" href="#">講座訊息</a>
					<a class="blo" href="?do=que">問卷調查</a>
				<?php } ?>
               	                 </div>
            <div class="hal" id="main">
            	<div>
            		
                	<span style="width:100%; display:inline-block;">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" width="80%"><marquee>請民眾踴躍投稿電子報，讓電子報成為大家相互交流、分享的園地！詳見最新文章</marquee></td>
    <td align="right"><?php if(empty($_SESSION["member"])){ ?><a href="?do=login">會員登入</a> <?php }else{ echo "歡迎，".$_SESSION["member"]; ?> <input type='button' value='登出' onclick="document.location.href='logout.php'" />  <?php } ?> </td>
  </tr>
</table> 
					
                    	                    </span>
                    	<div class="">
							<?php include_once($list[$do]); ?>
                		                        </div>
                </div>
            </div>
        </div>
        <div id="bottom">
    	    本網站建議使用：IE9.0以上版本，1024 x 768 pixels 以上觀賞瀏覽 ， Copyright © 2018健康促進網社群平台 All Right Reserved 
    		 <br>服務信箱：health@test.labor.gov.tw<img src="./home_files/02B02.jpg" width="25" style="">
        </div>
    </div>

</body></html>