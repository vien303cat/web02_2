<?php
if(!empty($_POST["acc"]) && !empty($_POST["pw"]) && !empty($_POST["repw"]) && !empty($_POST["email"]) ){
    $sql = "select * from member where member_acc = '".$_POST["acc"]."' ";
    $c1 = mysqli_query($link,$sql);
    $row = mysqli_num_rows($c1);
    if($row == 1 ){
        echo "<script>alert('帳號重複')</script>";
    }else{
        if($_POST["pw"] != $_POST["repw"] ){
            echo "<script>alert('請再次確認密碼')</script>";
        }else{
            $sql = "insert into member value(null,'".$_POST["acc"]."','".$_POST["pw"]."','".$_POST["email"]."') ";
            mysqli_query($link,$sql);
            echo "<script>document.location.href='index.php?do=login'</script>";
        }
    }
}else if(!empty($_POST["wow"])){ echo "<script>alert('不可為空')</script>"; }
?>


<form method="post">
<fieldset style="">
<legend>會員註冊</legend>
<span style="font-size:8px">*請設定您要註冊的帳號及密碼(最長12個字元)</span><br>
Step1:登入帳號&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="acc"><br>
Step2:登入密碼&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="pw"><br>
Step3:再次確認密碼&nbsp;&nbsp;<input type="text" name="repw"><br>
Step4:信箱(忘記密碼時使用)&nbsp;<input type="text" name="email"><br>
<input type="submit" value="註冊">&nbsp;<input type="reset" value="清除">
<input type="hidden" value="1" name="wow">
</fieldset>
</form>
