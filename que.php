<?php

$sql = "select * from que1";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);
?>


<form method="post">
<fieldset>
    <legend>目前位置: 首頁 > 問卷調查</legend>

<table width="80%" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td width="15%">編號</td>
    <td width="40%">問卷題目</td>
    <td width="15%">投票總數</td>
    <td width="15%">結果</td>
    <td width="15%">狀態</td>
  </tr>
  <?php do{ 
      $sqll = "select * from quelog where quelog_q1 = '".$c2["que1_seq"]."'";
      $cc1  = mysqli_query($link,$sqll);
      $row  = mysqli_num_rows($cc1);
      ?>
  <tr>
    <td width="15%"><?=$c2["que1_seq"]?></td>
    <td width="40%"><?=$c2["que1_txt"]?></td>
    <td width="15%"><?=$row?></td>
    <td width="15%"><a href='index.php?do=quedata&seq=<?=$c2["que1_seq"]?>'>結果</a></td>
    <td width="15%">
        <?php if(!empty($_SESSION["member"])){
            echo "<a href='index.php?do=vote&seq=".$c2["que1_seq"]."'/>參與投票</a>";
        }else{
            echo "請先登入";
        } ?>
    </td>
  </tr>
  <?php }while($c2  = mysqli_fetch_assoc($c1)) ?>
</table>


</fieldset>
</form>