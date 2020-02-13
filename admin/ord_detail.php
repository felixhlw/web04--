<?php
/* $mem=find("member",["acc"=>$_SESSION['mem']]); */
$ord=find("ord",$_GET['id']);

?>

<h2 class="ct">訂單編號<span style="color:red;"><?=$ord['no'];?></span>的詳細資料</h2>

<table class="all" style="margin-bottom:-2px;">
    <tr>
        <td class="tt ct">登入帳號</td>
        <td class="pp"><?=$ord['acc'];?></td>
    </tr>
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><?=$ord['name'];?></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><?=$ord['email'];?></td>
    </tr>
    <tr>
        <td class="tt ct">聯絡地址</td>
        <td class="pp"><?=$ord['addr'];?></td>
    </tr>
    <tr>
        <td class="tt ct">連絡電話</td>
        <td class="pp"><?=$ord['tel'];?></td>
    </tr>
</table>
    <table class="all" style="margin-top:0;">
            <tr>
                <td class="tt">商品名稱</td>
                <td class="tt">編號</td>
                <td class="tt">數量</td>
                <td class="tt">單價</td>
                <td class="tt">小計</td>
            </tr>
            <?php
            
            $cart=unserialize($ord['goods']);
            foreach ($cart as $id => $qt) {
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
        }
        ?>        
        <tr><td colspan="5" class="tt ct">總價: <?=$ord['total'];?></td></tr>
        </table> 
        <div class="ct">
            <input type="button" value="返回" onclick="lof('admin.php?do=order')">
        </div>
