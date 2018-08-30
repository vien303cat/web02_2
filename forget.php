<?php
if(!empty($_POST["email"])){
    $sql = "select * from member where member_email = '".$_POST["email"]."'";
    $c1 = mysqli_query($link,$sql);
    $c2 = mysqli_fetch_assoc($c1);
    $row = mysqli_num_rows($c1);
    if($row == 1 ){
        $ea = "您的密碼為:".$c2["member_pw"];
    }else{ $ea = "查無資料"; }
}
?>

<form method="post">
<fieldset style="">
<legend></legend>
請輸入信箱以查詢密碼<br>
<input type="text" name="email"><br>

<?php 
if(!empty($ea)){
    echo $ea."<br>" ;
}
?>

<input type="submit" value="尋找">&nbsp;<br>
</fieldset>
</form>