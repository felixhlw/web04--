<?php
$nav="全部商品";

    $goods=find("goods",$_GET['id']);

?>

 <h2 class="ct"><?=$goods['name'];?> </h2>   


        <table class="all">
            <tr class="pp">
                <td class="pp ct" rowspan="5" width="60%">
                    <a href="index.php?do=detail&id=<?=$i['id'];?>">
                        <img src="./img/<?=$goods['file'];?>" style="width: 60%;height:200px">
                    </a>
                </td>
                <td class="tt ">分類:
                    <?php
                    $big=find("type",$goods['main'])['text'];
                    $mid=find("type",$goods['sub'])['text'];

                    echo $big ." > " . $mid;
                    ?>
                </td>
            </tr>
            <tr class="pp">
                <td >編號: <?=$goods['no'];?></td>
            </tr>
            <tr class="pp">
                <td >價格: <?=$goods['price'];?></td>
            </tr>
            <tr class="pp">
                <td >詳細說明: <?=$goods['intro'];?></td>
            </tr>
            <tr class="pp">
                <td >庫存量: <?=$goods['qt'];?>...</td>

            </tr>
        </table>
    <form action="index.php" method="get">
        <div class="tt ct">
            購買數量: <input type="number" name="qt" id="qt" value="1">
            <input type="hidden" name="do" value="buycart">
            <input type="hidden" name="id" value="<?=$goods['id'];?>">
            <input type="submit" value="" value="" style="background:url('./icon/0402.jpg') no-repeat center;vertical-align:middle; padding:0;margin:0;width:57px;height:18px">
        </div>
    </form>
    <div class="ct"><button onclick="lof('index.php')" style="margin-top:10px;border:1px solid brown;box-shadow:1px 1px 2px black">返回</button></div>
    


