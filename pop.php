<?php 

$sql ="select * from news where news_display = '1'";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);
?>

<fieldset>
<legend>目前位置 : 首頁 > 人氣文章區</legend>

<table width="80%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td width="40%" align="center" valign="middle">標題</td>
    <td width="40%" align="center" valign="middle">內容</td>
    <td width="20%" align="center" valign="middle">人氣</td>
  </tr>
  <?php do{ ?>
  <tr>
    <td width="40%" align="center" valign="middle"><?=$c2["news_txt"]?></td>
    <td width="40%" align="center" valign="middle">
     <div class="ssaa"><?=mb_substr($c2["news_con"],0,10,"utf-8")."..."?>
     <span class="all" style="display:none"><?=$c2["news_con"]?><span>
     </div>   
    </td>
    <div id="altt" style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
    </div>
    <td width="20%" align="center" valign="middle">
<?php 
$sqll ="select * from good where good_newseq = '".$c2["news_seq"]."'";
$cc1  = mysqli_query($link,$sqll);
$row  = mysqli_num_rows($cc1);
echo $row."個人說"."<img src='02B03.jpg' width='20px'>";
?>

<?php if(!empty($_SESSION["member"])){
  $sqll ="select * from good where good_acc = '".$_SESSION["member"]."' and good_newseq = '".$c2["news_seq"]."'";
  $cc1  = mysqli_query($link,$sqll);
  $row = mysqli_num_rows($cc1);
  if($row == 1){ ?>
  
  <a href="Javascript:goodlog(2,<?=$c2["news_seq"]?>)"> - 收回讚</a>

  <?php }else{ ?>
    <a href="Javascript:goodlog(1,<?=$c2["news_seq"]?>)"> - 讚</a>
  <?php }
  
} ?>
    </td>
  </tr>
  <?php }while($c2  = mysqli_fetch_assoc($c1)) ?>
  <tr>
    <td colspan="3"><a href="#"> < </a> <a href="#"><span style="font-size:32px">1</span></a><a href="#"> > </a> </td>
  </tr>
</table>

</fieldset>

<script>
						$(".ssaa ").hover(
							function ()
							{
								$("#altt").html("<pre>"+$(this).children(".all").html()+"</pre>")
								$("#altt").show()
							}
						)
						$(".ssaa ").mouseout(
							function()
							{
								$("#altt").hide()
							}
						)
                        </script>
               
               
   <script>
  function goodlog(io,seq){
    var mem = "<?=$_SESSION["member"]?>" ;
    $.post("goodapi.php",{io,seq,mem},function(){
      document.location.href='index.php?do=pop';
    });
  }
  </script>