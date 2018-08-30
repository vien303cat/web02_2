<?php 


$sql = "select * from que1,que2 where que1_seq = '".$_GET["seq"]."' and que2_q1 = '".$_GET["seq"]."'";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);
?>

<form method="post" action="index.php?do=que">
<fieldset>
    <legend>目前位置: 首頁 > 問卷調查 > <?=$c2["que1_txt"]?></legend>
    <?=$c2["que1_txt"]?><br><br>
    <?php do{ 
        $sqll = "select * from quelog where quelog_q2 = '".$c2["que2_seq"]."'";
        $cc1  = mysqli_query($link,$sqll);
        $row  = mysqli_num_rows($cc1);
        ?>
    <?=$c2["que2_txt"]?>---<?=$row?>票<br>
    <?php }while($c2  = mysqli_fetch_assoc($c1)) ?>
    <input type="submit" value="返回">
    </fieldset>
</form>