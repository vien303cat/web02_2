<?php 

$sql ="select * from news where news_seq = '".$_GET["seq"]."'";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);
?>

<fieldset>
<legend>文章標題 : <?=$c2["news_txt"]?>|
<?php if(!empty($_SESSION["member"])){
  $sqll ="select * from good where good_acc = '".$_SESSION["member"]."' and good_newseq = '".$_GET["seq"]."'";
  $cc1  = mysqli_query($link,$sqll);
  $row = mysqli_num_rows($cc1);
  if($row == 1){ ?>
  
  <a href="Javascript:goodlog(2,<?=$_GET["seq"]?>)">收回讚</a>

  <?php }else{ ?>
    <a href="Javascript:goodlog(1,<?=$_GET["seq"]?>)">讚</a>
  <?php }
  
} ?>
</legend>
<?=nl2br($c2["news_con"])?>
</fieldset>

<script>
  function goodlog(io,seq){
    var mem = "<?=$_SESSION["member"]?>" ;
    $.post("goodapi.php",{io,seq,mem},function(){
      document.location.href='index.php?do=newsdata&seq=<?=$_GET["seq"]?>';
    });
  }
  </script>