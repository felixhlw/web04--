<?php
if (empty($_SESSION['mem'])) {
    to("index.php?do=login");
    exit();
}
if (!empty($_GET['id'])) {
    $_SESSION['cart'][$_GET['id']]=$_GET['qt'];
}
if (empty($_SESSION['cart'])) {
    echo "<h2 class='ct'> 購物車中目前無商品</h2>";
}else{

/* print_r($_SESSION['cart']); */
?>

<h2 class='ct'><?=$_SESSION['mem'];?>的購物車</h2>

<table class="all">
        <tr>
            <td class="tt">編號</td>
            <td class="tt">商品名稱</td>
            <td class="tt">數量</td>
            <td class="tt">庫存量</td>
            <td class="tt">單價</td>
            <td class="tt">小計</td>
            <td class="tt">刪除</td>
        </tr>
        <?php
        foreach ($_SESSION['cart'] as $id => $qt) {
          $goods=find("goods",$id);
        ?>
        <tr >
            <td class='pp ct'><?=$goods['no'];?></td>
            <td class='pp ct'><?=$goods['name'];?></td>
            <td class='pp ct'><input type="number" class="num" name="qt" id="<?=$goods['id'];?>" value="<?=$qt;?>" style="width:50px;"></td>
            <td class='pp ct' ><?=$goods['qt'];?></td>
            <td class='pp ct' id="p<?=$goods['id'];?>"><?=$goods['price'];?></td>
            <td class='pp ct' id="t<?=$goods['id'];?>"><?=$qt*$goods['price'];?></td>
            
            <td class='pp ct'><img src="./icon/0415.jpg" alt="" onclick="delCart(<?=$id;?>)"> </td>
        </tr>
        <?php
        }
        ?>        
    </table> 
    <div class="ct">
        <img src="./icon/0411.jpg" alt="" onclick="lof('index.php')" class='ct'> 
        <img src="./icon/0412.jpg" alt="" onclick="lof('index.php?do=billing')" > 
    </div>



    <script>
        function delCart(id){
            $.post("./api/delcart.php",{id},function(){
                location.href='index.php?do=buycart';
            })
        }


        $(".num").on("change",function(){
            let id=$(this).attr("id").replace("q","");
            let price=$("#p"+id).html();
            let num=$(this).val()
            $.post("./api/changecart.php",{id,num},function(){
                 $("#t"+id).html(price*num)
         })
})
    </script> 


<?php
}
?>

