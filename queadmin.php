<?php
if(!empty($_POST["qname"])){
    $sql = "insert into que1 value(null,'".$_POST["qname"]."')";
    mysqli_query($link,$sql);
    $sql = "select * from que1 where que1_txt='".$_POST["qname"]."'";
    $c1  = mysqli_query($link,$sql);
    $c2  = mysqli_fetch_assoc($c1);
    $q1seq = $c2["que1_seq"];
    for($i=0;$i<count($_POST["qselect"]);$i++){
        $sql = "insert into que2 value(null,'".$_POST["qselect"][$i]."','".$q1seq."')";
        mysqli_query($link,$sql);
    }
}



$aa = "選項<input type='text' name='qselect[]'>"."<br>";
?>

<fieldset>
    <form method="post">
    <legeng>新增問卷</legend>
<div id="qname" >問卷名稱 <input type="text" name="qname"></div>
<div id="qselect">選項<input type="text" name="qselect[]"><input type="button" value="更多" onclick="add()" ></div>
<input type="submit" value="新增"><input type="reset" value="清空">
</fieldset>
</form>

<script>
    function add(){
        var aa = "<?=$aa?>";
        $("#qname").after(aa);
    }
    </script>