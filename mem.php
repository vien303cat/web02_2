<?php 

if(!empty($_POST["del"][0])){
    for($i=0;$i<count($_POST["del"]); $i++ ){
        $sql = "DELETE FROM member where member_seq = '".$_POST["del"][$i]."'";
        mysqli_query($link,$sql);
    }
    echo "<script>document.location.href='index.php?do=mem'</script>";
}

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
            echo "<script>document.location.href='index.php?do=mem'</script>";
        }
    }
}else if(!empty($_POST["wow"])){ echo "<script>alert('不可為空')</script>"; }


$sql="select * from member";
$c1 = mysqli_query($link,$sql);
$c2 = mysqli_fetch_assoc($c1);
?>


<fieldset>
    <legend>帳號管理</legend>
    <form method="post" >
    <table width="80%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td width="40%" align="center" valign="middle">帳號</td>
    <td width="40%" align="center" valign="middle">密碼</td>
    <td width="20%" align="center" valign="middle">刪除</td>
  </tr>
  <?php do{ ?>
  <tr>
    <td width="40%" align="center" valign="middle"><?=$c2["member_acc"]?></td>
    <td width="40%" align="center" valign="middle"><?=$c2["member_pw"]?></td>
    <td width="20%" align="center" valign="middle"><input type="checkbox" name="del[]" value="<?=$c2["member_seq"]?>"/></td>
  </tr>
  <?php }while($c2 = mysqli_fetch_assoc($c1)) ?>
  <tr>
    <td colspan="3" align="center"><input type="submit" value="確定刪除"><input type="reset" value="清空選取"></td>
  </tr>
</table>
  </form>
  <br><br>
  <form method="post">
<span style="font-size:24px">新增會員</span><br>
<span style="font-size:8px">*請設定您要註冊的帳號及密碼(最長12個字元)</span><br>
Step1:登入帳號&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="acc"><br>
Step2:登入密碼&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="pw"><br>
Step3:再次確認密碼&nbsp;&nbsp;<input type="text" name="repw"><br>
Step4:信箱(忘記密碼時使用)&nbsp;<input type="text" name="email"><br>
<input type="submit" value="註冊">&nbsp;<input type="reset" value="清除">
<input type="hidden" value="1" name="wow">
</form>
</fieldset>