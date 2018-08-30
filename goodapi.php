<?php include_once("head.php"); ?>
<?php 
if($_POST["io"] == 1){
    $sql = "insert into good value(null,'".$_POST["mem"]."','".$_POST["seq"]."')";
    mysqli_query($link,$sql);
}else{
    $sql = "DELETE FROM good where good_acc = '".$_POST["mem"]."' and good_newseq = '".$_POST["seq"]."'";
    mysqli_query($link,$sql);
}
echo "<script>document.location.href='index.php?do=newsdata&seq=".$_POST["seq"]."'</script>";
?>
