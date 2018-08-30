<?php

if(!empty($_POST["no"][0])){
    for($i=0;$i<count($_POST["no"]);$i++){
        $sql = "update news set news_display = '0' where news_seq = '".$_POST["no"][$i]."'";
        mysqli_query($link,$sql);
    }
    if(!empty($_POST["update"][0])){
        for($i=0;$i<count($_POST["update"]);$i++){
            $sql = "update news set news_display = '1' where news_seq = '".$_POST["update"][$i]."'";
            mysqli_query($link,$sql);
        }
    }
    if(!empty($_POST["del"][0])){
        for($i=0;$i<count($_POST["del"]);$i++){
            $sql = "DELETE FROM news where news_seq = '".$_POST["del"][$i]."'";
            mysqli_query($link,$sql);
        }
    }
}

if(!empty($_GET["page"])){
    $nowpage = $_GET["page"];
}else{ $nowpage = 1; }
$addpage = 3 ;
$openpage = ($nowpage - 1) * $addpage ;
$sql = "select * from news";
$c1  = mysqli_query($link,$sql);
$row = mysqli_num_rows($c1);
$allpage = ceil($row/$addpage);

if($nowpage == 1){
    $fp = 1 ;
    $np = $nowpage + 1 ; 
}else if($nowpage == $allpage){
    $fp = $nowpage - 1 ;
    $np = $allpage;
}else{
    $fp = $nowpage - 1 ;
    $np = $nowpage + 1 ;
}


$sql = "select * from news limit $openpage,$addpage ";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);
?>

<form method="post">
<table width="80%" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td width="20%" align="center" valign="middle">編號</td>
    <td width="40%" align="center" valign="middle">標題</td>
    <td width="20%" align="center" valign="middle">顯示</td>
    <td width="20%" align="center" valign="middle">刪除</td>
  </tr>
  <?php do{ ?>
  <tr>
      <input type="hidden" name="no[]" value="<?=$c2["news_seq"]?>">
    <td width="20%" align="center" valign="middle"><?=$c2["news_seq"]?></td>
    <td width="40%" align="center" valign="middle"><?=$c2["news_txt"]?></td>
    <td width="20%" align="center" valign="middle">
    <input type="checkbox" name="update[]" value="<?=$c2["news_seq"]?>" <?php if($c2["news_display"] == '1'){ echo "checked"; } ?> >
    </td>
    <td width="20%" align="center" valign="middle">
    <input type="checkbox" name="del[]" value="<?=$c2["news_seq"]?>" >
    </td>
  </tr>
  <?php }while($c2  = mysqli_fetch_assoc($c1)) ?>
  <tr>
    <td colspan="4" align="center" valign="middle">
    <a href='index.php?do=newsadmin&page=<?=$fp?>'> < </a>
    <?php 
    for($i = 1 ; $i <= $allpage ;$i++){
        if($nowpage == $i){
            echo "<span style='font-size:24px;'>".$i."</span>";
        }else{
            echo "<a href='index.php?do=newsadmin&page=".$i."'>".$i."</a>";
        }
    }
    ?>        
    <a href='index.php?do=newsadmin&page=<?=$np?>'> > </a>
    </td>
  </tr>
  <tr>
    <td colspan="4" align="center" valign="middle"><input type="submit" value="確定修改"></td>
  </tr>
</table>
  </form>