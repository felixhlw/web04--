<?php
$mem=find("member",["acc"=>$_SESSION['mem']]);


?>

<h2 class="ct">填寫資料</h2>

<table class="all" style="margin-bottom:-2px;">
    <tr>
        <td class="tt ct">登入帳號</td>
        <td class="pp"><?=$_SESSION['mem'];?></td>
    </tr>
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><input type="text" name="name" id="name" value="<?=$mem['name'];?>"></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><input type="text" name="email" id="email" value="<?=$mem['email'];?>"></td>
    </tr>
    <tr>
        <td class="tt ct">聯絡地址</td>
        <td class="pp"><input type="text" name="addr" id="addr" value="<?=$mem['addr'];?>"></td>
    </tr>
    <tr>
        <td class="tt ct">連絡電話</td>
        <td class="pp"><input type="text" name="tel" id="tel" value="<?=$mem['tel'];?>"></td>
    </tr>
</table>
<form action="./api/billing.php" method="post" >
    <table class="all" style="margin-top:0;">
            <tr>
                <td class="tt">商品名稱</td>
                <td class="tt">編號</td>
                <td class="tt">數量</td>
                <td class="tt">單價</td>
                <td class="tt">小計</td>
            </tr>
            <?php
            $sum=0;
            foreach ($_SESSION['cart'] as $id => $qt) {
              $goods=find("goods",$id);
            ?>
            <tr >
                <td class='pp ct'><?=$goods['name'];?></td>
                <td class='pp ct'><?=$goods['no'];?></td>
                <td class='pp ct'><?=$qt;?></td>
                <td class='pp ct'><?=$goods['price'];?></td>
                <td class='pp ct'><?=$qt*$goods['price'];?></td>
            </tr>
            <?php
            $sum=$sum+($qt*$goods['price']);
        }
        ?>        
        <tr><td colspan="5" class="tt ct">總價: <?=$sum;?></td></tr>
        </table> 
        <div class="ct">
            <input type="hidden" name="total" id="total" value="<?=$sum;?>">
            <input type="button" value="確定送出" onclick="billing()">
            <input type="button" value="返回修改訂單" onclick="lof('index.php?do=buycart')">
        </div>
    </form>
    <script>
function billing(){
    let name=$("#name").val()
    let addr=$("#addr").val()
    let email=$("#email").val()
    let tel=$("#tel").val()
    let total=$("#total").val()
    $.post("./api/billing.php",{name,addr,email,tel,total},function(){
        alert("訂購成功\n感謝您的訂購")
        location.href="index.php";
    })
}
</script>