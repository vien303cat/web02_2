<?php 

$sql ="select * from news where news_display = '1'";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);
?>

<fieldset>
<legend>目前位置 : 首頁 > 最新文章區</legend>
<table width="80%" border="0" align="center" cellpadding="5" cellspacing="5">
  <tr>
    <td align="center" width="50%">標題</td>
    <td align="center" width="50%">內容</td>
  </tr>
  <?php do{ ?>
  <tr>
    <td align="center" width="50%"><a href='index.php?do=newsdata&seq=<?=$c2["news_seq"]?>'><?=$c2["news_txt"]?></a></td>
    <td align="center" width="50%"><?=mb_substr($c2["news_con"],0,20,"utf-8")?></td>
  </tr>
  <?php }while($c2  = mysqli_fetch_assoc($c1)) ?>
  <tr>
    <td colspan="2" align="center"><a href="#"> < </a> <a href="#"><span style="font-size:32px">1</span></a><a href="#"> > </a> </td>
  </tr>
</table>
</fieldset>