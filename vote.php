<?php 
if(!empty($_POST["sel"])){
    $sql = "insert into quelog value(null,'".$_SESSION["member"]."','".$_GET["seq"]."','".$_POST["sel"]."')";
    mysqli_query($link,$sql);
    echo "<script>document.location.href='index.php?do=que'</script>";
}


$sql = "select * from que1,que2 where que1_seq = '".$_GET["seq"]."' and que2_q1 = '".$_GET["seq"]."'";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);
?>

<form method="post">
<fieldset>
    <legend>目前位置: 首頁 > 問卷調查 > <?=$c2["que1_txt"]?></legend>
    <?=$c2["que1_txt"]?><br>
    <?php do{ ?>
    <input type="radio" name="sel" value="<?=$c2["que2_seq"]?>" ><?=$c2["que2_txt"]?><br>
    <?php }while($c2  = mysqli_fetch_assoc($c1)) ?>
    <input type="submit" value="我要投票">
    </fieldset>
</form>