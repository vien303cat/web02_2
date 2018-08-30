<?php 
$list["login"] = "login.php";
$list["first"] = "first.php";
$list["forget"] = "forget.php";
$list["memadd"] = "memadd.php";
$list["po"] = "po.php";
$list["news"] = "news.php";
$list["newsdata"] = "newsdata.php";
$list["pop"] = "pop.php";
$list["mem"] = "mem.php";
if(empty($_GET["do"])){
    $do = "first";
}else{ $do = $_GET["do"] ; }

?>