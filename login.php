<?php
if(!empty($_POST["acc"])){
    $sql = "select * from member where member_acc = '".$_POST["acc"]."' and member_pw = '".$_POST["pw"]."'";
    $c1 = mysqli_query($link,$sql);
    $row = mysqli_num_rows($c1);
    if($row == 1 ){
        $_SESSION["member"] = $_POST["acc"];
        echo "<script>document.location.href='index.php'</script>";
    }else{
        echo "<script>alert('密碼錯誤')</script>";
        echo "<script>document.location.href='index.php?do=login'</script>";
    }
}
?>


<form method="post">
<fieldset style="">
<legend>會員登入</legend>
帳號:&nbsp;<input type="text" name="acc"><br>
密碼:&nbsp;<input type="text" name="pw"><br>
<input type="submit" value="登入">&nbsp;<input type="reset" value="清除">&nbsp;&nbsp;&nbsp;&nbsp;
<a href="index.php?do=forget">忘記密碼</a>|<a href="index.php?do=memadd">尚未註冊</a>
</fieldset>
</form>
